@extends('layouts.app')

@section('title', "Detall de l'Estadi")

@section('content')
    <div class="max-w-2xl mx-auto mt-8">
        
        {{-- Botón para volver al listado --}}
        <div class="mb-6">
            <a href="{{ route('estadis.index') }}" class="text-blue-600 hover:underline flex items-center gap-1">
                &larr; Tornar al llistat
            </a>
        </div>

        {{-- Tarjeta con los detalles del estadio --}}
        <div class="bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden">
            <div class="bg-blue-800 p-6">
                {{-- Título con el nombre del estadio --}}
                <h1 class="text-3xl font-bold text-white">{{ $estadi['nom'] }}</h1>
            </div>
            
            <div class="p-6 space-y-4">
                {{-- Ciudad --}}
                <div class="border-b pb-4">
                    <span class="text-gray-500 uppercase text-sm font-bold">Ciutat</span>
                    <p class="text-xl text-gray-800 mt-1">{{ $estadi['ciutat'] }}</p>
                </div>

                {{-- Capacidad --}}
                <div class="border-b pb-4">
                    <span class="text-gray-500 uppercase text-sm font-bold">Capacitat</span>
                    <p class="text-xl text-gray-800 mt-1 font-mono">
                        {{ number_format($estadi['capacitat'], 0, ',', '.') }} espectadors
                    </p>
                </div>

                {{-- Equipo Principal --}}
                <div>
                    <span class="text-gray-500 uppercase text-sm font-bold">Equip Principal</span>
                    <p class="text-xl text-blue-700 mt-1 font-medium">
                        {{ $estadi['equip_principal'] }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection