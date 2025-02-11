@extends('layout.layout')

@section('content')
    <h2>¡Atención! ¿Está seguro que desea eliminar la tarea {{ $id }}?</h2>
    <h3>Esta acción no puede revertirse</h3>
    <form action="{{ route('tarea.destroy', $id) }}" method="POST">
    @csrf
    @method('DELETE')
    
    <button type="submit" onclick="return confirm('¿Estás seguro de eliminar esta tarea?')">
        Sí, eliminar
    </button>
    <a href="{{ url('tarea') }}">No, cancelar</a>

</form>

    
@endsection