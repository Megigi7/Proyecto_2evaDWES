@extends('layout.layout')

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
                <!-- <th>Cliente</th> -->
                <th>Cliente</th>
                <th>Teléfono</th>
                <th>Descripcion</th>
                <th>Correo</th>
                <th>Dirección</th>
                <th>Población</th>
                <!-- <th>Código postal</th> -->
                <!-- <th>Provincia</th> -->
                <th>Estado</th>
                <th>Encargado</th>
                <!-- <th>Fecha de creación</th> -->
                <th>Fecha de realización</th>
                <!-- <th>Anotaciones anteriores</th>
                <th>Anotaciones posteriores</th>
                <th>Ficheros</th> -->
            </tr>
        </thead>
        <tbody>
        @foreach ($tareas as $tarea)
            <tr>
                <td>
                    <a href="{{ url('tarea/' . $tarea->id) }}">🔍</a>
                    <a href="{{ url('tarea/' . $tarea->id . '/edit') }}">✍</a>
                    <a href="{{ url('confirmar_tarea/'. $tarea->id) }}">❌</a>
                </td>
                <td>{{ $tarea->id }}</td>
                <!-- <td>{{ $tarea->cliente }}</td> -->
                <td>{{ $tarea->nombre_cliente }}</td>
                <td>{{ $tarea->tel_contacto }}</td>
                <td>{{ $tarea->descripcion }}</td>
                <td>{{ $tarea->correo }}</td>
                <td>{{ $tarea->direccion }}</td>
                <td>{{ $tarea->poblacion }}</td>
                <!-- <td>{{ $tarea->codigo_postal }}</td> -->
                <!-- <td>{{ $tarea->provincia }}</td> -->
                <td>{{ $tarea->estado }}</td>
                <td>{{ $tarea->empleado }}</td>
                <!-- <td>{{ $tarea->fecha_creacion }}</td> -->
                <td>{{ $tarea->fecha_realizacion }}</td>
                <!-- <td>{{ $tarea->anotaciones_anteriores }}</td>
                <td>{{ $tarea->anotaciones_posteriores }}</td>
                <td>{{ $tarea->ficheros }}</td> -->
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection