@extends('layouts.layout')

@section('content')
    <h2>Detalles de la tarea {{ $tarea->id }}</h2>

        <p><b>Estado:</b> {{ $estado->estado }}</p>

        <h3>Datos del cliente</h3>
        <p><b>Cliente: </b> {{ $cliente->nombre }} </p>
        <p><b>Nombre del cliente: </b> {{ $tarea->nombre_cliente }} </p>
        <p><b>Teléfono de contacto: </b> {{ $tarea->tel_contacto }} </p>
        <p><b>Correo electrónico: </b> {{ $tarea->correo }} </p>
        <p><b>Dirección: </b> {{ $tarea->direccion }} </p>
        <p><b>Provincia: </b> {{ $provincia->nombre }} </p>
        <p><b>Población: </b> {{ $tarea->poblacion }} </p>
        <p><b>Código Postal: </b> {{ $tarea->codigo_postal }} </p>
        
        <h3>Especificaciones de la tarea</h3>
        <p><b>Descripción: </b> {{ $tarea->descripcion }} </p>
        <p><b>Fecha de creación: </b> {{ $tarea->fecha_creacion }} </p>
        <p><b>Fecha de realización: </b> {{ $tarea->fecha_realizacion }} </p>
        <p><b>Empleado encargado: </b> {{ $empleado->nombre }} </p>
        <p><b>Anotaciones anteriores: </b> {{ $tarea->anotaciones_anteriores }} </p>
        <p><b>Anotaciones posteriores: </b> {{ $tarea->anotaciones_posteriores }} </p>
        <p><b>Ficheros: </b> {{ $tarea->ficheros }} </p>

@endsection