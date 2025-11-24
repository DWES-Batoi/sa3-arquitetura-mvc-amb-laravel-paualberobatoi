<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipController;
use App\Http\Controllers\EstadiController;
use App\Http\Controllers\JugadoraController;
use App\Http\Controllers\PartitController; // <--- ¡IMPORTANTE! Añadido PartitController

// Ruta de bienvenida
Route::get('/', fn() => "Benvingut a la Guia d'Equips de Futbol Femení!");

// Rutas de Equipos (Resource)
Route::resource('equips', EquipController::class);

// --- ESTADIS ---
Route::get('/estadis', [EstadiController::class, 'index']) ->name('estadis.index');
Route::get('/estadis/crear', [EstadiController::class, 'create']) ->name('estadis.create');
Route::post('/estadis', [EstadiController::class, 'store'])  ->name('estadis.store');
Route::get('/estadis/{id}', [EstadiController::class, 'show'])->name('estadis.show');

// --- JUGADORES  ---

// 1. Listado 
Route::get('/jugadores', [JugadoraController::class, 'index'])->name('jugadores.index');

// 2. Formulario 
Route::get('/jugadores/crear', [JugadoraController::class, 'create'])->name('jugadores.create');

// 3. Guardar
Route::post('/jugadores', [JugadoraController::class, 'store'])->name('jugadores.store');

// 4. Detalle   
Route::get('/jugadores/{id}', [JugadoraController::class, 'show'])->name('jugadores.show');


// --- PARTITS  ---

// 1. Listado
Route::get('/partits', [PartitController::class, 'index'])->name('partits.index');

// 2. Formulario (Personalizado en catalán)
Route::get('/partits/crear', [PartitController::class, 'create'])->name('partits.create');

// 3. Guardar
Route::post('/partits', [PartitController::class, 'store'])->name('partits.store');