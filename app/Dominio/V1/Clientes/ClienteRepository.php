<?php

namespace App\Dominio\V1\Clientes;

use App\Models\Cliente;
use App\Traits\ApiResponse;
use Carbon\Carbon;

class ClienteRepository
{

    use ApiResponse;

    protected Cliente $cliente;

    function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function getClientes()
    {
        try {
            $cliente = $this->cliente->all();
            return $this->success('Todos os Clientes', $cliente);
        } catch (\Throwable $th) {
            return $this->error('Erro ao buscar Clientes', $th->getCode());
        }
    }

    public function getClientePorId($id)
    {
        try {
            if ($cliente = $this->cliente->find($id)) {
                return $this->success('Cliente encontrado', $cliente, 200);
            }
            return $this->error('Cliente não encontrado', 404);
        } catch (\Throwable $th) {
            return $this->error('Erro ao buscar Cliente', $th->getCode());
        }
    }

    public function cadastrar(array $data)
    {
        try {
            $cliente = $this->cliente->create($data);
            return $this->success('Cliente Cadastrado!', $cliente, 201);
        } catch (\Throwable $th) {
            return $this->error('Erro ao Cadastrar Cliente', $th->getCode());
        }
    }

    public function atualizar(array $data, $id)
    {
        try {
            $cliente = $this->cliente->find($id);
            if (!$cliente) {
                return $this->error('Cliente não encontrado', 404);
            }

            if ($cliente->update($data)) {
                return $this->success('Cliente Atualizado!', $cliente);
            }
        } catch (\Throwable $th) {
            return $this->error('Erro ao Atualizar o Cliente', $th->getCode());
        }
    }

    public function excluir($id)
    {
        $cliente = $this->cliente->find($id);
        if (!$cliente) {
            return $this->error('Cliente não encontrado', 404);
        }

        if ($cliente->update(['data_excluido' => Carbon::now()])) {
            return $this->success('Cliente Atualizado!', $cliente);
        }
    }
}
