<?php

namespace Database\Factories;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{

    protected $model = Produto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'cor' => $this->faker->randomElement(['VERMELHO', 'AZUL', 'VERDE', 'AMARELO', 'LARANJA', 'PRETO', 'BRANCO']),
            'tamanho' => $this->faker->randomElement(['P', 'M', 'G', 'GG']),
            'valor' => $this->faker->randomFloat(2, 1, 100)
        ];
    }
}
