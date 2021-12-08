<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoFactory extends Factory
{

    protected $model = Pedido::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' => Cliente::all()->random()->id,
            'forma_pagamento' => $this->faker->randomElement(['DINHEIRO', 'CHEQUE', 'CARTAO']),
            'observacao' => $this->faker->text(255),
        ];
    }
}
