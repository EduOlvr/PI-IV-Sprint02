<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultaController; // Importação única

// Rota principal (ajuste conforme necessário)
Route::get('/', function () {
    return view('painel');
});

// Rotas para Consultas
Route::get('/consultas', [ConsultaController::class, 'index']);
Route::get('/agendar', [ConsultaController::class, 'create']);
Route::post('/agendar', [ConsultaController::class, 'store']);
Route::delete('/consultas/{id}', [ConsultaController::class, 'destroy']);
