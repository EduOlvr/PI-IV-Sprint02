<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PacienteController;

// Rota do Painel (Dashboard)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Rota principal (Redireciona para o Dashboard)
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Rotas para Consultas
Route::get('/consultas', [ConsultaController::class, 'index'])->name('consultas.index');
Route::get('/agendar', [ConsultaController::class, 'create'])->name('consultas.create');
Route::post('/agendar', [ConsultaController::class, 'store'])->name('consultas.store');
Route::delete('/consultas/{id}', [ConsultaController::class, 'destroy'])->name('consultas.destroy');

// Rotas para Cadastro de Pacientes
Route::get('/cadastro-paciente', [PacienteController::class, 'create'])->name('pacientes.create');
Route::post('/cadastro-paciente', [PacienteController::class, 'store'])->name('pacientes.store');

// Rota para listar pacientes cadastrados
Route::get('/pacientes', [PacienteController::class, 'index'])->name('pacientes.index');


// Rota para editar ficha paciente 
Route::delete('/pacientes/{id}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');
Route::put('/pacientes/{id}', [PacienteController::class, 'update'])->name('pacientes.update');
Route::get('/pacientes/{id}/edit', [PacienteController::class, 'edit'])->name('pacientes.edit');

Route::get('/agendar', [ConsultaController::class, 'create'])->name('agendar.create');

Route::get('/pacientes/{id}', [PacienteController::class, 'show'])->name('pacientes.show');


Route::post('/consultas', [ConsultaController::class, 'store'])->name('consultas.store');

// Rota para buscar ao paciente pelo CPF
Route::get('/buscar-paciente/{cpf}', [ConsultaController::class, 'buscarPaciente']);


// Buscar paciente pelo CPF
Route::get('/buscar-paciente/{cpf}', [PacienteController::class, 'buscarPorCpf']);


Route::get('/consultas', [ConsultaController::class, 'index'])->name('consultas.index');

Route::get('/consultas/{id}/edit', [ConsultaController::class, 'edit'])->name('consultas.edit');
Route::put('/consultas/{id}', [ConsultaController::class, 'update'])->name('consultas.update');
