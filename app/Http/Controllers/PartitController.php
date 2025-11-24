<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PartitController extends Controller
{
    // Dades inicials (Seed)
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

    /**
     * Llistat de partits.
     * GET /partits
     */
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
        // Validació amb regles estrictes
        $validated = $request->validate([
            'local' => 'required|min:2',
            'visitant' => 'required|min:2|different:local', // No pot ser igual al local
            'data' => 'required|date', // Laravel accepta Y-m-d per defecte
            'resultat' => ['nullable', 'regex:/^\d+-\d+$/'], // Format ex: 2-1
        ], [
            // Missatges personalitzats
            'visitant.different' => "L'equip visitant no pot ser el mateix que el local.",
            'resultat.regex' => "El format del resultat ha de ser gols-gols (ex: 2-1).",
        ]);

        // Guardar en sessió
        $partits = Session::get('partits', $this->partits);
        $partits[] = $validated;
        Session::put('partits', $partits);

        return redirect()
            ->route('partits.index')
            ->with('success', 'Partit afegit correctament!');
    }
}