<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-container">
        
    <h3>Wazaaaaaaaaaaaaaaaaaaaa 🗣🗣🗣</h3>
    <p>Si te mueve te metemo el guevo</p>
        <form action="{{ url('login') }}" method="POST">
            @csrf
            <h2>Iniciar Sesión</h2>
            <input type="text" name="user" placeholder="Usuario" value="{{ isset($old_nombre) ? $old_nombre : '' }}">
            <input type="password" name="password" placeholder="Contraseña">
            <button type="submit">Iniciar sesión</button>
        </form>

        @if (isset($error))
            <p class="error">{{ $error }}</p>
        @endif
    </div>
</body>
</html>
