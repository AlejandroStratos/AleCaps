<?php

use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\FamiliaController;
use App\Http\Controllers\IntegranteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

 Route::middleware(['auth'])->group(function () {  

    // Página de inicio protegida
    Route::get('/', function () {return view('home');})->name('home');

    // Excel
    Route::get('/ver-encuestas/collection', [EncuestaController::class, 'collection'])->name('encuesta.export.collection');
    Route::get('/ver-encuestas/view', [EncuestaController::class, 'view'])->name('encuesta.export.view');

    // Rutas de Encuestas
    Route::get('/nueva-encuesta/{famId}', [EncuestaController::class, 'create'])->name('encuesta.create');
    Route::post('/guardar-encuesta', [EncuestaController::class, 'store'])->name('encuesta.store');
    Route::get('/ver-encuestas', [EncuestaController::class, 'index'])->name('encuesta.index');
    Route::get('/encuestas/{encuestaId}', [EncuestaController::class, 'show'])->name('encuesta.show');
    Route::get('/encuestas/{encuestaId}/editar', [EncuestaController::class, 'edit'])->name('encuesta.edit');
    Route::put('/encuestas/{encuestaId}', [EncuestaController::class, 'update'])->name('encuesta.update');
    Route::delete('/encuesta/{encuestaId}', [EncuestaController::class, 'destroy'])->name('encuesta.destroy');
    Route::get('/buscar-encuestas', [EncuestaController::class, 'buscarPorDomicilio'])->name('buscarEncuestas');
    Route::get('/encuestas/search', [EncuestaController::class, 'search'])->name('encuesta.search');

    // Rutas de Integrantes
    Route::get('/nuevo-integrante/{famId}', [IntegranteController::class, 'create'])->name('integrante.create');
    Route::post('/guardar-integrante', [IntegranteController::class, 'store'])->name('integrante.store');
    Route::delete('/encuestas/{id}', [IntegranteController::class, 'destroy'])->name('integrante.destroy');
    Route::get('/familias/{famId}/editar/integrantes', [IntegranteController::class, 'edit'])->name('integrante.edit');
    Route::put('/familias/{famId}/integrantes', [IntegranteController::class, 'update'])->name('integrante.update');

    // Rutas de Familias
    Route::get('/nueva-familia', [FamiliaController::class, 'create'])->name('familia.create');
    Route::post('/guardar-familia', [FamiliaController::class, 'store'])->name('familia.store');
    Route::get('/familias/{famId}/editar', [FamiliaController::class, 'edit'])->name('familia.edit');
    Route::put('/familias/{famId}', [FamiliaController::class, 'update'])->name('familia.update');

    // Rutas de Barrios
    Route::get('/barrios/{capId}', [EncuestaController::class, 'getBarriosByCapId']);

    // Rutas de Configuración de Usuario
    Route::get('/usuario',[UserController::class, 'create'])->name('usuario.create');
    Route::get('/usuario',[UserController::class, 'index'])->name('usuario.index');
    Route::post('/usuario',[UserController::class, 'store'])->name('usuario.store');
    Route::post('usuario/reAsignar',[UserController::class, 'asignar'])->name('usuario.asignar');
    Route::delete('usuario/{id}', [UserController::class, 'destroy'])->name('usuario.destroy');
    Route::get('usuario/editar/{id}', [UserController::class, 'edit'])->name('usuario.edit');
    Route::put('usuario/editar/{id}', [UserController::class, 'update'])->name('usuario.update');
 }); 

// Rutas de Autenticación (sin protección)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); 
