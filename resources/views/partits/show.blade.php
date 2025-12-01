@extends('layouts.app')

@section('title', "Detall del Partit")

@section('content')
    <div class="max-w-2xl mx-auto mt-8">
        
        {{-- Botón para volver --}}
        <div class="mb-6">
            <a href="{{ route('partits.index') }}" class="text-blue-600 hover:underline flex items-center gap-1">
                &larr; Tornar al llistat
            </a>
        </div>

        {{-- Tarjeta con estilo idéntico a Estadis --}}
        <div class="bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden">
            
            {{-- CABECERA AZUL (Igual que Estadis) --}}
            <div class="bg-blue-800 p-6">
                <h1 class="text-3xl font-bold text-white">
                    {{ $partit['local'] }} <span class="text-blue-300 mx-1">vs</span> {{ $partit['visitant'] }}
                </h1>
            </div>
            
            <div class="p-6 space-y-4">
                {{-- Campo: Data --}}
                <div class="border-b pb-4">
                    <span class="text-gray-500 uppercase text-sm font-bold">Data del partit</span>
                    <p class="text-xl text-gray-800 mt-1">
                        {{ \Carbon\Carbon::parse($partit['data'])->format('d/m/Y') }}
                    </p>
                </div>

                {{-- Campo: Resultat --}}
                <div>
                    <span class="text-gray-500 uppercase text-sm font-bold">Resultat Final</span>
                    @if(!empty($partit['resultat']))
                        <p class="text-2xl text-gray-800 mt-1 font-mono font-bold">
                            {{ $partit['resultat'] }}
                        </p>
                    @else
                        <p class="text-xl text-gray-400 mt-1 italic">
                            Pendent de jugar
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection