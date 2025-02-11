@extends('layout.layout')

@section('content')
    <form action="{{ url('empleado/create') }}">
        <input type="submit" value="Dar de alta">
    </form>    

    <h1>Lista de empleados</h1>
    

    <table border="2">
        <thead>
            <tr>
                <th>Acciones</th>
                <th>Id</th>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Usuario</th>
                <th>Clave</th>
                <th>Tipo</th>
                <th>Dirección</th>
                <th>Fecha de alta</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($empleados as $empleado)
            <tr>
                <td>
                    <a href="{{ url('empleado/' . $empleado->id . '/edit') }}">Modificar</a>
                    <a href="{{ url('confirmar_empleado/'. $empleado->id) }}">Dar de baja</a>
                </td>
                <td>{{ $empleado->id }}</td>
                <td>{{ $empleado->dni }}</td>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->correo }}</td>
                <td>{{ $empleado->telefono }}</td>
                <td>{{ $empleado->usuario }}</td>
                <td>{{ $empleado->clave }}</td>
                <td>{{ $empleado->tipo }}</td>
                <td>{{ $empleado->direccion }}</td>
                <td>{{ $empleado->fecha_alta }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection