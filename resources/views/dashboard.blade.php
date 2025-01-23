@extends('layouts.app')

@section('title', 'DashBoard')

@section('content')
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
            </tr>
        </thead>
        <tbody class="text-gray-800 text-sm">
            @foreach ($libros as $libro)
                <tr class="hover:bg-gray-100">
                    <x-table.td>{{ $libro->id }}</x-table.td>
                    <x-table.td>{{ $libro->titulo }}</x-table.td>
                    <x-table.td>{{ $libro->autor->nombre }}</x-table.td>
                    <x-table.td>{{ $libro->anio_publicacion }}</x-table.td>
                    <x-table.td>{{ $libro->estado }}</x-table.td>
                    <x-table.td>{{ $libro->ubicacion->biblioteca }}</x-table.td>
                </tr>
            @endforeach
        </tbody>
    </x-table.table>
</div>
    <div class="flex justify-center mt-3 mb-3">
        {{ $libros->links() }}
    </div>
@endsection