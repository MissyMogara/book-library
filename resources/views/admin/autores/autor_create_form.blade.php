@extends('layouts.app')

@section('title', 'Autor')

@section('content')
<div class="flex justify-center">
    <div class="w-1/2">
        <x-form.form metodo='post'>
            <x-slot name="nombre">
                Crear Autor
            </x-slot>
            <x-slot name="ruta">
                {{ route('autores.store') }}
            </x-slot>
            <x-form.input label="Nombre" nombre="nombre" tipo="text" required="required" />
            <x-form.input label="Nacionalidad" nombre="nacionalidad" tipo="text" required="required" />
            <x-form.input label="Fecha de Nacimiento" nombre="fecha_nacimiento" tipo="date" required="required" />
            <x-form.input label="Código Dewey" nombre="codigoDewey" tipo="text" required="required" />
            <x-form.input label="Biografía" nombre="biografia" tipo="text" required="required" />
            <x-buttons.save_button />
        </x-form.form>
    </div>
</div>
@endsection