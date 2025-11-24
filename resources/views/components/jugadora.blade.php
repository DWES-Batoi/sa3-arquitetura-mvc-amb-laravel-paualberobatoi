@props(['nom', 'equip', 'posicio'])

<tr class="hover:bg-gray-50 border-b border-gray-200">
    {{-- Celda Nom --}}
    <td class="border border-gray-300 p-2 font-bold text-gray-800">
        {{ $nom }}
    </td>

    {{-- Celda Equip --}}
    <td class="border border-gray-300 p-2 text-blue-700">
        {{ $equip }}
    </td>

    {{-- Celda Posició (con etiqueta de color) --}}
    <td class="border border-gray-300 p-2">
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">
            {{ $posicio }}
        </span>
    </td>
</tr>