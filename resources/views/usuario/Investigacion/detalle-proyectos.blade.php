@extends('usuario.layout.plantilla')

@section('contenido')

<section class="pt-16 pb-2">
    <div class="max-w-4xl mx-auto">
        <!-- Encabezado -->
        <div class="flex items-center mb-8">
            <!-- Fecha -->
            <div class="bg-gray-800 text-white text-sm px-4 py-2 rounded-none mr-8 mt-20">
                {{ $proyecto->fecha_publicacion }}
            </div>

            <!-- Titulo -->
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mt-20">{{ $proyecto->titulo }}</h1>
            </div>
        </div>

        <!-- Imagen destacada -->
        <div class="flex-shrink-0 w-3/3">
            <img src="{{ asset('storage/' . $proyecto->imagen) }}" alt="Imagen del proyecto" class="w-full rounded-lg shadow-md">
        </div>

        <!-- Contenido del proyecto -->
        <div class="w-full">
            <article class="text-gray-700 leading-relaxed mt-10">
                <p class="mb-4">
                    {{ $proyecto->descripcion }}
                </p>
            </article>
        </div>

        <!-- Botón para regresar -->
        <div class="mt-8 mb-4">
            <a href="{{ route('proyectos') }}"
                class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-600 transition">
                Volver
            </a>
        </div>
    </div>
</section>

@endsection

