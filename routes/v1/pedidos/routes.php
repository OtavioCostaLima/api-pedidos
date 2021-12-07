<?php

use App\Dominio\V1\Pedidos\PedidoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1', 'as' => 'api.'], function () {
    Route::resource('pedidos', PedidoController::class, ['except' => ['create', 'edit']]);
});