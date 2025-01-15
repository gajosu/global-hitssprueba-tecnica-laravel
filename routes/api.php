<?php

use App\Http\Controllers\API\CargoController;
use App\Http\Controllers\API\DepartamentoController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('users', UserController::class);
Route::get('departamentos', [DepartamentoController::class, 'index']);
Route::get('cargos', [CargoController::class, 'index']);
