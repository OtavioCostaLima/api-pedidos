<?php

namespace App\Dominio\V1\Pedidos;

use App\Http\Requests\ApiFormRequest;

class PedidoRequest extends ApiFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cliente_id' => 'required|integer',
            'observacoes'   => 'nullable|string',
            'forma_pagamento'  => 'required|string|in:DINHEIRO,CARTAO,CHEQUE',
        ];
    }
}
