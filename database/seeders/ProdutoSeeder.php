<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produto = new Produto();


        $produto->create([
            'nome' => "Camiseta Masculina",
            'valor' => "12.00",
            'tamanho' => 1,
            'cor' => 'Vermelho',

        ]);

        $produto->create([
            'nome' => "Calça Feminina",
            'valor' => "13.00",
            'tamanho' => 1,
            'cor' => 'Verde',

        ]);

        $produto->create([
            'nome' => "Boné",
            'valor' => "6.00",
            'tamanho' => 2,
            'cor' => 'Azul',

        ]);

        $produto->create([
            'nome' => "Casaco",
            'valor' => "35.00",
            'tamanho' => 2,
            'cor' => 'red',

        ]);

        $produto->create([
            'nome' => "Tênis 1",
            'valor' => "4.00",
            'tamanho' => 3,
            'cor' => 'Preto',

        ]);

        $produto->create([
            'nome' => "Guaraná 350ml",
            'valor' => "3.50",
            'tamanho' => 3,
            'cor' => 'red',

        ]);

        $produto->create([
            'nome' => "Budweiser long neck",
            'valor' => "5.00",
            'tamanho' => 4,
            'cor' => 'red',

        ]);

        $produto->create([
            'nome' => "Camiseta Masculina",
            'valor' => "12.00",
            'tamanho' => 1,
            'cor' => 'red',

        ]);

        $produto->create([
            'nome' => "Calça Feminina",
            'valor' => "13.00",
            'tamanho' => 1,
            'cor' => 'red',

        ]);

        $produto->create([
            'nome' => "Boné",
            'valor' => "6.00",
            'tamanho' => 2,
            'cor' => 'red',

        ]);

        $produto->create([
            'nome' => "Casaco",
            'valor' => "35.00",
            'tamanho' => 2,
            'cor' => 'red',

        ]);

        $produto->create([
            'nome' => "Tênis",
            'valor' => "4.00",
            'tamanho' => 3,
            'cor' => 'red',

        ]);

        $produto->create([
            'nome' => "Guaraná 350ml",
            'valor' => "3.50",
            'tamanho' => 3,
            'cor' => 'red',

        ]);

        $produto->create([
            'nome' => "Budweiser long neck",
            'valor' => "5.00",
            'tamanho' => 4,
            'cor' => 'red',

        ]);
    }
}
