{{-- Extiende del layout principal --}}
@extends('layouts.app')

{{-- Título de la pestaña --}}
@section('title', 'Afegir nova jugadora')

{{-- Contenido principal --}}
@section('content')

    {{-- Título de la página --}}
    <h1 class="text-2xl font-bold mb-4">Afegir nova jugadora</h1>

    {{-- Enlace para volver --}}
    <div class="mb-4">
        <a href="{{ route('jugadores.index') }}" class="text-blue-600 hover:underline">
            &larr; Tornar al llistat
        </a>
    </div>

    {{-- Errores de validación --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulario limpio (sin tarjeta/caja) --}}
    <form action="{{ route('jugadores.store') }}" method="POST" class="space-y-4">
        @csrf

        {{-- Campo: Nom --}}
        <div>
            <label for="nom" class="block font-bold mb-1">Nom de la Jugadora:</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom') }}" class="border p-2 w-full rounded"
                placeholder="Ex: Alexia Putellas" required>
        </div>

        {{-- Campo: Equip --}}
        <div>
            <label for="equip" class="block font-bold mb-1">Equip:</label>
            <input type="text" name="equip" id="equip" value="{{ old('equip') }}" class="border p-2 w-full rounded"
                placeholder="Ex: Barça Femení" required>
        </div>

        {{-- Campo: Posició --}}
        <div>
            <label for="posicio" class="block font-bold mb-1">Posició:</label>
            <select name="posicio" id="posicio" class="border p-2 w-full rounded bg-white" required>
                <option value="" disabled selected>-- Selecciona una posició --</option>
                <option value="Portera" {{ old('posicio') == 'Portera' ? 'selected' : '' }}>Portera</option>
                <option value="Defensa" {{ old('posicio') == 'Defensa' ? 'selected' : '' }}>Defensa</option>
                <option value="Migcampista" {{ old('posicio') == 'Migcampista' ? 'selected' : '' }}>Migcampista</option>
                <option value="Davantera" {{ old('posicio') == 'Davantera' ? 'selected' : '' }}>Davantera</option>
            </select>
        </div>

        {{-- Botón Guardar --}}
        <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
            Afegir
        </button>

    </form>
@endsection