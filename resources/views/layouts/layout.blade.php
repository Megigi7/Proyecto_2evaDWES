<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" type="text/css" href="{{ asset('css/layout.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gestor de Datos</title>
</head>
<body>

    @php
        use Illuminate\Support\Facades\Auth;
        $user = Auth::user();
    @endphp


    <div class="cabecera">
        <h2>SiempreColgados. Ascensores Nosecaen S.L.</h2>
        <div class="menu_c">
            <p>
                <a href="{{ url('inicio') }}">Inicio</a> &nbsp;&nbsp;&nbsp;| 
                <a href="{{ url('tarea') }}">Tareas</a> &nbsp;&nbsp;&nbsp;| 
                @if($user->role == 'admin')
                    <a href="{{ url('empleado') }}">Empleados</a> &nbsp;&nbsp;&nbsp;| 
                    <a href="{{ url('cliente') }}">Clientes</a> &nbsp;&nbsp;&nbsp;| 
                    <a href="{{ url('cuota') }}">Cuotas</a> &nbsp;&nbsp;&nbsp;| 
                @else
                    <a href="{{ url('empleado/' . $user->id . '/cuenta' )}}">Cuenta</a> &nbsp;&nbsp;&nbsp;|
                @endif
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="margin: 0">Cerrar sesión</button>
                </form>
            </p>
        </div>
    </div>

    <div class="contenedor">
        @yield('content')
    </div>
    <!-- <div class="footer">
        <p>&copy; 2024 Proyecto PHP. Todos los derechos reservados.</p>
    </div> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>