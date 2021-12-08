<?php

namespace Tests\Feature;

use App\Models\Cliente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClienteTest extends TestCase
{

    use RefreshDatabase;

    function test_cadastrar_clientes()
    {
        $cliente = [
            'nome' => 'Otavio Costa Lima',
            'cpf' => '71625673043',
            'sexo' => 'M',
            'email'  => 'otavio_slz15@hotmail.com'
        ];


        $response = $this->postJson('/api/v1/clientes/',$cliente, ['Accept' => 'application/json']);
        $response->assertJson([
            'success' => true,
        ]);
    }

    function test_atualizar_clientes()
    {
        $cliente = Cliente::create([
            'nome' => 'Otavio Costa Lima',
            'cpf' => '05423698751',
            'sexo' => 'M',
            'email'  => 'otavio_slz15@hotmail.com'
        ]);

        $updateParams = [
            'nome' => 'Otavio C. Lima',
        ];

        $response = $this->putJson('/api/v1/clientes/'.$cliente->id, $updateParams, ['Accept' => 'application/json']);
        $response->assertJson([
            'success' => true,
        ]);
    }

    function test_listar_cliente_por_id()
    {
        $cliente = Cliente::create([
            'nome' => 'Otavio Costa Lima',
            'cpf' => '05423698751',
            'sexo' => 'M',
            'email'  => 'otavio_slz15@hotmail.com'
        ]);

        $response = $this->getJson('/api/v1/clientes/'.$cliente->id, ['Accept' => 'application/json']);
        $response->assertJson([
            'success' => true,
        ]);
    }

    function test_listar_clientes()
    {
        $response = $this->getJson('/api/v1/clientes', ['Accept' => 'application/json']);
        $response->assertJson([
            'success' => true,
        ]);
    }


    function test_excluir_clientes()
    {
        $cliente = Cliente::create([
            'nome' => 'Otavio Costa Lima',
            'cpf' => '05423698751',
            'sexo' => 'M',
            'email'  => 'otavio_slz15@hotmail.com'
        ]);

        $response = $this->deleteJson('/api/v1/clientes/' . $cliente->id, ['Accept' => 'application/json']);
        $response->assertJson([
            'success' => true,
        ]);
    }
}
