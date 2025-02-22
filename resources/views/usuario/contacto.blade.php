@extends('usuario.layout.plantilla')


@section('contenido')

<!-- Pop-up para mensaje enviado -->
@if(session('success'))
<div id="popup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
    <div class="bg-white rounded-lg shadow-lg p-6 text-center">
        <h3 class="text-lg font-bold mb-4">{{ session('success') }}</h3>
        <button onclick="closePopup()" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">Aceptar</button>
    </div>
</div>
<script>
    function closePopup() {
        document.getElementById('popup').remove();
    }
</script>
@endif

<!-- Imagen de fondo ocupando el ancho completo -->
<div class="w-full bg-cover bg-center" style="background-image: url('images/imagen.png'); height: 300px;">
    <div class="flex flex-col items-center justify-center h-full bg-black bg-opacity-50">
        <h2 class="text-4xl font-bold text-white mt-20">Contacto</h2>
        <p class="text-white mt-8 max-md:p-2">Para todas las consultas, envíenos un correo electrónico utilizando el siguiente formulario.</p>
    </div>
</div>

<div class="container mx-auto py-1 mt-1">
    <div class="grid grid-cols-2 gap-6  max-xl:grid-cols-1">
        <!-- Formulario -->
        <div class="p-2">
            <form action="{{ route('contacto.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div class="grid grid-cols-3 gap-4">
                    <input type="text" name="nombres" placeholder="Nombres *" value="{{ old('nombres') }}" required class="w-full p-2 border border-gray-300 rounded">
                    <input type="text" name="apellidos" placeholder="Apellidos *" value="{{ old('apellidos') }}" required class="w-full p-2 border border-gray-300 rounded">
                    <input type="email" name="correo" placeholder="Correo electrónico *" value="{{ old('correo') }}" required class="w-full p-2 border border-gray-300 rounded">
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <input type="tel" name="telefono" placeholder="Teléfono *" value="{{ old('telefono') }}" required class="w-full p-2 border border-gray-300 rounded">
                        @error('telefono')
                             <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <input type="text" name="pais" placeholder="País *" value="{{ old('pais') }}" required class="w-full p-2 border border-gray-300 rounded">
                    <input type="text" name="departamento" placeholder="Departamento *" value="{{ old('departamento') }}" required class="w-full p-2 border border-gray-300 rounded">
                </div>
                <input type="text" name="asunto" placeholder="Asunto *" value="{{ old('asunto') }}" required class="w-full p-2 border border-gray-300 rounded">
                <textarea name="mensaje" placeholder="Mensaje *" required class="w-full p-2 border border-gray-300 rounded" rows="4">{{ old('mensaje') }}</textarea>
                <div>
                    <label class="block text-gray-500 font-bold">
                        Archivo adjunto
                        <input type="file" name="archivo" class="mt-1 block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-green-500 file:text-white hover:file:bg-green-600">
                        <p class="text-sm text-gray-500">Peso máximo: 4MB</p>
                    </label>
                </div>
                <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">ENVIAR</button>
                <button type="button" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600" onclick="location.reload();">CANCELAR</button>
            </form>
        </div>

        <!-- Imagen -->
        <div class="flex flex-col items-center ">
            <iframe class="max-md:w-[400px]" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3286.410276127892!2d-79.04060262589138!3d-8.115327781204812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91ad3d9fb3467261%3A0x752547ad9a204df6!2sUniversidad%20Nacional%20de%20Trujillo%20(UNT)!5e1!3m2!1ses-419!2spe!4v1734127574943!5m2!1ses-419!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <p class="text-gray-500 mt-2">Descripción: lorem lorem</p>
        </div>
    </div>
</div>

@endsection
