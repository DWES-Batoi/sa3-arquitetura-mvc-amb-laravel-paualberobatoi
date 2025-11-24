@extends('layouts.app')

@section('title', 'Nou Partit')

@section('content')
<div class="max-w-2xl mx-auto mt-6">
    
    <div class="mb-6">
        <a href="{{ route('partits.index') }}" class="text-blue-600 hover:underline">
            &larr; Tornar al llistat
        </a>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-100 p-8">
        <h2 class="text-2xl font-bold text-blue-800 mb-6">Alta de Nou Partit</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 mb-6 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('partits.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Local --}}
                <div>
                    <label for="local" class="block font-bold text-gray-700 mb-1">Equip Local</label>
                    <input type="text" name="local" id="local" value="{{ old('local') }}" 
                           class="w-full border border-gray-300 rounded p-2" 
                           placeholder="Ex: Barça Femení" required>
                </div>

                {{-- Visitant --}}
                <div>
                    <label for="visitant" class="block font-bold text-gray-700 mb-1">Equip Visitant</label>
                    <input type="text" name="visitant" id="visitant" value="{{ old('visitant') }}" 
                           class="w-full border border-gray-300 rounded p-2" 
                           placeholder="Ex: Reial Madrid" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Data --}}
                <div>
                    <label for="data" class="block font-bold text-gray-700 mb-1">Data del partit</label>
                    <input type="date" name="data" id="data" value="{{ old('data') }}" 
                           class="w-full border border-gray-300 rounded p-2" required>
                </div>

                {{-- Resultat (Opcional) --}}
                <div>
                    <label for="resultat" class="block font-bold text-gray-700 mb-1">Resultat <span class="text-sm font-normal text-gray-500">(Opcional)</span></label>
                    <input type="text" name="resultat" id="resultat" value="{{ old('resultat') }}" 
                           class="w-full border border-gray-300 rounded p-2" 
                           placeholder="Ex: 2-1">
                </div>
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit" class="bg-orange-500 text-white font-bold py-2 px-6 rounded hover:bg-orange-600 transition">
                    Guardar Partit
                </button>
            </div>
        </form>
    </div>
</div>
@endsection