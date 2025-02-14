@extends('layouts.layout')

@section('content')
    @if($errors->any())
        {{ implode('', $errors->all(':message')) }}
    @endif

    <p>{{ session()->get('success') }}</p>

    @if($tipo=="nueva")
        <h2>Formulario de Alta de Cliente</h2>
    @else
        <h2>Modificacion de Cliente</h2>
    @endif

    <form @if($tipo=="nueva")
            action="{{ url('cliente') }}" method="post"
          @else
            action="{{ route('cliente.update', $cliente->id) }}" method="post" 
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
                        value= "{{ $cliente->cif }}"
                    @endif></p>
        
        
        
        <p><b>Nombre y apellidos</b><br> |
        <input type="text" name="nombre" 
                    @if($tipo=='nueva')
                        value= "{{ old('nombre') }}"
                    @else 
                        value= "{{ $cliente->nombre }}"
                    @endif></p>
        
        <p><b>Correo electrónico</b><br> |
        <input type="email" name="correo" 
                    @if($tipo=='nueva')
                        value="{{ old('correo') }}"
                    @else 
                        value= "{{ $cliente->correo }}"
                    @endif></p>


        <p><b>Teléfono</b><br> |
        <input type="text" name="telefono" 
                    @if($tipo=='nueva')
                        value="{{ old('telefono') }}"
                    @else 
                        value= "{{ $cliente->telefono }}"
                    @endif></p>

        <p><b>Cuenta corriente</b><br> | 
        <input type="text" name="cuenta_corriente" 
                    @if($tipo=='nueva')
                        value="{{ old('cuenta_corriente') }}"
                    @else 
                        value= "{{ $cliente->cuenta_corriente }}"
                    @endif></p>
                    

               
        <p><b>Pais</b><br> |
        <input type="text" name="pais" 
                    @if($tipo=='nueva')
                        value="{{ old('pais') }}"
                    @else 
                        value= "{{ $cliente->pais }}"
                    @endif></p>


        <p><b>Moneda</b><br> |
        <input type="text" name="moneda" 
                    @if($tipo=='nueva')
                        value="{{ old('moneda') }}"
                    @else 
                        value= "{{ $cliente->moneda }}"
                    @endif></p>



        <p><b>Importe cuota mensual</b><br> |
        <input type="text" name="importe"
                    @if($tipo=='nueva')
                        value="{{ old('importe') }}"
                    @else 
                        value= "{{ $cliente->importe_cuota_mensual }}"
                    @endif></p>
        
        <input type="submit" value="Guardar">
    </form>

@endsection