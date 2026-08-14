<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APICatalogController; // 👈 ESTA LÍNEA ES OBLIGATORIA
use App\Http\Controllers\CatalogController;

Route::prefix('v1')->group(function() {
    
    // 1. Rutas Públicas
    Route::get('/catalog', [APICatalogController::class, 'index']);
    Route::get('/catalog/{id}', [APICatalogController::class, 'show']);

    // 2. Rutas Privadas (Protegidas con autenticación básica sin estado)
    Route::middleware('auth.basic.once')->group(function() {
        Route::post('/catalog', [APICatalogController::class, 'store']);
        Route::put('/catalog/{id}', [APICatalogController::class, 'update']);
        Route::delete('/catalog/{id}', [APICatalogController::class, 'destroy']);
        Route::put('/catalog/{id}/rent', [APICatalogController::class, 'putRent']);
        Route::put('/catalog/{id}/return', [APICatalogController::class, 'putReturn']);
    });
    // Esta ruta responderá en http://localhost:8000/api/peliculas
        Route::get('/peliculas', [CatalogController::class, 'getApiPeliculas']);
    
});