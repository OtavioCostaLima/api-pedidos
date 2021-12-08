<?php

namespace App\Dominio\V1\Pedidos;

use App\Mail\SendMailCliente;
use App\Models\Pedido;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Mail;

class PedidoServices
{

    use ApiResponse;

    public function enviarPedidoPorEmail($pedidoId)
   {

    $pedido = Pedido::find($pedidoId);

     Mail::to($pedido->cliente->email)
    ->send(new SendMailCliente($pedido));
    return $this->success('Pedido enviado com sucesso!');
   }

   public function gerarRelatorioEmPDF()
   {

   }

}
