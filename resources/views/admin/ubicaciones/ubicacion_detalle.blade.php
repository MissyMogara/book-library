@extends('layouts.app')

@section('title', 'Ubicacion')

@section('content')
<div>
    <x-cards.ubicacion_card :biblioteca="$ubicacion->biblioteca" :direccion="$ubicacion->direccion" :numeroEstanterias="$ubicacion->numero_estanterias">
    </x-cards.ubicacion_card>
    <h3 class="text-2xl font-bold text-gray-800 relative pb-2 after:block after:w-16 after:h-1 after:bg-cyan-600 after:mt-1 after:rounded-full text-center">Libros en la ubicación:</h3>
    <div class="flex justify-center mt-5 mb-5">
        <ul>
            @foreach ( $libros as $libro )
                <li>{{ $libro->titulo }}</li>    
            @endforeach
        </ul>
    </div>
    <div class="flex justify-center mt-3 mb-3">
        {{ $libros->links() }}
    </div>
    <div class="flex justify-center mt-4 mb-4">
        <a href="{{ route('ubicaciones') }}">
            <button class="bg-cyan-700 hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded-lg mr-3">
                Volver
            </button>
        </a>
        <a href="{{ route('ubicaciones.edit', ['id' => $ubicacion->id]) }}" class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-lg">
            Editar
        </a> 
        <form action="{{ route('ubicaciones.destroy', $ubicacion->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded-lg ml-3">
                Eliminar
            </button>
        </form>
    </div>
    
</div>
@endsection