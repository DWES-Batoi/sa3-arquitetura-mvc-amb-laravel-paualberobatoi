@extends('layouts.app')

@section('title', "Llistat de Jugadores")

@section('content')
    {{-- Título --}}
    <h1 class="text-3xl font-bold text-blue-800 mb-6">Llistat de Jugadores</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Botón: apunta a jugadores.create --}}
    <p class="mb-4">
        <a href="{{ route('jugadores.create') }}"
            class="bg-blue-600 text-white px-3 py-2 rounded hover:bg-blue-700 transition">
            Nova jugadora
        </a>
    </p>

    {{-- Tabla: Nom, Equip, Posició --}}
    <table class="w-full border-collapse border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border border-gray-300 p-2 text-left">Nom</th>
                <th class="border border-gray-300 p-2 text-left">Equip</th>
                <th class="border border-gray-300 p-2 text-left">Posició</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jugadores as $jugadora)
                {{-- Usamos el componente x-jugadora --}}
                <x-jugadora :nom="$jugadora['nom']" :equip="$jugadora['equip']" :posicio="$jugadora['posicio']" />
            @empty
                <tr>
                    <td colspan="3" class="border border-gray-300 p-4 text-center text-gray-500">
                        No hi ha jugadores registrades.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection