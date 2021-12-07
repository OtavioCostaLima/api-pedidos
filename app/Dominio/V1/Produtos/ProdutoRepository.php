<?php

namespace App\Dominio\V1\Produtos;

use App\Models\Produto;
use App\Traits\ApiResponse;
use Carbon\Carbon;

class ProdutoRepository
{

    use ApiResponse;

    protected Produto $produto;

    function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }

    public function getProdutos()
    {
        try {
            $produto = $this->produto->all();
            return $this->success('Todos os Produtos', $produto);
        } catch (\Throwable $th) {
            return $this->error('Erro ao buscar Produtos', 500);
        }
    }

    public function getProdutoPorId($id)
    {
        try {
            if ($produto = $this->produto->find($id)) {
                return $this->success('Produto encontrado', $produto, 200);
            }
            return $this->error('Produto não encontrado', 404);
        } catch (\Throwable $th) {
            return $this->error('Erro ao buscar Produto', 500);
        }
    }

    public function cadastrar(array $data)
    {
        try {
            $produto = $this->produto->create($data);
            return $this->success('Produto Cadastrado!', $produto, 201);
        } catch (\Throwable $th) {
            return $this->error('Erro ao Cadastrar Produto', 500);
        }
    }

    public function atualizar(array $data, $id)
    {
        try {
            $produto = $this->produto->find($id);
            if (!$produto) {
                return $this->error('Produto não encontrado', 404);
            }

            if ($produto->update($data)) {
                return $this->success('Produto Atualizado!', $produto);
            }
        } catch (\Throwable $th) {
            return $this->error('Erro ao Atualizar o Produto', 500);
        }
    }

    public function excluir($id)
    {
        $produto = $this->produto->find($id);
        if (!$produto) {
            return $this->error('Produto não encontrado', 404);
        }

        if ($produto->update(['data_excluido' => Carbon::now()])) {
            return $this->success('Produto Atualizado!', $produto);
        }
    }


}
