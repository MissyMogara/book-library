@extends('layouts.app')

@section('title', 'Libro')

@section('content')
<div class="flex justify-center">
    <div class="w-1/2">
        <x-form.form metodo='put'>
            <x-slot name="nombre">
                Editar Libro
            </x-slot>
            <x-slot name="ruta">
                {{ route('libros.update', ['id' => $libro->id]) }}
            </x-slot>
            <x-form.input label="Título" nombre="titulo" tipo="text" required="required" valor="{{ $libro->titulo }}"/>
            <x-form.input label="Año de Publicación" nombre="anio_publicacion" tipo="number" required="required" valor="{{ $libro->anio_publicacion }}" />
            <label for="">Estado</label>
            <select name="estado" id="estado" required="required">
                @if ($libro->estado == 'disponible')
                    <option value="disponible" selected>Disponible</option>
                @else
                    <option value="disponible">Disponible</option>
                @endif
                
                @if ($libro->estado == 'prestado')
                    <option value="prestado" selected>Prestado</option>
                @else
                    <option value="prestado">Prestado</option>
                @endif
                
                @if ($libro->estado == 'extraviado')
                    <option value="extraviado" selected>Extraviado</option>
                @else
                    <option value="extraviado">Extraviado</option>
                @endif
            </select>
            <x-form.input label="isbn" nombre="isbn" tipo="number" required="required" valor="{{ $libro->isbn }}" />
            <x-form.input label="Autor" nombre="autor_id" tipo="number" required="required" valor="{{ $libro->autor_id }}" />
            <x-form.input label="Ubicación" nombre="ubicacion_id" tipo="number" required="required" valor="{{ $libro->ubicacion_id }}" />
            <x-form.input label="Portada del Libro" nombre="portada" tipo="file" />
            <x-buttons.save_button />
        </x-form.form>
    </div>
</div>
@endsection