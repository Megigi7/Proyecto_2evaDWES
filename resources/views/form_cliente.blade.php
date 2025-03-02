@extends('layouts.layout')

@section('content')
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
        <select name="pais" id="paisSelect" onchange="updateCurrency()">
            @foreach($paises as $pais)
                <option value="{{ $pais->nombre }}" data-currency="{{ $pais->currency }}"
                    @if($tipo=='nueva')
                        {{ old('pais') == $pais->nombre ? 'selected' : '' }}
                    @else
                        {{ $cliente->pais == $pais->nombre ? 'selected' : '' }}
                    @endif
                >{{ $pais->nombre }}</option>
            @endforeach
        </select></p>

        <p><b>Moneda</b><br> |
        <input type="text" name="moneda" id="monedaInput" readonly
                    @if($tipo=='nueva')
                        value="{{ old('moneda') }}"
                    @else 
                        value= "{{ $cliente->moneda }}"
                    @endif></p>

        <script>
            function updateCurrency() {
                const paisSelect = document.getElementById('paisSelect');
                const monedaInput = document.getElementById('monedaInput');
                const selectedOption = paisSelect.options[paisSelect.selectedIndex];
                monedaInput.value = selectedOption.dataset.currency;
            }
            // Initialize currency on page load
            document.addEventListener('DOMContentLoaded', updateCurrency);
        </script>



        <p><b>Importe cuota mensual</b><br> |
        <input type="text" name="importe"
                    @if($tipo=='nueva')
                        value="{{ old('importe') }}"
                    @else 
                        value= "{{ $cliente->importe_cuota_mensual }}"
                    @endif></p>
        
        <br><input type="submit" value="Guardar">
    </form>

@endsection