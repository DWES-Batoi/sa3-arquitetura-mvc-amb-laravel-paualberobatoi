<nav> 
  <ul class="flex space-x-4"> 
    <li>
      <a class="text-white hover:underline" href="/">Inici</a>
    </li>
    <li>
      <a class="text-white hover:underline" href="{{ route('equips.index') }}">
        Guia d'Equips
      </a>
    </li>
    <li>
      <a class="text-white hover:underline" href="{{ route('estadis.index') }}">
        Llistat d'Estadis
      </a>
    </li>
    {{-- Enlace a Jugadores --}}
    <li>
      <a class="text-white hover:underline" href="{{ route('jugadores.index') }}">
        Jugadores
      </a>
    </li>
    {{-- Enlace a Partits --}}
    {{-- <li>
      <a class="text-white hover:underline" href="{{ route('partits.index') }}">
        Partits
      </a>
    </li>--}}
  </ul>
</nav>