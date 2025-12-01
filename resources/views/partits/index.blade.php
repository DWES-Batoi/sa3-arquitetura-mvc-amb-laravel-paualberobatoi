@extends('layouts.app')

@section('title', "Llistat de Partits")

@section('content')
    <h1 class="text-3xl font-bold text-blue-800 mb-6">Llistat de Partits</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <p class="mb-4">
        <a href="{{ route('partits.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">
            Nou partit
        </a>
    </p>

    <table class="w-full border-collapse border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border border-gray-300 p-2 text-right w-1/3">Local</th>
                <th class="border border-gray-300 p-2 text-center w-1/6">Resultat / Data</th>
                <th class="border border-gray-300 p-2 text-left w-1/3">Visitant</th>
            </tr>
        </thead>
        <tbody>
            @forelse($partits as $key => $partit)
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 p-2 text-right align-middle">
                        <x-equip-mini :nom="$partit['local']" />
                    </td>

                    <td class="border border-gray-300 p-0 text-center align-middle">
                        <a href="{{ route('partits.show', $key) }}"
                            class="block p-2 h-full w-full hover:bg-orange-50 transition" title="Veure detall del partit">
                            <div class="flex flex-col justify-center h-full">
                                @if(!empty($partit['resultat']))
                                    <span class="text-xl font-bold text-blue-800 tracking-widest">{{ $partit['resultat'] }}</span>
                                @else
                                    <span class="text-gray-400 font-style-italic text-sm">vs</span>
                                @endif
                                <span class="text-xs text-gray-500 mt-1">
                                    {{ \Carbon\Carbon::parse($partit['data'])->format('d/m/Y') }}
                                </span>
                            </div>
                        </a>
                    </td>

                    <td class="border border-gray-300 p-2 text-left align-middle">
                        <x-equip-mini :nom="$partit['visitant']" />
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="border border-gray-300 p-8 text-center text-gray-500">
                        No hi ha partits registrats encara.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection