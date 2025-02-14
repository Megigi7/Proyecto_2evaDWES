@extends('layouts.layout')

@section('content')
    @if($errors->any())
        {{ implode('', $errors->all(':message')) }}
    @endif

    <p>{{ session()->get('success') }}</p>

    @if($tipo=="nueva")
        <h2>Formulario de Alta de Empleado</h2>
    @else
        <h2>Modificacion de Empleado</h2>
    @endif
    <form @if($tipo=="nueva")
            action="{{ url('empleado') }}" method="post"
          @else
            action="{{ route('empleado.update', $empleado->id) }}" method="post" 
          @endif>
        @csrf
        @if($tipo!="nueva")
            @method('PUT')
        @endif
 
        <p><b>DNI</b><br> |
        <input type="text" name="dni" 
                    @if($tipo=='nueva')
                        value= "{{ old('dni') }}"
                    @else 
                        value= "{{ $empleado->dni }}"
                    @endif></p>
        
        
        
        <p><b>Nombre y apellidos</b><br> |
        <input type="text" name="nombre" 
                    @if($tipo=='nueva')
                        value= "{{ old('nombre') }}"
                    @else 
                        value= "{{ $empleado->nombre }}"
                    @endif></p>
        
        <p><b>Correo electrónico</b><br> |
        <input type="email" name="correo" 
                    @if($tipo=='nueva')
                        value="{{ old('correo') }}"
                    @else 
                        value= "{{ $empleado->correo }}"
                    @endif></p>


        <p><b>Teléfono</b><br> |
        <input type="text" name="telefono" 
                    @if($tipo=='nueva')
                        value="{{ old('telefono') }}"
                    @else 
                        value= "{{ $empleado->telefono }}"
                    @endif></p>

        <p><b>Usuario</b><br> | 
        <input type="text" name="usuario" 
                    @if($tipo=='nueva')
                        value="{{ old('usuario') }}"
                    @else 
                        value= "{{ $empleado->usuario }}"
                    @endif></p>
                    

               
        <p><b>Clave</b><br> |
        <input type="text" name="clave" 
                    @if($tipo=='nueva')
                        value="{{ old('clave') }}"
                    @else 
                        value= "{{ $empleado->clave }}"
                    @endif></p>


        <p><b>Tipo</b><br> |
        <select name="tipo_user">
            @foreach($tipos as $tipo_user)
                <option value="{{ $tipo_user }}" 
                    @if($tipo=="nueva") 
                        @if (old('tipo_user')=="{{ $tipo_user }}")
                            selected 
                        @endif 
                    @else 
                        @if("{{ $empleado->tipo }}"=="{{ $tipo_user }}")
                            selected
                        @endif 
                    @endif >{{ $tipo_user }} </option>
            @endforeach
        </select> </p>



        <p><b>Dirección</b><br> |
        <input type="text" name="direccion"
                    @if($tipo=='nueva')
                        value="{{ old('direccion') }}"
                    @else 
                        value= "{{ $empleado->direccion }}"
                    @endif></p>
        
        <input type="submit" value="Guardar">
    </form>

@endsection