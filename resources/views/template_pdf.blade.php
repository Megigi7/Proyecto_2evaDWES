<!DOCTYPE html>
<html>
<head>
    <title>Factura</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 30px; }
        .details { margin: 20px 0; }
        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>FACTURA</h1>
        <p>SiempreColgados. Ascensores Nosecaen S.L.</p>
    </div>

    <div class="details">
        <h3>Cliente</h3>
        <p>{{ $cliente->nombre }}</p>
        <p>{{ $cliente->direccion }}</p>
        <p>{{ $cliente->poblacion }}</p>
        <p>Email: {{ $cliente->correo }}</p>
    </div>

    <table class="table">
        <tr>
            <th>Concepto</th>
            <th>Fecha Emisión</th>
            <th>Importe</th>
        </tr>
        <tr>
            <td>{{ $cuota->concepto }}</td>
            <td>{{ $cuota->fecha_emision }}</td>
            <td>{{ $cuota->importe }}€</td>
        </tr>
    </table>
</body>
</html>