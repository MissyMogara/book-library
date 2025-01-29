@extends('layouts.app')

@section('title', 'Libro')

@section('content')
<div>
    <x-cards.libro_card :portada="$libro->portada" :titulo="$libro->titulo" :isbn="$libro->isbn" 
        :anioPublicacion="$libro->anio_publicacion" :estado="$libro->estado" :autor="$libro->autor->nombre" 
        :ubicacion="$libro->ubicacion->biblioteca">
    </x-cards.libro_card>
    <div class="flex justify-center mt-5">
        <a href="{{ route('dashboard') }}">
            <button class="bg-cyan-700 hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded-lg mr-3">
                Volver
            </button>
        </a>
        <a href="{{ route('libros.edit', ['id' => $libro->id]) }}" class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-lg">
            Editar
        </a> 
        <form action="{{ route('libros.destroy', $libro->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded-lg ml-3">
                Eliminar
            </button>
        </form>
    </div>
    
</div>
@endsection