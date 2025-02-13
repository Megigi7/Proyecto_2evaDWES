@extends('layout.layout')

@section('content')
    <form action="{{ url('cliente/create') }}">
        <input type="submit" value="Añadir cliente">
    </form>    

    <h1>Gestión de Clientes</h1>
    

    <table border="2">
        <thead>
            <tr>
                <th>Acciones</th>
                <th>Id</th>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Cuenta Corriente</th>
                <th>Pais</th>
                <th>Moneda</th>
                <th>Importe de Cuota Mensual</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($clientes as $cliente)
            <tr>
                <td>
                    <a href="{{ url('cliente/' . $cliente->id . '/edit') }}">✍</a>
                    <a href="{{ url('confirmar_cliente/'. $cliente->id) }}">❌</a>
                </td>
                <td>{{ $cliente->id }}</td>
                <td>{{ $cliente->cif }}</td>
                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->correo }}</td>
                <td>{{ $cliente->telefono }}</td>
                <td>{{ $cliente->cuenta_corriente }}</td>
                <td>{{ $cliente->pais }}</td>
                <td>{{ $cliente->moneda }}</td>
                <td>{{ $cliente->importe_cuota_mensual }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection