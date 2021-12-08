<?php

namespace Database\Factories;

use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItensPedidoFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            $produto = Produto::inRandomOrder()->first();
            $pedido = Pedido::inRandomOrder()->first();

            $quantidade = $this->faker->numberBetween(1, 4);

        return [
            'pedido_id' => $pedido->id,
            'produto_id' => $produto->id,
            'quantidade' => $quantidade,
            'descricao_produto' => $produto->nome,
            'valor_unitario' =>  $produto->valor,
            'valor_total' => $produto->valor * $quantidade,
        ];
    }
}
