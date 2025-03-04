@extends('layouts.layout')

@section('content')

<h1>Pago de Cuotas</h1>
<p>Haz clic en el botón para pagar tu cuota con PayPal.</p>
<a href="{{ url('paypal/pay/'. $cuota->id) }}" style="background-color: #0070ba; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Pagar con PayPal</a>

@endsection