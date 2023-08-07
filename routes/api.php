<?php

use App\Http\Controllers\Api\CidadeController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\MedicoController;
use App\Http\Controllers\Api\PacienteController;
use App\Http\Controllers\Api\PivotMedicoPacienteController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

// Rotas Públicas
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('cidades', [CidadeController::class, 'index'])->name('cidades.index');
Route::get('cidades/{cidade_id}/medicos', [CidadeController::class, 'medicos'])->name('cidades.medicos');
Route::get('medicos', [MedicoController::class, 'index'])->name('medicos.index');

//Rotas Auth JWT
Route::group([ 'middleware' => 'auth:api'], function () {
    Route::controller(UserController::class)->group(function() {
        Route::get('/user', 'index')->name('user.index');
    });
    Route::controller(MedicoController::class)->group(function() {
        Route::post('medicos', 'store')->name('medicos.store');
        Route::get('medicos/{medico_id}/pacientes', 'pacientes')->name('medicos.pacientes');
    });
    Route::controller(PivotMedicoPacienteController::class)->group(function() {
        Route::post('medicos/{medico_id}/pacientes', 'store')->name('pivotmedicopaciente.store');
    });
    Route::controller(PacienteController::class)->group(function() {
        Route::put('pacientes/{paciente_id}', 'update')->name('pacientes.update');
        Route::post('pacientes', 'store')->name('pacientes.store');
    });
});



