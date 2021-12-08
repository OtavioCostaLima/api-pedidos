<?php

namespace App\Dominio\V1\Pedidos;

use App\Models\ItensPedido;
use App\Models\Pedido;
use App\Models\Produto;
use App\Traits\ApiResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PedidoRepository
{

    use ApiResponse;

    protected Pedido $pedido;

    function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
    }

    public function getPedidos()
    {
        try {
            $pedido = $this->pedido->with('produtos')->get();
            return $this->success('Todos os Pedidos', $pedido);
        } catch (\Throwable $th) {
            return $this->error('Erro ao buscar Pedidos', 500);
        }
    }

    public function getPedidoPorId($id)
    {
        try {
            if ($pedido = $this->pedido->with('produtos')->find($id)) {
                return $this->success('Pedido encontrado', $pedido, 200);
            }
            return $this->error('Pedido não encontrado', 404);
        } catch (\Throwable $th) {
            return $this->error('Erro ao buscar Pedido', 500);
        }
    }

    public function cadastrar(array $data)
    {
        try {
            DB::beginTransaction();

            $pedido = new Pedido();
            $pedido = $this->pedido->create($data);

            $produto = new Produto();

            foreach ($data['produtos'] as $item) {

                $produto = $produto->find($item['produto_id']);

                if (!$produto) {
                    DB::rollBack();
                    return $this->error('Erro ao Cadastrar Pedido, Produto não Encontrado!', 404);
                }

                $pedido->produtos()->create([
                    'produto_id' => $produto->id,
                    'descricao_produto' => $produto->nome,
                    'quantidade' => $item['quantidade'],
                    'valor_unitario' => $produto->valor,
                    'valor_total' =>  $item['quantidade'] * $produto->valor,
                ]);
            }

            DB::commit();
            return $this->success('Pedido Cadastrado!', $pedido, 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->error('Erro ao Cadastrar Pedido', 500);
        }
    }

    public function atualizar(array $data, $id)
    {
        try {

            DB::beginTransaction();

            $pedido = $this->pedido->where('id', $id)->where('data_excluido', null)->first();

            if (!$pedido) {
                return $this->error('Pedido não encontrado', 404);
            }

            $produto = new Produto();
            ItensPedido::where('pedido_id', $pedido->id)->delete();

            foreach ($data['produtos'] as $item) {

                $produto = $produto->find($item['produto_id']);

                if (!$produto) {
                    DB::rollBack();
                    return $this->error('Erro ao Cadastrar Pedido, Produto não Encontrado!', 404);
                }

                $pedido->produtos()->create([
                    'produto_id' => $produto->id,
                    'descricao_produto' => $produto->nome,
                    'quantidade' => $item['quantidade'],
                    'valor_unitario' => $produto->valor,
                    'valor_total' =>  $item['quantidade'] * $produto->valor,
                ]);
            }
            DB::commit();
            return $this->success('Pedido Atualizado!', $pedido);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->error('Erro ao Atualizar o Pedido' . $th->getMessage(), 500);
        }
    }

    public function excluir($id)
    {
        $pedido = $this->pedido->where('id', $id)->where('data_excluido', null)->first();
        if (!$pedido) {
            return $this->error('Pedido não encontrado', 404);
        }

        if ($pedido->update(['data_excluido' => Carbon::now()])) {
            return $this->success('Pedido Atualizado!', $pedido);
        }
    }
}
