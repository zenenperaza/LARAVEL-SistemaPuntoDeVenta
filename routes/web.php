<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('almacen/categoria', CategoriaController::class);
Route::resource('almacen/producto', ProductoController::class);
Route::resource('ventas/clientes', ClienteController::class);