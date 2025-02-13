@extends('layout.layout')

@section('content')
    <h2>¡Atención! ¿Está seguro que desea eliminar la cuota {{ $id }}?</h2>
    <h3>Esta acción no puede revertirse</h3>
    <form action="{{ route('cuota.destroy', $id) }}" method="POST">
    @csrf
    @method('DELETE')
    
    <button type="submit" onclick="return confirm('¿Estás seguro de eliminar esta cuota?')">
        Sí, eliminar
    </button>
    <a href="{{ url('cuota') }}">No, cancelar</a>

</form>

    
@endsection