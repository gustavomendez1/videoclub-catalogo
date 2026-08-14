<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;

// 1. La ruta raíz sigue siendo pública y redirige al home o catálogo
Route::get('/', [HomeController::class, 'getHome']);

// 2. AGRUPAMOS LAS RUTAS DEL CATÁLOGO BAJO EL MIDDLEWARE DE AUTENTICACIÓN
Route::middleware(['auth'])->group(function () {
    
    // Listado y Detalle
    Route::get('/catalog', [CatalogController::class, 'getIndex'])->name('dashboard');
    Route::get('/catalog/show/{id}', [CatalogController::class, 'getShow']);

    // Creación de películas
    Route::get('/catalog/create', [CatalogController::class, 'getCreate']);
    Route::post('/catalog/create', [CatalogController::class, 'postCreate']);

    // Edición de películas
    Route::get('/catalog/edit/{id}', [CatalogController::class, 'getEdit']);
    Route::put('/catalog/edit/{id}', [CatalogController::class, 'putEdit']);

    // Acciones de Alquiler y Devolución
    Route::put('/catalog/rent/{id}', [CatalogController::class, 'putRent']);
    Route::put('/catalog/return/{id}', [CatalogController::class, 'putReturn']);

    // Eliminación de películas
    Route::delete('/catalog/delete/{id}', [CatalogController::class, 'deleteMovie']);
});

// 3. ⚠️ AQUÍ ESTÁ EL TRUCO PARA BREEZE:
// Este archivo 'auth.php' contiene las rutas reales de /register y /login de Breeze.
// ¡SIEMPRE DEBE IR AL FINAL DEL ARCHIVO!
require __DIR__.'/auth.php';