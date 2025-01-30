@extends('layouts.app')

@section('title', 'DashBoard')

@section('content')
<div class="text-center">
    <h1>Libros</h1>
    <a href=" {{ route('libro_create') }} ">
        <button class="bg-cyan-700 hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded-lg mt-3 mb-3">
            Crear Libro
        </button>
    </a>
</div>
<div class="flex justify-center">
    <div>
    <form action="{{ route('libros.buscar') }}" method="GET">
        <label for="" class="mr-2">Buscar por:</label>
        <select name="opcion" id="" class="border border-gray-300 rounded-lg px-2">
            <option value="autor">Autor</option>
            <option value="titulo">Título</option>
            <option value="isbn">ISBN</option>
            <option value="ubicacion">Ubicación</option>
            <option value="estado">Estado</option>
        </select>
        <br>
        <input type="text" name="libro_query" placeholder="Buscar libro..." id="" class="mt-2 mr-2 border border-gray-300 rounded-lg px-2">
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
                <x-table.th>Título</x-table.th>
                <x-table.th>Autor</x-table.th>
                <x-table.th>Año de Publicación</x-table.th>
                <x-table.th>Estado</x-table.th>
                <x-table.th>Ubicación</x-table.th>
                <x-table.th>ISBN</x-table.th>
            </tr>
        </thead>
        <tbody class="text-gray-800 text-sm">
            @foreach ($libros as $libro)
                <tr class="hover:bg-gray-100">
                    <x-table.td>{{ $libro->id }}</x-table.td>
                    <x-table.td>
                        <a href="{{ route('libro_detalle', ['id' => $libro->id]) }}">{{ $libro->titulo }}</a></x-table.td>
                    <x-table.td><a href="{{ route('autor_detalle', ['id' => $libro->autor->id]) }}">
                        {{ $libro->autor->nombre }}
                      </a></x-table.td>
                    <x-table.td>{{ $libro->anio_publicacion }}</x-table.td>
                    <x-table.td>{{ $libro->estado }}</x-table.td>
                    <x-table.td><a href="{{ route('ubicacion_detalle', ['id' => $libro->ubicacion->id])  }}">
                        {{ $libro->ubicacion->biblioteca }}
                    </a></x-table.td>
                    <x-table.td>{{ $libro->isbn }}</x-table.td>
                </tr>
            @endforeach
        </tbody>
    </x-table.table>
</div>
    <div class="flex justify-center mt-3 mb-3">
        {{ $libros->links() }}
    </div>
@endsection