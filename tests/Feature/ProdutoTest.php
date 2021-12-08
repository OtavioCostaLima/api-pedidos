<?php

namespace Tests\Feature;

use App\Models\Produto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProdutoTest extends TestCase
{
    use RefreshDatabase;

    public function test_cadastrar_produto()
    {

        $response = $this->postJson('/api/v1/produtos', [
            'nome' => 'Produto Teste',
            'cor' => 'Azul',
            'tamanho' => 'P',
            'valor' => '100.00',
        ]);

        $response->assertJson([
            'success' => true,
        ]);
    }

    public function test_listar_produtos()
    {
        $response = $this->getJson('/api/v1/produtos', ['Accept' => 'application/json']);
        $response->assertJson([
            'success' => true,
        ]);
    }

    public function test_listar_produto_por_id()
    {
        $produto = Produto::create([
            'nome' => 'Produto Teste',
            'cor' => 'Azul',
            'tamanho' => 'P',
            'valor' => '100.00',
        ]);

        $response = $this->getJson('/api/v1/produtos/' . $produto->id, ['Accept' => 'application/json']);
        $response->assertJson([
            'success' => true,
        ]);
    }

    public function test_atualizar_produto()
    {
        $produto = Produto::create([
            'nome' => 'Produto Teste',
            'cor' => 'Azul',
            'tamanho' => 'P',
            'valor' => '100.00',
        ]);

        $response = $this->putJson('/api/v1/produtos/' . $produto->id, [
            'nome' => 'Produto Teste Atualizado',
        ]);

        $response->assertJson([
            'success' => true,
        ]);
    }

    public function test_deletar_produto()
    {
        $produto = Produto::create([
            'nome' => 'Produto Teste',
            'cor' => 'Azul',
            'tamanho' => 'P',
            'valor' => '100.00',
        ]);

        $response = $this->deleteJson('/api/v1/produtos/' . $produto->id, ['Accept' => 'application/json']);
        $response->assertJson([
            'success' => true,
        ]);
    }
}
