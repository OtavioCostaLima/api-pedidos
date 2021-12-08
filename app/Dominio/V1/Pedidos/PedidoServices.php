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

    public function enviarPedidoEmPDF($pedidoId)
    {

        $pedido = Pedido::whereNull('data_excluido')->find($pedidoId);

        if(!$pedido){
            return $this->error('Pedido não encontrado!', 404);
        }

        $output = storage_path("/tmp/".uniqid().".pdf");
        $pdf = \PDF::loadView('pedidos.relatorio-email', compact('pedido'))->save($output);

        if (!file_exists($output)) {
            return $this->error('Não Foi Possível Gerar o Relatório do Pedido!', 500);
        }

        $file = file_get_contents($output);
        unlink($output);

        $nomeArquivo = 'Pedido_' . $pedido->id . '.pdf';

        return response($file, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', "inline; filename=$nomeArquivo.pdf");
    }
}
