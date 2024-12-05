<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<div class="login-container">
    <div class="login-card">
        <div class="image-wrapper">
            <img src="{{ asset('images/login.png') }}" alt="Ilustración" class="login-image">
        </div>
        <h2>Iniciar Sesión</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <a href="#" class="forgot-password">¿Olvidaste tu contraseña?</a>
            <button type="submit" class="login-button">Iniciar Sesión</button>
        </form>
        <p>¿No tienes una cuenta? <a href="{{ route('register') }}">Registrarme</a></p>
    </div>
</div>

</body>
</html>

