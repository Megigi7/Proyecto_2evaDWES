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
        <h2>Formulario de Alta de Tarea</h2>
    @else
        <h2>Modificacion de Tarea</h2>
    @endif

    <form @if($tipo=="nueva")
        action="{{ url('tarea') }}" method="post"
      @else
        @if($user->role == 'user')
            action="{{ route('tarea.completar', $tarea->id) }}" method="post" 
        @else
            action="{{ route('tarea.update', $tarea->id) }}" method="post" 
        @endif 
      @endif>
    @csrf
    @if($tipo!="nueva")
        @method('PUT')
    @endif

        @if($user->role == 'admin')
            <p><b>Cliente</b> <br>Cliente que encarga el trabajo |
            <!-- select de la tabla bd cliente -->        
            <select name="cliente">
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}"  
                        @if($tipo=="nueva") 
                            @if(old("cliente")=="{{ $cliente->id }}") 
                                selected 
                            @endif 
                        @else 
                            @if("{{ $tarea->cliente }}"=="{{ $cliente->id }}")
                                selected
                            @endif 
                        @endif > {{ $cliente->nombre }} </option>
                @endforeach
            </select></p>
                
            <p><b>Persona de contacto</b> <br>Nombre y apellidos de la persona |
            <input type="text" name="nombre_cliente" 
                        @if($tipo=='nueva')
                            value= "{{ old('nombre_cliente') }}"
                        @else 
                            value= "{{ $tarea->nombre_cliente }}"
                        @endif></p>
            
            
            <p><b>Teléfono de contacto</b><br>
            Nº de telefono de contacto de la persona de contacto |
            <input type="text" name="tel_s_contacto" 
                        @if($tipo=='nueva')
                            value="{{ old('tel_s_contacto') }}"
                        @else 
                            value= "{{ $tarea->tel_contacto }}"
                        @endif></p>
            
            <p><b>Correo electrónico</b><br>
            Correo electrónico de la persona de contacto |
            <input type="email" name="correo" 
                        @if($tipo=='nueva')
                            value="{{ old('correo') }}"
                        @else 
                            value= "{{ $tarea->correo }}"
                        @endif></p>

            <p><b>Descripción</b><br>
            Texto descriptivo identificativo de la tarea |
            <input type="text" name="descripcion" 
                        @if($tipo=='nueva')
                            value="{{ old('descripcion') }}"
                        @else 
                            value= "{{ $tarea->descripcion }}"
                        @endif></p>
            
            <p><b>Provincia</b> |
            <select name="provincia">
                @foreach($provincias as $provincia)
                    <option value="{{ $provincia->codigo }}" 
                        @if($tipo=="nueva") 
                            @if (old('provincia->codigo')=="{{ $provincia->codigo }}")
                                selected 
                            @endif 
                        @else 
                            @if("{{ $tarea->provincia }}"=="{{ $provincia->codigo }}")
                                selected
                            @endif 
                        @endif >{{ $provincia->codigo }} | {{ $provincia->nombre }}</option>
                @endforeach
            </select> </p>

            <p><b>Población</b> | 
            <input type="text" name="poblacion" 
                        @if($tipo=='nueva')
                            value="{{ old('poblacion') }}"
                        @else 
                            value= "{{ $tarea->poblacion }}"
                        @endif></p>
        
            <p><b>Código postal</b> |
            <input type="text" name="codigo_postal" 
                        @if($tipo=='nueva')
                            value="{{ old('codigo_postal') }}"
                        @else 
                            value= "{{ $tarea->codigo_postal }}"
                        @endif></p>

            <p><b>Dirección</b><br>Dirección donde debemos ir a realizar la tarea |
            <input type="text" name="direccion"
                        @if($tipo=='nueva')
                            value="{{ old('direccion') }}"
                        @else 
                            value= "{{ $tarea->direccion }}"
                        @endif></p>
            

            <p><b>Operario Encargado</b><br>
            Nombre o identificación del operario encargado de la realización de la tarea |
            <select name="empleado">
                @foreach($empleados as $empleado)
                    <option value="{{ $empleado->id }}" @if (old('operario')=="{{ $empleado->id }}") selected @endif >{{ $empleado->nombre }}</option>
                @endforeach
            </select> </p>
        @endif

        <p><b>Estado</b> |
        <select name="estado">
            @foreach($estados as $estado)
                <option value="{{ $estado->clave }}" 
                    @if($tipo=="nueva") 
                        @if (old('estado->clave')=="{{ $estado->clave }}")
                            selected 
                        @endif 
                    @else 
                        @if("{{ $estado->clave }}"=="{{ $tarea->estado }}")
                            selected
                        @endif 
                    @endif >{{ $estado->estado }}</option>
            @endforeach
        </select> </p>

        <p><b>Fecha Realización</b><br>
        Fecha en la que se realizará la tarea |
        <input type="date" name="fecha_realizacion"
                    @if($tipo=='nueva')
                        value="{{ old('fecha_realizacion') }}"
                    @else 
                        value= "{{ $tarea->fecha_realizacion }}"
                    @endif > </p>
        
        <p>Anotaciones Anteriores</p>
        <textarea name="anotaciones_anteriores">@if($tipo=='nueva'){{ old('anotaciones_anteriores') }}@else{{ $tarea->anotaciones_anteriores }}@endif </textarea>
        
        <p>Anotaciones Posteriores</p>
        <textarea name="anotaciones_posteriores">@if($tipo=='nueva'){{ old('anotaciones_posteriores') }}@else{{ $tarea->anotaciones_posteriores }}@endif</textarea>
        
        <p>Ficheros</p>
        <input type="file" name="ficheros" 
                    @if($tipo=='nueva')
                        value="{{ old('ficheros') }}"
                    @else 
                        value= "{{ $tarea->ficheros }}"
                    @endif >

        <br><input type="submit" value="Guardar">
    </form>

@endsection