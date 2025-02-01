@extends('administrador.dashboard.plantilla')

@section('title', 'Editar Evento')

@section('contenido')
    <div class="max-w-screen-2xl mx-auto my-8 px-4">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-[#2e5382]">Editar Evento</h1>
            <div class="w-1/4 mx-auto h-0.5 bg-[#64d423]"></div>
        </div>

        <form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="titulo" class="block">Título</label>
                <input type="text" id="titulo" name="titulo" value="{{ $event->titulo }}" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="subtitulo" class="block">Subtítulo</label>
                <input type="text" id="subtitulo" name="subtitulo" value="{{ $event->subtitulo }}" class="w-full px-4 py-2 border rounded">
            </div>
            <!-- <div class="mb-4">
                <label for="descripcion" class="block">Descripcion</label>
                <textarea id="descripcion" name="descripcion" class="w-full px-4 py-2 border rounded" required>{{ $event->descripcion }}</textarea>
            </div> -->
            <div class="mb-4">
                <label for="descripcion" class="block">Descripción</label>
                <div id="editor" class="w-full px-4 py-2 border rounded"></div>
                <input type="hidden" id="descripcion" name="descripcion" class="w-full px-4 py-2 border rounded"></input>
            </div>

            <div class="mb-4">
                <label for="autor" class="block">Autor</label>
                <input type="text" id="autor" name="autor" value="{{ $event->autor }}" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="fecha" class="block">Fecha</label>
                <input type="date" id="fecha" name="fecha" value="{{ $event->fecha }}" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="imagen" class="block">Imagen (opcional)</label>
                <input type="file" id="imagen" name="imagen" class="w-full px-4 py-2 border rounded">
            </div>
            <!-- Contenedor de botones alineados -->
            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Actualizar
                </button>
                <a href="{{ route('event') }}" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-700">
                    Volver
                </a>
            </div>
        </form>
    </div>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <script>
        var quill = new Quill('#editor', { 
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'size': ['small', false, 'large', 'huge'] }], 
                    ['bold', 'italic', 'underline'], 
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }], 
                    [{ 'color': [] }, { 'background': [] }], 
                    [{ 'align': [] }], 
                    ['link'], 
                    ['clean']
                ]
            }
        });

    
        document.addEventListener('DOMContentLoaded', function() {
            var descripcion = `{!! addslashes($event->descripcion) !!}`;
            quill.root.innerHTML = descripcion;
            document.querySelector('#descripcion').value = descripcion;
        });

      
        document.querySelector('form').addEventListener('submit', function() {
            document.querySelector('#descripcion').value = quill.root.innerHTML;
            
        });
    </script>
@endsection