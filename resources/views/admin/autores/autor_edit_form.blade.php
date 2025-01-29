@extends('layouts.app')

@section('title', 'Autor')

@section('content')
<div class="flex justify-center">
    <div class="w-1/2">
        <x-form.form metodo='put'>
            <x-slot name="nombre">
                Editar Autor
            </x-slot>
            <x-slot name="ruta">
                {{ route('autores.update', ['id' => $autor->id]) }}
            </x-slot>
            <x-form.input label="Nombre" nombre="nombre" tipo="text" required="required" valor="{{ $autor->nombre }}"/>
            <x-form.input label="Nacionalidad" nombre="nacionalidad" tipo="text" required="required" valor="{{ $autor->nacionalidad }}" />
            <x-form.input label="Fecha de Nacimiento" nombre="fecha_nacimiento" tipo="date" required="required" valor="{{ $autor->fecha_nacimiento }}" />
            <x-form.input label="Código Dewey" nombre="codigoDewey" tipo="text" required="required" valor="{{ $autor->codigoDewey }}" />
            <x-form.input label="Biografía" nombre="biografia" tipo="text" required="required" valor="{{ $autor->biografia }}" />
            <x-buttons.save_button />
        </x-form.form>
    </div>
</div>
@endsection