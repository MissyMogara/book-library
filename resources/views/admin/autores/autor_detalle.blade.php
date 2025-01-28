@extends('layouts.app')

@section('title', 'Autor')

@section('content')
<div>
    <x-cards.autor_card :nombre="$autor->nombre" 
        :nacionalidad="$autor->nacionalidad" 
        :biografia="$autor->biografia" 
        :fechaNacimiento="$autor->fecha_nacimiento" 
        :codigoDewey="$autor->codigoDewey">
    </x-cards.autor_card>
    <div class="flex justify-center mt-5">
        {{-- <a href="{{ route('autores.edit', ['autor' => $autor->id]) }}">
            <button class="bg-cyan-700 hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded-lg">
                Editar
            </button>
        </a> --}}
        <a href="{{ route('autores') }}">
            <button class="bg-cyan-700 hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded-lg">
                Volver
            </button>
        </a>
        <form action="{{ route('autores.destroy', $autor->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded-lg ml-3">
                Eliminar
            </button>
        </form>
    </div>
    
</div>
@endsection