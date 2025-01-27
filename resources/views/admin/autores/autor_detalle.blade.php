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
        <x-buttons.normal_button :ruta="route('dashboard')" identifier="deleteAutor" color="red">
            borrar
        </x-buttons.normal_button>
        <x-buttons.normal_button :ruta="route('dashboard')" identifier="editAutor" color="blue">
            editar
        </x-buttons.normal_button>
    </div>
    
</div>
@endsection