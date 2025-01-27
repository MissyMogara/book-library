@extends('layouts.app')

@section('title', 'Autor')

@section('content')
<div>
    <x-cards.ubicacion_card :biblioteca="$ubicacion->biblioteca" :direccion="$ubicacion->direccion" :numeroEstanterias="$ubicacion->numero_estanterias">
    </x-cards.ubicacion_card>
    <div class="flex justify-center mt-5">
        <x-buttons.normal_button :ruta="route('dashboard')" identifier="deleteUbicacion" color="red">
            borrar
        </x-buttons.normal_button>
        <x-buttons.normal_button :ruta="route('dashboard')" identifier="editUbicacion" color="blue">
            editar
        </x-buttons.normal_button>
    </div>
    
</div>
@endsection