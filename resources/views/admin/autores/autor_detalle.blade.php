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
    <div class="bg-sky-800">
        <button class="bg-sky-800 p-2">
            borrar
        </button>
    </div>
    
</div>
@endsection