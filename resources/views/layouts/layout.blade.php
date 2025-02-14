
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" type="text/css" href="{{ asset('css/layout.css') }}">
    <title>Gestor de Datos</title>
</head>
<body>
    <div class="header">
        <h2>SiempreColgados. Ascensores Nosecaen S.L.</h2>
        <button>Cerrar sesion</button>

    </div>
    <div class="menu">
        <a href="{{ url('inicio') }}"> ▸ Inicio</a>
        <a href="{{ url('tarea') }}"> ▸ Tareas</a>
        <a href="{{ url('empleado') }}"> ▸ Empleados</a>
        <a href="{{ url('cliente') }}"> ▸ Clientes</a>
        <a href="{{ url('cuota') }}"> ▸ Cuotas</a>

    </div>
    <div class="container">
        @yield('content')
    </div>
    <!-- <div class="footer">
        <p>&copy; 2024 Proyecto PHP. Todos los derechos reservados.</p>
    </div> -->
</body>
</html>