@extends('administrador.dashboard.plantilla')

@section('title', 'Vista Evento')

@section('contenido')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <div class="max-w-screen-2xl mx-auto my-8 px-4">
        
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-[#2e5382]">Evento</h1>
            <div class="w-1/4 mx-auto h-0.5 bg-[#64d423]"></div>
        </div>

        <div class="flex justify-between mb-6">

            <div class="flex space-x-4">
                <input
                    type="text"
                    id="search"
                    placeholder="Buscar por título o autor"
                    class="px-4 py-2 border rounded"
                    oninput="buscarEvento(this.value)"
                >
            </div>
            <button
                class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-700"
                onclick="openCreateModal()"
            >
                Crear Evento
            </button>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-200 text-gray-700 uppercase">
                    <tr>
                        <th class="px-4 py-3">Título</th>
                        <th class="px-4 py-3">Subtítulo</th>
                        <th class="px-4 py-3">Descripcion</th>
                        <th class="px-4 py-3">Autor</th>
                        <th class="px-4 py-3">Fecha</th>                        
                        <th class="px-4 py-3">Categoria</th>
                        <th class="px-4 py-3">Imagen</th>
                        <th class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($event as $evento)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $evento->titulo }}</td>
                            <td class="px-4 py-3">{{ $evento->subtitulo }}</td>
                            <td class="px-4 py-3"> {{ Str::limit(strip_tags($evento->descripcion ?? ''), 50) }}</td>
                            <td class="px-4 py-3">{{ $evento->autor }}</td>
                            <td class="px-4 py-3">{{ $evento->fecha }}</td>
                            <td class="px-4 py-2">{{ $evento->categoria }}</td> 
                            
                            <td class="px-4 py-3">
                            @if ($evento->imagen)
                                    <div class="px-8 py-0.1 text-center">
                                        <button 
                                            class="w-8 h-8 flex items-center justify-start rounded shadow cursor-pointer"
                                            onclick="openModal('{{ Storage::url($evento->imagen) }}', 'image')"
                                        >
                                            <svg 
                                                xmlns="http://www.w3.org/2000/svg" 
                                                fill="none" 
                                                stroke="currentColor" 
                                                stroke-width="2" 
                                                stroke-linecap="round" 
                                                stroke-linejoin="round" 
                                                class="w-6 h-6"
                                                viewBox="0 0 24 24"
                                            >
                                                <path d="M18 22H4a2 2 0 0 1-2-2V6"/>
                                                <path d="m22 13-1.296-1.296a2.41 2.41 0 0 0-3.408 0L11 18"/>
                                                <circle cx="12" cy="8" r="2"/>
                                                <rect width="16" height="16" x="6" y="2" rx="2"/>
                                            </svg>
                                        </button>
                                    </div>
                                @else
                                    <span>No hay imagen</span>
                                @endif
                            </td>

                            <td class="px-4 py-3 flex items-center justify-center space-x-4">
                                
                                <a
                                    href="{{ route('event.edit', $evento->id) }}"
                                    class="text-yellow-500 hover:text-yellow-700 flex items-center justify-center mt-2"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 3l3 3-8 8H3v-3l8-8z" />
                                    </svg>
                                 </a>
                                
                               <button onclick="openDeleteModal({{ $evento->id }}, '{{ $evento->titulo }}')" class="text-red-500 hover:text-red-700 flex items-center justify-center">
                                   <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                       <path stroke-linecap="round" stroke-linejoin="round" d="M3 6h18M9 6V4a1 1 0 011-1h4a1 1 0 011 1v2M10 11v6M14 11v6M5 6h14l1 16a1 1 0 01-1 1H5a1 1 0 01-1-1L5 6z" />
                                   </svg>
                               </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

      
        <div class="flex justify-end text-sm mt-4">
            {{ $event->links('pagination::tailwind') }}
        </div>
    </div>

  
    <div
        id="createModal"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50"
    >
        <div class="bg-white p-4 rounded shadow-lg max-w-5xl w-full relative">
            <button
                class="absolute top-0.5 right-0.5 text-gray-500 hover:text-black text-3xl p-2"
                onclick="closeCreateModal()"
            >
                &times;
            </button>
            <h2 class="text-xl font-bold mb-2">Crear evento</h2>
            <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="titulo" class="block">Título</label>
                    <input type="text" id="titulo" name="titulo" class="w-full px-4 py-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="subtitulo" class="block">Subtítulo</label>
                    <input type="text" id="subtitulo" name="subtitulo" class="w-full px-4 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="descripcion" class="block">Descripción</label>
                    <div id="editor" class="w-full px-4 py-2 border rounded"></div>
                    <input type="hidden" id="descripcion" name="descripcion" />
                </div>   
                <div class="mb-4">
                    <label for="autor" class="block">Autor</label>
                    <input type="text" id="autor" name="autor" class="w-full px-4 py-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="fecha" class="block">Fecha</label>
                    <input type="date" id="fecha" name="fecha" class="w-full px-2 py-1 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="imagen" class="block">Imagen</label>
                    <input type="file" id="imagen" name="imagen" class="w-full px-2 py-1 border rounded" required>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-700">Guardar</button>
            </form>
        </div>
    </div>

<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white p-7 rounded shadow-lg max-w-md w-full relative">
        <button class="absolute top-0.5 right-0.5 text-gray-500 hover:text-black text-3xl p-2" onclick="closeDeleteModal()">&times;</button>
        <h2 class="text-xl font-bold mb-4">Eliminar Evento</h2>
        <p>¿Estás seguro de que deseas eliminar la evento "<span id="eventoTitulo"></span>"?</p>

      
        <form id="deleteForm" method="POST" action="{{ route('event.destroy', '') }}" class="mt-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-700">Aceptar</button>
            <button type="button" onclick="closeDeleteModal()" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-700 mt-2">Cancelar</button>
        </form>
    </div>
</div>

<div id="archivoModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white p-7 rounded shadow-lg max-w-7xl w-full relative">
            <button class="absolute top-0.5 right-0.5 text-gray-500 hover:text-black text-3xl p-2" onclick="closeModal()">×</button>
            <div id="modalContent"></div>
        </div>
    </div>


    <script>
        function openCreateModal() {
            document.getElementById('createModal').classList.remove('hidden');
        }

        function closeCreateModal() {
            document.getElementById('createModal').classList.add('hidden');
        }

        function openDeleteModal(id, titulo) {
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('eventoTitulo').innerText = titulo;
            const form = document.getElementById('deleteForm');
            form.action = "{{ route('event.destroy', '') }}/" + id;
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        function buscarEvento(query) {
            fetch(`/admin/eventos/buscar?search=${query}`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const tableBody = doc.querySelector('tbody');
                document.querySelector('tbody').innerHTML = tableBody.innerHTML;
            })
            .catch(error => console.error('Error:', error));
        }
        function openModal(fileUrl, fileType) {
            const modal = document.getElementById('archivoModal');
            const modalContent = document.getElementById('modalContent');

            if (fileType === 'image') {
                modalContent.innerHTML = `<img src="${fileUrl}" alt="Archivo" class="w-full max-h-[80vh] object-contain rounded">`;
            } 

            modal.classList.remove('hidden');
        }

        function closeModal() {
            const modal = document.getElementById('archivoModal');
            modal.classList.add('hidden');
        }

  

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

  
    document.querySelector('form').addEventListener('submit', function() {
            document.querySelector('#descripcion').value = quill.root.innerHTML;
            
    });


</script>



@endsection