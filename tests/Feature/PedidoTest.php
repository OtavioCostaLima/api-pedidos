<?php

namespace Tests\Feature;

use App\Models\Produto;
use App\Models\Cliente;
use App\Models\ItensPedido;
use App\Models\Pedido;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PedidoTest extends TestCase
{
    use RefreshDatabase;

    public function test_cadastrar_pedido()
    {
        $cliente = Cliente::create([
            'nome' => 'Otavio Costa Lima',
            'cpf' => '05423698751',
            'sexo' => 'M',
            'email'  => 'otavio_slz15@hotmail.com'
        ]);

        Produto::factory(1)->create();
        Produto::factory(2)->create();


        $response = $this->postJson('/api/v1/pedidos', [
            'cliente_id' => 1,
            'forma_pagamento' => 'DINHEIRO',
            'observacao' => 'EMBRULHAR PARA PRESENTE',
            'produtos' => [
                [
                    'produto_id'  => 1,
                    'quantidade'  => 5
                ],
                [
                    'produto_id'  => 2,
                    'quantidade'  => 3
                ]
            ]
        ]);

        $response->assertJson([
            'success' => true,
        ]);
    }

    function test_listar_pedidos()
    {
        $response = $this->getJson('/api/v1/pedidos', ['Accept' => 'application/json']);
        $response->assertJson([
            'success' => true,
        ]);
    }

    function test_listar_pedido_por_id()
    {
        $cliente = Cliente::factory(1)->create();

        $produto = Produto::create([
            'nome' => 'Produto Teste',
            'cor' => 'Azul',
            'tamanho' => 'P',
            'valor' => '100.00',
        ]);

        $pedido = Pedido::create([
            'cliente_id' => 1,
            'forma_pagamento' => 'DINHEIRO',
            'observacao' => 'EMBRULHAR PARA PRESENTE'
        ]);

        ItensPedido::create([
            'pedido_id' => $pedido->id,
            'produto_id' => $produto->id,
            'descricao_produto' => $produto->nome,
            'quantidade' => 5,
            'valor_unitario' => $produto->valor,
            'valor_total' => $produto->valor * 5
        ]);

        $response = $this->getJson('/api/v1/pedidos/'.$pedido->id, ['Accept' => 'application/json']);
        $response->assertJson([
            'success' => true,
        ]);
    }

    public function test_atualizar_pedido()
    {
        Cliente::factory(1)->create();

        $produto = Produto::create([
            'nome' => 'Produto Teste',
            'cor' => 'Azul',
            'tamanho' => 'P',
            'valor' => '100.00',
        ]);

        $pedido = Pedido::create([
            'cliente_id' => 1,
            'forma_pagamento' => 'DINHEIRO',
            'observacao' => 'EMBRULHAR PARA PRESENTE'
        ]);

        ItensPedido::create([
            'pedido_id' => $pedido->id,
            'produto_id' => $produto->id,
            'descricao_produto' => $produto->nome,
            'quantidade' => 5,
            'valor_unitario' => $produto->valor,
            'valor_total' => $produto->valor * 5
        ]);


        $response = $this->putJson('/api/v1/produtos/' . $pedido->id, [
            'forma_pagamento' => 'CHEQUE',
            'produtos' => [
                [
                    'produto_id'  => 1,
                    'quantidade'  => 14
                ]
            ]
        ]);

        $response->assertJson([
            'success' => true,
        ]);
    }

    public function test_deletar_pedidos()
    {
        Cliente::factory(1)->create();

        $produto = Produto::create([
            'nome' => 'Produto Teste',
            'cor' => 'Azul',
            'tamanho' => 'P',
            'valor' => '100.00',
        ]);

        $pedido = Pedido::create([
            'cliente_id' => 1,
            'forma_pagamento' => 'DINHEIRO',
            'observacao' => 'EMBRULHAR PARA PRESENTE'
        ]);

        ItensPedido::create([
            'pedido_id' => $pedido->id,
            'produto_id' => $produto->id,
            'descricao_produto' => $produto->nome,
            'quantidade' => 5,
            'valor_unitario' => $produto->valor,
            'valor_total' => $produto->valor * 5
        ]);


        $response = $this->deleteJson('/api/v1/pedidos/' . $pedido->id, ['Accept' => 'application/json']);
        $response->assertJson([
            'success' => true,
        ]);
    }
}
