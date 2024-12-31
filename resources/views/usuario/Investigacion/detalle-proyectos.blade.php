@extends('usuario.layout.plantilla')

@section('contenido')

<section class="pt-16 pb-2">
    <div class="max-w-4xl mx-auto">
        <!-- Encabezado -->
        <div class="flex items-center mb-8">
            <!-- Fecha -->
            <div class="bg-gray-800 text-white text-sm px-4 py-2 rounded-none mr-8 mt-20">
              dd/mm/yy
            </div>

            <!-- Titulo -->
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mt-20">Titulo Free advertising for your online business</h1>
            </div>
        </div>

            <!-- Imagen destacada -->
            <div class="flex-shrink-0 w-3/3">
                <img src="/user/template/images/blog-03.png" alt="Imagen de la noticia" class="w-full rounded-lg shadow-md">
            </div>

        <!-- <div class="flex mb-8"> -->
            <!-- Contenido de la noticia -->
            <div class="w-full">
                <article class="text-gray-700 leading-relaxed mt-10">
                    <p class="mb-4">
                    Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem
                    Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem
                Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem
                Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem
                Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem
                Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem
                    Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem
                Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem
                Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem
                Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem Lorem Lorem lorem
                    </p>
                </article>
            </div>
        <!-- </div> -->
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
