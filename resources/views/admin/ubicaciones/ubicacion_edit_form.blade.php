@extends('layouts.app')

@section('title', 'Ubicacion')

@section('content')
<div class="flex justify-center">
    <div class="w-1/2">
        <x-form.form metodo='put'>
            <x-slot name="nombre">
                Editar Ubicación
            </x-slot>
            <x-slot name="ruta">
                {{ route('ubicaciones.update', ['id' => $ubicacion->id]) }}
            </x-slot>
            <x-form.input label="Biblioteca" nombre="biblioteca" tipo="text" required="required"  valor="{{ $ubicacion->biblioteca }}" />
            <x-form.input label="Direccion" nombre="direccion" tipo="text" required="required" valor="{{ $ubicacion->direccion }}" />
            <x-form.input label="Número de estanterias" nombre="numero_estanterias" tipo="number" required="required" valor="{{ $ubicacion->numero_estanterias }}" />
            <x-buttons.save_button />
        </x-form.form>
    </div>
</div>
@endsection