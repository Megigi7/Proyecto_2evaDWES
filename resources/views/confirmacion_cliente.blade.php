@extends('layout.layout')

@section('content')
    <h2>¡Atención! ¿Está seguro que desea dar de baja al cliente {{ $id }}?</h2>
    <h3>Esta acción no puede revertirse</h3>
    <form action="{{ route('cliente.destroy', $id) }}" method="POST">
    @csrf
    @method('DELETE')
    
    <button type="submit" onclick="return confirm('¿Estás seguro de dar de baja a este cliente?')">
        Sí, eliminar
    </button>
    <a href="{{ url('cliente') }}">No, cancelar</a>

</form>

    
@endsection