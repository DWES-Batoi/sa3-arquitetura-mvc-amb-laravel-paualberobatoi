{{-- Extiende del layout principal --}}
@extends('layouts.app')

{{-- Título de la pestaña para la vista de creación --}}
@section('title', 'Afegir nou estadi')

{{-- Contenido principal de la página --}}
@section('content')
  {{-- Título del formulario --}}
  <h1 class="text-2xl font-bold mb-4">Afegir nou estadi</h1>

  {{-- Enlace para volver atrás --}}
  <div class="mb-4">
    <a href="{{ route('estadis.index') }}" class="text-blue-600 hover:underline">
      &larr; Tornar al llistat
    </a>
  </div>

  {{-- Si hay errores de validación, los mostramos en un recuadro rojo --}}
  @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
      <ul class="list-disc list-inside">
        {{-- Recorre todos los mensajes de error y los muestra en una lista --}}
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {{-- Formulario para crear un nuevo ESTADIO.
       action: ruta que procesa el formulario (estadis.store).
       method: POST porque estamos enviando datos para guardar. --}}
  <form action="{{ route('estadis.store') }}" method="POST" class="space-y-4 max-w-lg">
    {{-- Directiva Blade para incluir el token CSRF (seguridad obligatoria) --}}
    @csrf

    {{-- Campo: Nombre del estadio --}}
    <div>
      <label for="nom" class="block font-bold">Nom de l'estadi:</label>
      <input type="text" name="nom" id="nom"
             value="{{ old('nom') }}" 
             class="border p-2 w-full rounded"
             placeholder="Ex: Estadi Johan Cruyff" required>
    </div>

    {{-- Campo: Ciudad --}}
    <div>
      <label for="ciutat" class="block font-bold">Ciutat:</label>
      <input type="text" name="ciutat" id="ciutat"
             value="{{ old('ciutat') }}" 
             class="border p-2 w-full rounded"
             placeholder="Ex: Sant Joan Despí" required>
    </div>

    {{-- Campo: Capacidad --}}
    <div>
      <label for="capacitat" class="block font-bold">Capacitat (espectadors):</label>
      <input type="number" name="capacitat" id="capacitat"
             value="{{ old('capacitat') }}" min="0"
             class="border p-2 w-full rounded"
             placeholder="Ex: 6000" required>
    </div>

    {{-- Campo: Equipo Principal --}}
    <div>
      <label for="equip_principal" class="block font-bold">Equip Principal:</label>
      <input type="text" name="equip_principal" id="equip_principal"
             value="{{ old('equip_principal') }}" 
             class="border p-2 w-full rounded"
             placeholder="Ex: FC Barcelona Femení" required>
    </div>

    {{-- Botón para enviar el formulario --}}
    <button type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-bold">
      Guardar Estadi
    </button>
  </form>
@endsection