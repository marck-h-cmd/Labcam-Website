@extends('usuario.layout.plantilla')

@section('contenido')

<section class="pt-16 pb-2">
    <div class="max-w-4xl mx-auto">
        <!-- Encabezado -->
        <div class="flex items-center mb-8">
            <!-- Fecha -->
            <div class="text-center">
                <div class="bg-gray-800 text-white text-sm px-4 py-2 rounded-none mr-8 mt-20">
                    {{ \Carbon\Carbon::parse($evento->fecha)->format('d/m/Y') }}
                </div>
                <div class="bg-gray-600 text-white text-sm px-4 py-2 rounded-none mr-8 mt-1">
                    Categoría:
                    @if ($evento->categoria === 'pasado')
                        <span class="text-red-500">{{ $evento->categoria }}</span>
                    @elseif ($evento->categoria === 'futuro')
                        <span class="text-green-500">{{ $evento->categoria }}</span>
                    @endif
                </div>
            </div>

            <!-- Titulo y Subtitulo -->
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mt-20">{{ $evento->titulo }}</h1>
                <h2 class="text-xl text-gray-600">{{ $evento->subtitulo }}</h2>
                <p class="text-sm text-gray-500 mt-2">
                   Autor {{ $evento->autor }}
                </p>
            </div>
        </div>

            <!-- Imagen destacada -->
            <div class="flex-shrink-0 w-3/3">
                <img src="{{ asset('storage/' . $evento->imagen) }}" alt="Imagen de la noticia" class="w-full rounded-lg shadow-md">
            </div>

        <!-- <div class="flex mb-8"> -->
            <!-- Contenido de la noticia -->
            <div style="max-width: 100%; margin-top: 1rem;">
                <article style="font-size: 1rem; color: #4A5568; line-height: 1.5; word-wrap: break-word;">
                    <p>
                       {{ $evento->descripcion }}
                    </p>
                </article>
            </div>
        <!-- </div> -->
          <!-- Botón para regresar -->
        <div class="mt-8 mb-4">
            <a href="{{ route('eventos') }}"
              class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-600 transition">
              Volver
            </a>
        </div>
    </div>
</section>

@endsection
