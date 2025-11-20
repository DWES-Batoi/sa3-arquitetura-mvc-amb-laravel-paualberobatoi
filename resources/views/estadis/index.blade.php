{{-- Indica que esta vista extiende (hereda) de layouts.app --}}
@extends('layouts.app')

{{-- Define el contenido de la sección "title" --}}
@section('title', "Guia d'Estadis")

{{-- Abre la sección "content" --}}
@section('content')

  {{-- Título principal --}}
  <h1 class="text-3xl font-bold text-blue-800 mb-6">Guia d'Estadis</h1>

  {{-- Mensaje de éxito --}}
  @if (session('success'))
    <div class="bg-green-100 text-green-700 p-2 mb-4">
      {{ session('success') }}
    </div>
  @endif

  {{-- Botón Crear --}}
  <p class="mb-4">
    <a href="{{ route('estadis.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded hover:bg-blue-700 transition">
      Nou estadi
    </a>
  </p>

  {{-- Tabla --}}
  <table class="w-full border-collapse border border-gray-300">
    <thead class="bg-gray-100">
      <tr>
        <th class="border border-gray-300 p-2 text-left">Nom</th>
        <th class="border border-gray-300 p-2 text-left">Ciutat</th>
        <th class="border border-gray-300 p-2 text-left">Capacitat</th>
        <th class="border border-gray-300 p-2 text-left">Equip Principal</th>
      </tr>
    </thead>
    <tbody>
      {{-- Usamos $key para saber el ID del estadio --}}
      @foreach($estadis as $key => $estadi)
        <tr class="hover:bg-gray-50">
          {{-- ENLACE AL DETALLE: Apunta a la ruta estadis.show --}}
          <td class="border border-gray-300 p-2 font-bold">
            <a href="{{ route('estadis.show', $key) }}" class="text-blue-700 hover:underline">
                {{ $estadi['nom'] }}
            </a>
          </td>

          <td class="border border-gray-300 p-2">
            {{ $estadi['ciutat'] }}
          </td>

          <td class="border border-gray-300 p-2">
            {{ number_format($estadi['capacitat'], 0, ',', '.') }}
          </td>

          <td class="border border-gray-300 p-2">
            {{ $estadi['equip_principal'] }}
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection