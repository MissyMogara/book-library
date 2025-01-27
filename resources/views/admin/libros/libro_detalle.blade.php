@extends('layouts.app')

@section('title', 'Autor')

@section('content')
<div>
    <x-cards.libro_card :portada="$libro->portada" :titulo="$libro->titulo" :isbn="$libro->isbn" 
        :anioPublicacion="$libro->anio_publicacion" :estado="$libro->estado" :autor="$libro->autor->nombre" 
        :ubicacion="$libro->ubicacion->biblioteca">
    </x-cards.libro_card>
    <div class="flex justify-center mt-5">
        <x-buttons.normal_button :ruta="route('dashboard')" identifier="deleteLibro" color="red">
            borrar
        </x-buttons.normal_button>
        <x-buttons.normal_button :ruta="route('dashboard')" identifier="editLibro" color="blue">
            editar
        </x-buttons.normal_button>
    </div>
    
</div>
@endsection