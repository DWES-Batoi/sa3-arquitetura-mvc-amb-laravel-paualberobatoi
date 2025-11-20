@props(['nom', 'ciutat', 'capacitat', 'equip'])

{{-- Contenedor con estilo de tarjeta (igual que equip.blade.php) --}}
<div class="estadi border rounded-lg shadow-md p-4 bg-white hover:shadow-lg transition-shadow duration-300">
  {{-- Nombre del estadio --}}
  <h2 class="text-xl font-bold text-blue-800 mb-2">{{ $nom }}</h2>

  {{-- Datos del estadio --}}
  <p class="mb-1 text-gray-700">
    <strong class="text-gray-900">Ciutat:</strong> {{ $ciutat }}
  </p>

  <p class="mb-1 text-gray-700">
    <strong class="text-gray-900">Capacitat:</strong> {{ number_format($capacitat, 0, ',', '.') }}
  </p>

  <p class="text-gray-700">
    <strong class="text-gray-900">Equip Principal:</strong> {{ $equip }}
  </p>
</div>