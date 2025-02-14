@extends('layouts.layout')

@section('content')
    <form action="{{ url('cuota/create') }}">
        <input type="submit" value="Añadir cuota">
    </form>    

    <h1>Gestión de Cuotas</h1>
    

    <table border="2">
        <thead>
            <tr>
                <th>Acciones</th>
                <th>Id</th>
                <th>Cliente</th>
                <th>Concepto</th>
                <th>Fecha de emisión</th>
                <th>Importe</th>
                <th>Pagada</th>
                <th>Fecha de pago</th>
                <th>Notas</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($cuotas as $cuota)
            <tr>
                <td>
                    <a href="{{ url('cuota/' . $cuota->id . '/edit') }}">✍</a>
                    <a href="{{ url('confirmar_cuota/'. $cuota->id) }}">❌</a>
                </td>
                <td>{{ $cuota->id }}</td>
                <td>{{ $cuota->cliente }}</td>
                <td>{{ $cuota->concepto }}</td>
                <td>{{ $cuota->fecha_emision }}</td>
                <td>{{ $cuota->importe }}</td>
                <td>{{ $cuota->pagada}}</td>
                <td>{{ $cuota->fecha_pago }}</td>
                <td>{{ $cuota->notas }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection