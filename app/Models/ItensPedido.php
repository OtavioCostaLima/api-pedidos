<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItensPedido extends Model
{
    use HasFactory;

    protected $table = 'itens_pedidos';

    protected $fillable = [
        'pedido_id', 'produto_id', 'quantidade', 'descricao_produto', 'valor_unitario', 'valor_total'
    ];

    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class, 'produto_id', 'id');
    }

    public function pedido(): BelongsTo
    {
        return $this->belongsTo(Pedido::class, 'pedido_id', 'id');
    }
}
