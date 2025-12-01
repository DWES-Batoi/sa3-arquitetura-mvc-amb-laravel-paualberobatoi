<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PartitController extends Controller
{
    // Dades inicials
    public $partits = [
        [
            'local' => 'Barça Femení', 
            'visitant' => 'Atlètic de Madrid', 
            'data' => '2024-11-30', 
            'resultat' => null
        ],
        [
            'local' => 'Real Madrid Femení', 
            'visitant' => 'Barça Femení', 
            'data' => '2024-12-15', 
            'resultat' => '0-3'
        ],
    ];

    public function index()
    {
        $partits = Session::get('partits', $this->partits);
        return view('partits.index', compact('partits'));
    }

    public function create()
    {
        return view('partits.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'local' => 'required|min:2',
            'visitant' => 'required|min:2|different:local',
            'data' => 'required|date',
            'resultat' => ['nullable', 'regex:/^\d+-\d+$/'], // Ex: 2-1
        ], [
            'visitant.different' => "L'equip visitant no pot ser el mateix que el local.",
            'resultat.regex' => "El format ha de ser gols-gols (ex: 2-1).",
        ]);

        $partits = Session::get('partits', $this->partits);
        $partits[] = $validated;
        Session::put('partits', $partits);

        return redirect()
            ->route('partits.index')
            ->with('success', 'Partit afegit correctament!');
    }
    public function show($id)
    {
        // Recuperem els partits de la sessió
        $partits = Session::get('partits', $this->partits);

        // Si l'índex no existeix, tornem error 404
        if (!isset($partits[$id])) {
            abort(404);
        }

        // Recuperem el partit concret
        $partit = $partits[$id];

        // Carreguem la vista de detall
        return view('partits.show', compact('partit'));
    }
}