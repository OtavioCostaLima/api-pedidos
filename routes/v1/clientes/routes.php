<?php

use App\Dominio\V1\Clientes\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1', 'as' => 'api.'], function () {
    Route::resource('clientes', ClienteController::class, ['except' => ['create', 'edit']]);
});
