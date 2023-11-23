<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\brandsController;

/*
|--------------------------------------------------------------------------
| Rutas API
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar las rutas API para tu aplicación. Estas
| rutas son cargadas por RouteServiceProvider y todas serán asignadas al
| grupo de middleware "api". ¡Haz algo grandioso!
|
*/

// Define una ruta que requiere autenticación sanctum para obtener la información del usuario
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas para las marcas de computadoras
Route::prefix('computer_brands')->group(function() {
    Route::get('/', [brandsController::class, 'get']);
    Route::post('/create', [brandsController::class, 'create']);
    Route::get('/show/{id}', [brandsController::class, 'getById']);
    Route::put('/update/{id}', [brandsController::class, 'update']);
    Route::delete('/delete/{id}', [brandsController::class, 'delete']);
});
