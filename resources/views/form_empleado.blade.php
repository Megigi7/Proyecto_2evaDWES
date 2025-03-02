@extends('layouts.layout')

@section('content')
    @php
        use Illuminate\Support\Facades\Auth;
        $user = Auth::user();
    @endphp

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    
    @if($tipo=="nueva")
        <h2>Formulario de Alta de Empleado</h2>
    @else
        <h2>Modificacion de Empleado</h2>
    @endif
    <form @if($tipo=="nueva")
            action="{{ url('empleado') }}" method="post"
          @else
          @if($user->role == 'user')
                action="{{ route('empleado.cuenta', $empleado->id) }}" method="post" 
            @else
            action="{{ route('empleado.update', $empleado->id) }}" method="post" 
            @endif 
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


    @if($user->role == 'admin')
        <p><b>Clave</b><br> |
        <input type="text" name="clave" 
                    @if($tipo=='nueva')
                        value="{{ old('clave') }}"
                    @else 
                        value= "{{ $empleado->user->password }}"
                    @endif></p>


        <p><b>Tipo</b><br> |
        <select name="tipo_user">
            @foreach($tipos as $tipo_user)
                <option value="{{$tipo_user}}" 
                    @if($tipo=="nueva") 
                        @if (old('tipo_user')==$tipo_user)
                            selected 
                        @endif 
                    @else 
                        @if($empleado->user->role == $tipo_user)
                            selected
                        @endif 
                    @endif >{{ $tipo_user }}</option>
            @endforeach
        </select> </p>
    @endif


        <p><b>Dirección</b><br> |
        <input type="text" name="direccion"
                    @if($tipo=='nueva')
                        value="{{ old('direccion') }}"
                    @else 
                        value= "{{ $empleado->direccion }}"
                    @endif></p>

        <p><b>Fecha de Alta</b><br> |
        <input type="datetime-local" name="fecha_alta"
                    @if($tipo=='nueva')
                        value="{{ old('fecha_alta') }}"
                    @else
                        value= "{{ $empleado->fecha_alta }}"
                    @endif>
        </p>
        
        <br><input type="submit" value="Guardar">
    </form>

@endsection