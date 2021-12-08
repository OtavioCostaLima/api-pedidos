<?php

namespace App\Mail;

use App\Models\Pedido;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailCliente extends Mailable
{

    protected $pedido;

    use Queueable, SerializesModels;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pedido = $this->pedido;
        return $this->subject('Relatorio de Pedidos')->view('pedidos.relatorio-email', compact('pedido'));
    }
}
