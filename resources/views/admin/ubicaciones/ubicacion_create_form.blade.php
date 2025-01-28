@extends('layouts.app')

@section('title', 'Ubicacion')

@section('content')
<div class="flex justify-center">
    <div class="w-1/2">
        <x-form.form metodo='post'>
            <x-slot name="nombre">
                Crear Ubicación
            </x-slot>
            <x-slot name="ruta">
                {{ route('ubicaciones.store') }}
            </x-slot>
            <x-form.input label="Biblioteca" nombre="biblioteca" tipo="text" required="required" />
            <x-form.input label="Direccion" nombre="direccion" tipo="text" required="required" />
            <x-form.input label="Número de estanterias" nombre="numero_estanterias" tipo="number" required="required" />
            <x-buttons.save_button />
        </x-form.form>
    </div>
</div>
@endsection