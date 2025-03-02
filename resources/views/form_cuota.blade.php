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
        <h2>Nueva cuota</h2>
    @else
        <h2>Modificacion de cuota</h2>
    @endif

    <form @if($tipo=="nueva")
            action="{{ url('cuota') }}" method="post"
          @else
            action="{{ route('cuota.update', $cuota->id) }}" method="post" 
          @endif>
        @csrf
        @if($tipo!="nueva")
            @method('PUT')
        @endif
 
        <p><b>Cliente</b><br> |
        <select name="cliente">
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}" 
                    @if($tipo=="nueva") 
                        @if (old('cliente')=="{{ $cliente->id }}")
                            selected 
                        @endif 
                    @else 
                        @if("{{ $cuota->cliente }}"=="{{ $cliente->id }}")
                            selected
                        @endif 
                    @endif >{{ $cliente->nombre }} </option>
            @endforeach
        </select> </p>
        
        
        
        <p><b>Concepto</b><br> |
        <input type="text" name="concepto" 
                    @if($tipo=='nueva')
                        value= "{{ old('concepto') }}"
                    @else 
                        value= "{{ $cuota->concepto }}"
                    @endif></p>
        
        <p><b>Fecha de emisión</b><br> |
        <input type="date" name="fecha_emision"
                    @if($tipo=='nueva')
                        value="{{ old('fecha_emision') }}"
                    @else 
                        value= "{{ $cuota->fecha_emision }}"
                    @endif > </p>


        <p><b>Importe</b><br> |
        <input type="text" name="importe"
                    @if($tipo=='nueva')
                        value="{{ old('importe') }}"
                    @else 
                        value= "{{ $cuota->importe }}"
                    @endif></p>


        <p><b>Pagada</b><br> |
        <select name="pagada">
            @foreach($opciones as $opcion)
                <option value="{{ $opcion }}" 
                    @if($tipo=="nueva") 
                        @if (old('pagada')=="{{ $opcion }}")
                            selected 
                        @endif 
                    @else 
                        @if("{{ $cuota->pagada }}"=="{{ $opcion}}")
                            selected
                        @endif 
                    @endif >{{ $opcion }} </option>
            @endforeach
        </select> </p>
                    

        <p><b>Fecha de pago</b> /Solo si ya ha sido pagada/<br>|
        <input type="date" name="fecha_pago"
                    @if($tipo=='nueva')
                        value="{{ old('fecha_pago') }}"
                    @else 
                        value= "{{ $cuota->fecha_pago }}"
                    @endif > </p>


        <!-- <p><b>Importe en EUR</b></p>
        <input type="text" name="importe_eur" disabled  
                    @if($tipo=='nueva')
                        value="{{ old('importe_eur') }}"
                    @else 
                        value= "{{ $cuota->importe_eur }}"
                    @endif> -->

        <p><b>Notas</b><br>
        <textarea name="notas"@if($tipo=='nueva')value="{{old('notas')}}"@else value= "{{$cuota->notas}}"@endif></textarea></p>
        
        <br><input type="submit" value="Guardar">
    </form>

@endsection