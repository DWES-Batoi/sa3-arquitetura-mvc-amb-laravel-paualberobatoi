<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipController;
use App\Http\Controllers\EstadiController;
use App\Http\Controllers\JugadoraController;
use App\Http\Controllers\PartitController;

// Ruta de benvinguda
Route::get('/', fn() => "Benvingut a la Guia d'Equips de Futbol Femení!");

// Rutes d'Equips
Route::resource('equips', EquipController::class);

// --- ESTADIS ---
Route::get('/estadis', [EstadiController::class, 'index'])->name('estadis.index');
Route::get('/estadis/crear', [EstadiController::class, 'create'])->name('estadis.create');
Route::post('/estadis', [EstadiController::class, 'store'])->name('estadis.store');
Route::get('/estadis/{id}', [EstadiController::class, 'show'])->name('estadis.show');

// --- JUGADORES ---
Route::get('/jugadores', [JugadoraController::class, 'index'])->name('jugadores.index');
Route::get('/jugadores/crear', [JugadoraController::class, 'create'])->name('jugadores.create');
Route::post('/jugadores', [JugadoraController::class, 'store'])->name('jugadores.store');
Route::get('/jugadores/{id}', [JugadoraController::class, 'show'])->name('jugadores.show');

// --- PARTITS ---
Route::get('/partits', [PartitController::class, 'index'])->name('partits.index');
Route::get('/partits/crear', [PartitController::class, 'create'])->name('partits.create');
Route::post('/partits', [PartitController::class, 'store'])->name('partits.store');
Route::get('/partits/{id}', [PartitController::class, 'show'])->name('partits.show');