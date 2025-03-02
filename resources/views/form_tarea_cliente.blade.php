<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" type="text/css" href="{{ asset('css/layout.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Incidencias para clientes</title>
</head>
<body>
    <div class="cabecera">
        <h2>SiempreColgados. Ascensores Nosecaen S.L.</h2>
        <h3>Gestión de incidencias para clientes</h3>
    </div>

    <div class="contenedor">
        <h2>Crear nueva incidencia</h2>
        <p>Como cliente, puedes introducir una nueva incidencia aquí. <b>Esta incidencia será revisada posteriormente por nuestro administrador</b><br>
        Para garantizar la veracidad de su identidad deberá introducir el mismo número de teléfono y CIF proporcionado a la empresa</p>

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
        
        <form action="{{ url('/incidencia') }}" method="post">
            @csrf
            <p><b>Cliente</b> <br>Cliente que encarga el trabajo |
            <select name="cliente">
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}"  
                            @if(old("cliente")=="{{ $cliente->id }}") 
                            selected  @endif> {{ $cliente->nombre }} </option>
                @endforeach
            </select></p>
                
            <p><b>Persona de contacto</b> <br>Nombre y apellidos |
            <input type="text" name="nombre_cliente" value= "{{ old('nombre_cliente') }}"></p>
            
            <p><b>CIF del cliente</b><br> CIF del cliente que encarga el trabajo
            <input type="text" name="cif" value="{{ old('cif') }}"></p>

            <p><b>Teléfono de contacto</b><br> Nº de telefono de contacto de la persona de contacto |
            <input type="text" name="tel_s_contacto" value="{{ old('tel_s_contacto') }}"></p>
            
            <p><b>Correo electrónico</b><br> Correo electrónico de la persona de contacto |
            <input type="email" name="correo" value="{{ old('correo') }}"></p>

            <p><b>Descripción</b><br> Texto descriptivo identificativo de la tarea |
            <input type="text" name="descripcion" value="{{ old('descripcion') }}"></p>
            
            <p><b>Provincia</b> |
            <select name="provincia">
                @foreach($provincias as $provincia)
                    <option value="{{ $provincia->codigo }}" 
                            @if (old('provincia->codigo')=="{{ $provincia->codigo }}")
                                selected 
                            @endif 
                    >{{ $provincia->codigo }} | {{ $provincia->nombre }}</option>
                @endforeach
            </select> </p>

            <p><b>Población</b> | 
            <input type="text" name="poblacion"  value="{{ old('poblacion') }}"></p>
        
            <p><b>Código postal</b> |
            <input type="text" name="codigo_postal" value="{{ old('codigo_postal') }}"></p>

            <p><b>Dirección</b><br>Dirección donde debemos ir a realizar la tarea |
            <input type="text" name="direccion" value="{{ old('direccion') }}"></p>

            <p><b>Fecha Realización</b><br>
            Fecha en la que se realizará la tarea |
            <input type="date" name="fecha_realizacion" value="{{ old('fecha_realizacion') }}"></p>
            
            <p>Anotaciones Anteriores</p>
            <textarea name="anotaciones_anteriores">{{ old('anotaciones_anteriores') }}</textarea>
            
            <br><input type="submit" value="Guardar">
        </form>
    </div>

    
</body>
</html>