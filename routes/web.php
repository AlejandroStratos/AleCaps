<?php

use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\FamiliaController;
use App\Http\Controllers\InteranteController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {return view('home');})->name('home');
Route::get('/nueva-encuesta/{famId}', [EncuestaController::class, 'create'])->name('encuesta.create');
Route::post('/guardar-encuesta', [EncuestaController::class, 'store'])->name('encuesta.store');

Route::get('/nuevo-integrante/{famId}', [InteranteController::class, 'create'])->name('integrante.create');
Route::post('/guardar-integrante', [InteranteController::class, 'store'])->name('integrante.store');

Route::get('/nueva-familia', [FamiliaController::class, 'create'])->name('familia.create');
Route::post('/guardar-familia', [FamiliaController::class, 'store'])->name('familia.store');

Route::get('/ver-encuestas', [EncuestaController::class, 'index'])->name('encuesta.index');
Route::delete('/encuestas/{encuestaId}', [EncuestaController::class, 'destroy'])->name('encuesta.destroy');

Route::get('/encuestas/{encuestaId}', [EncuestaController::class, 'show'])->name('encuesta.show');

Route::get('/familias/{famId}/editar', [FamiliaController::class, 'edit'])->name('familia.edit');
Route::put('/familias/{famId}', [FamiliaController::class, 'update'])->name('familia.update');

Route::get('/familias/{famId}/editar/integrantes', [InteranteController::class, 'edit'])->name('integrante.edit');
Route::put('/familias/{famId}/integrantes', [InteranteController::class, 'update'])->name('integrante.update');

Route::get('/encuestas/{encuestaId}/editar', [EncuestaController::class, 'edit'])->name('encuesta.edit');
Route::put('/encuestas/{encuestaId}', [EncuestaController::class, 'update'])->name('encuesta.update');

Route::get('/buscar-encuestas', [EncuestaController::class, 'buscarPorDomicilio'])->name('buscarEncuestas');