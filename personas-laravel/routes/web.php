
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PersonaController;

// Redirigir al login
Route::get('/', function () {
    return redirect()->route('login');
});

// Rutas de inicio de sesión
Route::get('/login', [LoginController::class, 'create'])
    ->name('login');

Route::post('/login', [LoginController::class, 'store'])
    ->middleware('throttle:6,1')
    ->name('login.store');

// Rutas protegidas
Route::middleware('auth')->group(function () {

    // Página de inicio
    Route::get('/inicio', function () {
        return redirect()->route('personas.index');
    })->name('inicio');

    // Listado de personas
    Route::get('/personas', [PersonaController::class, 'index'])
        ->name('personas.index');

    // Formulario para crear personas
    Route::get('/personas/crear', [PersonaController::class, 'create'])
        ->name('personas.create');

    // Guardar personas
    Route::post('/personas', [PersonaController::class, 'store'])
        ->name('personas.store');

    // Cerrar sesión
    Route::post('/logout', [LoginController::class, 'destroy'])
        ->name('logout');
});
