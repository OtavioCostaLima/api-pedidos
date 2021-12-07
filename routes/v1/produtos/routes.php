<?php

use App\Dominio\V1\Produto\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1', 'as' => 'api.'], function () {
    Route::resource('produtos', ProdutoController::class, ['except' => ['create', 'edit']]);
});
