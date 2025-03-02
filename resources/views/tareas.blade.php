@extends('layouts.layout')

@section('content')
    <form action="{{ url('tarea/create') }}">
        <input type="submit" value="Crear nueva tarea">
    </form>    

    <h1>Gestión de Tareas</h1>

    <table border="2">
        <thead>
            <tr>
                <th>Acciones</th>
                <th>Id</th>
                <th>Cliente</th>
                <th>Teléfono</th>
                <th>Descripcion</th>
                <th>Correo</th>
                <th>Dirección</th>
                <th>Población</th>
                <th>Estado</th>
                <th>Encargado</th>
                <th>Fecha de realización</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($tareas as $tarea)
            <tr>
                <td>
                    <a href="{{ url('tarea/' . $tarea->id . '/edit') }}">✍</a>
                    @if ($role == 'admin')
                        <a href="{{ url('tarea/' . $tarea->id) }}">🔍</a>
                        <a href="{{ url('confirmar_tarea/'. $tarea->id) }}">❌</a>
                    @endif
                </td>
                <td>{{ $tarea->id }}</td>
                <td>{{ $tarea->cliente }}</td>
                <td>{{ $tarea->tel_contacto }}</td>
                <td>{{ $tarea->descripcion }}</td>
                <td>{{ $tarea->correo }}</td>
                <td>{{ $tarea->direccion }}</td>
                <td>{{ $tarea->poblacion }}</td>
                <td>{{ $tarea->estado }}</td>
                <td>{{ $tarea->empleado }}</td>
                <td>{{ $tarea->fecha_realizacion }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection