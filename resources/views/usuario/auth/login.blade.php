<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Estilo para hacer que la imagen sea un medio círculo */
        .half-circle {
            clip-path: ellipse(50% 100% at 50% 50%);
        }
    </style>
</head>
<body
    class="flex items-center justify-center min-h-screen bg-cover bg-center"
    style="background-image: url('{{ asset('images/laboratorio-mecanica.png') }}');"
>

<div class="bg-white p-8 rounded-lg shadow-lg w-96  relative">
    <div class="absolute -top-16 left-1/2 transform -translate-x-1/2">
        <!-- Imagen con forma circular -->
        <img src="{{ asset('images/login.png') }}" alt="Ilustración" class="rounded-full h-32 w-32 border-4 border-white shadow-lg">
    </div>
    <h2 class="text-2xl font-bold text-center mb-6 mt-14">Iniciar Sesión</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-4">
            <input type="email" name="email" placeholder="Correo electrónico" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-4">
            <input type="password" name="password" placeholder="Contraseña" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-4 text-right">
            <a href="#" class="text-sm text-blue-500 hover:underline">¿Olvidaste tu contraseña?</a>
        </div>
        <div class="mb-6">
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition">Iniciar Sesión</button>
        </div>
        <p class="text-center text-sm">¿No tienes una cuenta? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Registrarme</a></p>
    </form>
</div>

</body>
</html>
