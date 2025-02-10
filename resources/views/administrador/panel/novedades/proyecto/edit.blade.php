

@extends('administrador.dashboard.plantilla')

@section('title', 'Editar Proyecto')

@section('contenido')
    <div class="max-w-screen-2xl mx-auto my-8 px-4">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-[#2e5382]">Editar Proyecto</h1>
            <div class="w-1/4 mx-auto h-0.5 bg-[#64d423]"></div>
        </div>

        <form action="{{ route('proyect.update', $proyect->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="titulo" class="block">Título</label>
                <input type="text" id="titulo" name="titulo" value="{{ $proyect->titulo }}" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="subtitulo" class="block">Subtítulo</label>
                <input type="text" id="subtitulo" name="subtitulo" value="{{ $proyect->subtitulo }}" class="w-full px-4 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="descripcion" class="block">Descripcion</label>
                <textarea id="descripcion" name="descripcion" class="w-full px-4 py-2 border rounded" required>{{ $proyect->descripcion }}</textarea>
            </div>
            <div class="mb-4">
                <label for="autor" class="block">Autor</label>
                <input type="text" id="autor" name="autor" value="{{ $proyect->autor }}" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="fecha_publicacion" class="block">Fecha</label>
                <input type="date" id="fecha_publicacion" name="fecha_publicacion" value="{{ $proyect->fecha_publicacion }}" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="imagen" class="block">Imagen (opcional)</label>
                <input type="file" id="imagen" name="imagen" class="w-full px-4 py-2 border rounded" accept="image/jpeg,image/png">
            </div>
            <!-- Contenedor de botones alineados -->
            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Actualizar
                </button>
                <a href="{{ route('proyect') }}" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-700">
                    Volver
                </a>
            </div>
        </form>
    </div>
@endsection