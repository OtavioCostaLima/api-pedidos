<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\pt_BR\Person;

class ClienteFactory extends Factory
{

    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new Person($this->faker));

        return [
            'nome' => $this->faker->name,
            'cpf' => $this->faker->cpf(false),
            'sexo' => $this->faker->randomElement(['M', 'F']),
            'email'  => $this->faker->safeEmail(),
        ];
    }
}
