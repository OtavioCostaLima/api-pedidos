<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cliente = new Cliente();
        $cliente->create([
            'nome' => 'Otavio Costa Lima',
            'email' => 'otavio_slz15@hotmail.com',
            'cpf' => '12345678901',
            'sexo' => 'M'
        ]);

        $cliente->create([
            'nome' => 'Joao Silva',
            'email' => 'otaviocosta23@hotmail.com',
            'cpf' => '12345678902',
            'sexo' => 'M'
        ]);

        $cliente->create([
            'nome' => 'Maria Linda',
            'email' => 'freestepotavio@hotmail.com',
            'cpf' => '12345678903',
            'sexo' => 'F'
        ]);
    }
}
