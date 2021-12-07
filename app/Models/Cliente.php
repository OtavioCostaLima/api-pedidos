<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'nome', 'cpf', 'sexo', 'email', 'data_excluido'
    ];

    function pedidos()
    {
        return $this->hasMany(Pedido::class, 'cliente_id');
    }
}
