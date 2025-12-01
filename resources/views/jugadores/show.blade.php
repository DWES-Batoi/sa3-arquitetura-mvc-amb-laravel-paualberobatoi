@extends('layouts.app')

@section('title', "Detall de la Jugadora")

@section('content')
    <div class="max-w-2xl mx-auto mt-8">
        
        {{-- Botón para volver --}}
        <div class="mb-6">
            <a href="{{ route('jugadores.index') }}" class="text-blue-600 hover:underline flex items-center gap-1">
                &larr; Tornar al llistat
            </a>
        </div>

        {{-- Tarjeta con estilo idéntico a Estadis --}}
        <div class="bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden">
            
            {{-- CABECERA AZUL (Igual que Estadis) --}}
            <div class="bg-blue-800 p-6">
                <h1 class="text-3xl font-bold text-white">{{ $jugadora['nom'] }}</h1>
            </div>
            
            <div class="p-6 space-y-4">
                {{-- Campo: Equip --}}
                <div class="border-b pb-4">
                    <span class="text-gray-500 uppercase text-sm font-bold">Equip</span>
                    <p class="text-xl text-gray-800 mt-1">{{ $jugadora['equip'] }}</p>
                </div>

                {{-- Campo: Posició --}}
                <div>
                    <span class="text-gray-500 uppercase text-sm font-bold">Posició</span>
                    <p class="text-xl text-gray-800 mt-1 font-medium">
                        {{ $jugadora['posicio'] }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection