@extends('layouts.layout')

@section('content')
<h1>Gestión de Cuotas</h1>
    
    <form action="{{ url('cuota/create') }}">
        <input type="submit" value="Añadir cuota excepcional">
    </form>    

    <!-- Button to trigger modal -->
    <button type="button" data-bs-toggle="modal" data-bs-target="#remesaModal">
        Desplegar remesa mensual
    </button>

    <!-- Modal -->
    <div class="modal fade" id="remesaModal" tabindex="-1" aria-labelledby="remesaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="remesaModalLabel">Nueva Remesa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('cuota.remesa') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="concepto">Concepto de la remesa:</label>
                            <input type="text" class="form-control" id="concepto" name="concepto" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Generar Remesa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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
                <th>Importe(EUR)</th>
                <th>Notas</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($cuotas as $cuota)
            <tr>
                <td>
                    <a href="{{ route('cuota.factura', $cuota->id) }}">📄</a>
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
                <td>{{ $cuota->importe_EUR }}</td>
                <td>{{ $cuota->notas }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection