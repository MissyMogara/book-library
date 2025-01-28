@extends('layouts.app')

@section('title', 'Libro')

@section('content')
<div class="flex justify-center">
    <div class="w-1/2">
        <x-form.form metodo='post'>
            <x-slot name="nombre">
                Crear Libro
            </x-slot>
            <x-slot name="ruta">
                {{ route('libros.store') }}
            </x-slot>
            <x-form.input label="Título" nombre="titulo" tipo="text" required="required" />
            <x-form.input label="Año de Publicación" nombre="anio_publicacion" tipo="number" required="required" />
            <label for="">Estado</label>
            <select name="estado" id="estado" required="required">
                <option value="disponible">Disponible</option>
                <option value="prestado">Prestado</option>
                <option value="extraviado">Extraviado</option>
            </select>
            <x-form.input label="isbn" nombre="isbn" tipo="number" required="required" />
            <x-form.input label="Autor" nombre="autor_id" tipo="number" required="required" />
            <x-form.input label="Ubicación" nombre="ubicacion_id" tipo="number" required="required" />
            <x-form.input label="Portada del Libro" nombre="portada" tipo="file" />
            <x-buttons.save_button />
        </x-form.form>
    </div>
</div>
@endsection