<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class JugadoraController extends Controller
{
    // Dades inicials (Seed)
    public $jugadores = [
        ['nom' => 'Alexia Putellas', 'equip' => 'Barça Femení', 'posicio' => 'Migcampista'],
        ['nom' => 'Esther González', 'equip' => 'Atlètic de Madrid', 'posicio' => 'Davantera'],
        ['nom' => 'Misa Rodríguez', 'equip' => 'Real Madrid Femení', 'posicio' => 'Portera'],
    ];

    public function index()
    {
        $jugadores = Session::get('jugadores', $this->jugadores);
        return view('jugadores.index', compact('jugadores'));
    }


    public function create()
    {
        return view('jugadores.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|min:3',
            'equip' => 'required|min:2',
            'posicio' => ['required', Rule::in(['Portera', 'Defensa', 'Migcampista', 'Davantera', 'Pixixi'])],
        ]);

        $jugadores = Session::get('jugadores', $this->jugadores);
        $jugadores[] = $validated;
        Session::put('jugadores', $jugadores);

        return redirect()
            ->route('jugadores.index')
            ->with('success', 'Jugadora afegida correctament!');
    }
}