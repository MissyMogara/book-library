@extends('layouts.app')

@section('title', 'Ubicaciones')

@section('content')
<div class="flex justify-center">
    <x-table.table>
        <thead>
            <tr class="bg-gray-100 text-gray-950 uppercase text-sm leading-normal">
                <x-table.th>ID</x-table.th>
                <x-table.th>Biblioteca</x-table.th>
                <x-table.th>Dirección</x-table.th>
                <x-table.th>Número de estanterías</x-table.th>
            </tr>
        </thead>
        <tbody class="text-gray-800 text-sm">
            @foreach ($ubicaciones as $ubicacion)
                <tr class="hover:bg-gray-100">
                    <x-table.td>
                        <a href="{{ route('ubicacion_detalle', ['id' => $ubicacion->id])  }}">{{ $ubicacion->id }}</a>
                    </x-table.td>
                    <x-table.td>
                        <a href="{{ route('ubicacion_detalle', ['id' => $ubicacion->id])  }}">
                        {{ $ubicacion->biblioteca }}
                    </a>
                    </x-table.td>
                    <x-table.td>{{ $ubicacion->direccion }}</x-table.td>
                    <x-table.td>{{ $ubicacion->numero_estanterias }}</x-table.td>
                </tr>
            @endforeach
        </tbody>
    </x-table.table>
</div>
    {{-- <div class="flex justify-center mt-3 mb-3">
        {{ $ubicaciones->links() }}
    </div> --}}
@endsection