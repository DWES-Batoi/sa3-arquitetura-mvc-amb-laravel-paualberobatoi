<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipController;
use App\Http\Controllers\EstadiController;

// Ruta de bienvenida (GET /)
Route::get('/', fn() => "Benvingut a la Guia d'Equips de Futbol Femení!");

// Genera automáticamente varias rutas REST para 'equips'
Route::resource('equips', EquipController::class);

// --- RUTAS MANUALES DE ESTADIS ---

// 1. Llistat (GET /estadis) -> Apunta a 'index'
Route::get('/estadis', [EstadiController::class, 'index'])
    ->name('estadis.index');

// 2. Formulari (GET /estadis/crear) -> Apunta a 'create'
// IMPORTANTE: Debe ir ANTES de la ruta /{id} para que Laravel no confunda "crear" con un ID
Route::get('/estadis/crear', [EstadiController::class, 'create'])
    ->name('estadis.create');

// 3. Guardar (POST /estadis) -> Apunta a 'store'
Route::post('/estadis', [EstadiController::class, 'store'])
    ->name('estadis.store');

// 4. Detalle (GET /estadis/{id}) -> Apunta a 'show'
// Esta ruta hace funcionar el enlace del nombre en la tabla
Route::get('/estadis/{id}', [EstadiController::class, 'show'])
    ->name('estadis.show');