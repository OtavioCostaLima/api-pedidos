<?php

namespace App\Dominio\V1\Produtos;

use App\Http\Requests\ApiFormRequest;

class ProdutoRequest extends ApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|string|max:150',
            'cor' => 'required|string',
            'tamanho' => 'required|in:P,M,G,GG',
            'valor' => 'required|numeric',
        ];
    }
}
