<?php

namespace App\Dominio\V1\Clientes;

use App\Http\Requests\ApiFormRequest;

class ClienteRequest extends ApiFormRequest
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
            'cpf' => 'required|cpf|unique:clientes,cpf',
            'sexo' => 'required|in:M,F',
            'email' => 'required|email|unique:clientes,email',
        ];
    }
}
