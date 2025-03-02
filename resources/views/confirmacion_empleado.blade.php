@extends('layouts.layout')

@section('content')
    <h2>¡Atención! ¿Está seguro que desea dar de baja al empleado {{ $id }}?</h2>
    <h3>Esta acción no puede revertirse</h3>
    <form action="{{ route('empleado.destroy', $id) }}" method="POST">
    @csrf
    @method('DELETE')
    
    <button type="submit">
        Sí, eliminar
    </button>
    <a href="{{ url('empleado') }}">No, cancelar</a>

</form>

    
@endsection