<?php

namespace App\Dominio\V1\Pedidos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    protected $pedidoRepository;
    protected $pedidoServices;

    public function __construct(PedidoRepository $pedidoRepository, PedidoServices $pedidoServices)
    {
        $this->pedidoRepository = $pedidoRepository;
        $this->pedidoServices = $pedidoServices;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->pedidoRepository->getPedidos();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PedidoRequest $request)
    {
        $params = $request->except('data_excluido');
        return $this->pedidoRepository->cadastrar($params);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->pedidoRepository->getPedidoPorId($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $params = $request->except('data_excluido');
        return $this->pedidoRepository->atualizar($params, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->pedidoRepository->excluir($id);
    }

    public function enviarPedidoPorEmail($id)
    {
        return $this->pedidoServices->enviarPedidoPorEmail($id);
    }

    public function enviarPedidoEmPDF($id)
    {
        return $this->pedidoServices->enviarPedidoEmPDF($id);
    }
}
