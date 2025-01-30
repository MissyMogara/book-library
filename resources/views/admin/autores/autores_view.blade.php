@extends('layouts.app')

@section('title', 'Autores')

@section('content')
<div class="text-center">
    <h1>Autores</h1>
    <a href=" {{ route('autor_create') }} ">
        <button class="bg-cyan-700 hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded-lg mt-3 mb-3">
            Crear Autor
        </button>
    </a>
</div>
<div class="flex justify-center">
    <div>
    <form action="{{ route('autores.buscar') }}" method="GET">
        <label for="" class="mr-2">Buscar por:</label>
        <select name="opcion" id="" class="border border-gray-300 rounded-lg px-2">
            <option value="nombre">Nombre</option>
            <option value="nacionalidad">Nacionalidad</option>
        </select>
        <br>
        <input type="text" name="autor_query" placeholder="Buscar autor..." id="" class="mt-2 mr-2 border border-gray-300 rounded-lg px-2">
        <button type="submit" class="bg-cyan-700 hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded-lg mt-3 mb-3">
            Buscar
        </button>
    </form>
    </div>
</div>
<div class="flex justify-center">
    <x-table.table>
        <thead>
            <tr class="bg-gray-100 text-gray-950 uppercase text-sm leading-normal">
                <x-table.th>ID</x-table.th>
                <x-table.th>Nombre</x-table.th>
                <x-table.th>Nacionalidad</x-table.th>
                <x-table.th>Fecha de nacimiento</x-table.th>
                <x-table.th>Codigo Dewey</x-table.th>
            </tr>
        </thead>
        <tbody class="text-gray-800 text-sm">
            @foreach ($autores as $autor)
                <tr class="hover:bg-gray-100">
                    <x-table.td>{{ $autor->id }}</x-table.td>
                    <x-table.td><a href="{{ route('autor_detalle', ['id' => $autor->id])  }}">
                        {{ $autor->nombre }}
                      </a></x-table.td>
                    <x-table.td>{{ $autor->nacionalidad }}</x-table.td>
                    <x-table.td>{{ $autor->fecha_nacimiento }}</x-table.td>
                    <x-table.td>{{ $autor->codigoDewey }}</x-table.td>
                </tr>
            @endforeach
        </tbody>
    </x-table.table>
</div>
    <div class="flex justify-center mt-3 mb-3">
        {{ $autores->links() }}
    </div>
@endsection