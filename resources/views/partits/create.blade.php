{{-- Extiende del layout principal --}}
@extends('layouts.app')

{{-- Título de la pestaña --}}
@section('title', 'Afegir nou partit')

{{-- Contenido principal --}}
@section('content')

  {{-- Título de la página --}}
  <h1 class="text-2xl font-bold mb-4">Afegir nou partit</h1>

  {{-- Enlace para volver --}}
  <div class="mb-4">
    <a href="{{ route('partits.index') }}" class="text-blue-600 hover:underline">
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

  {{-- Formulario limpio (sin tarjeta) --}}
  <form action="{{ route('partits.store') }}" method="POST" class="space-y-4">
    @csrf

    {{-- Fila 1: Local y Visitante --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        {{-- Campo: Local --}}
        <div>
          <label for="local" class="block font-bold mb-1">Equip Local:</label>
          <input type="text" name="local" id="local" value="{{ old('local') }}" 
                 class="border p-2 w-full rounded" 
                 placeholder="Ex: Barça Femení" required>
        </div>

        {{-- Campo: Visitant --}}
        <div>
          <label for="visitant" class="block font-bold mb-1">Equip Visitant:</label>
          <input type="text" name="visitant" id="visitant" value="{{ old('visitant') }}" 
                 class="border p-2 w-full rounded" 
                 placeholder="Ex: Reial Madrid" required>
        </div>
    </div>

    {{-- Fila 2: Fecha y Resultado --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        {{-- Campo: Data --}}
        <div>
          <label for="data" class="block font-bold mb-1">Data del partit:</label>
          <input type="date" name="data" id="data" value="{{ old('data') }}" 
                 class="border p-2 w-full rounded bg-white" required>
        </div>

        {{-- Campo: Resultat  --}}
        <div>
          <label for="resultat" class="block font-bold mb-1">Resultat <span class="font-normal text-gray-500 text-sm">(Opcional, ex: 2-1)</span>:</label>
          <input type="text" name="resultat" id="resultat" value="{{ old('resultat') }}" 
                 class="border p-2 w-full rounded" 
                 placeholder="2-1">
        </div>
    </div>

    {{-- Botón Guardar --}}
    <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
        Afegir Partit
    </button>

  </form>
@endsection