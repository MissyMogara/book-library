@extends('layouts.app')

@section('title', 'DashBoard')

@section('content')
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Año de Publicación</th>
                <th>Estado</th>
                <th>Ubicación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($libros as $libro)
                <tr>
                    <td>{{ $libro->id }}</td>
                    <td>{{ $libro->titulo }}</td>
                    <td>{{ $libro->autor->nombre }}</td>
                    <td>{{ $libro->anio_publicacion }}</td>
                    <td>{{ $libro->estado }}</td>
                    <td>{{ $libro->ubicacion->biblioteca }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>    
@endsection