@extends('administrador.dashboard.plantilla')

@section('title', 'Vista Noticias')

@section('contenido')
    <div class="max-w-screen-2xl mx-auto my-8 px-4">
        <!-- Sección de detalles de contacto -->
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-[#2e5382]">Noticias</h1>
            <div class="w-1/4 mx-auto h-0.5 bg-[#64d423]"></div>
        </div>

        <div class="flex justify-between mb-6">

            <div class="flex space-x-4">
                <input type="text" id="search" placeholder="Buscar por título o autor" class="px-4 py-2 border rounded">
            </div>
            <button class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-700" onclick="openCreateModal()">
                Crear Noticia
            </button>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-200 text-gray-700 uppercase">
                    <tr>
                        <th class="px-4 py-3">Título</th>
                        <th class="px-4 py-3">Subtítulo</th>
                        <th class="px-4 py-3">Contenido</th>
                        <th class="px-4 py-3">Autor</th>
                        <th class="px-4 py-3">Fecha</th>
                        <th class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($noticias as $noticia)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $noticia->titulo }}</td>
                            <td class="px-4 py-3">{{ $noticia->subtitulo }}</td>
                            <td class="px-4 py-3">{{ Str::limit($noticia->contenido, 50) }}</td>
                            <td class="px-4 py-3">{{ $noticia->autor }}</td>
                            <td class="px-4 py-3">{{ $noticia->fecha }}</td>
                            <td class="px-4 py-3 flex space-x-4">
                                <!-- Editar -->
                                <a href="{{ route('noticias.edit', $noticia->id) }}"
                                    class="text-yellow-500 hover:text-yellow-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 3l3 3-8 8H3v-3l8-8z" />
                                    </svg>
                                </a>
                                <!-- Botón de Eliminar -->
                                <!-- Formulario de Eliminar -->
                                <button onclick="openDeleteModal({{ $noticia->id }}, '{{ $noticia->titulo }}')"
                                    class="text-red-500 hover:text-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="flex justify-end text-sm mt-4">
            {{ $noticias->links('pagination::tailwind') }}
        </div>
    </div>

    <!-- Modal Crear -->
    <div id="createModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 w-full h-full">
        <div class="flex items-center justify-center w-full h-full">
            <div class="bg-white p-7 rounded shadow-lg max-w-7xl w-full relative">
                <button class="absolute top-0.5 right-0.5 text-gray-500 hover:text-black text-3xl p-2"
                    onclick="closeCreateModal()">
                    &times;
                </button>
                <h2 class="text-xl font-bold mb-4">Crear Noticia</h2>
                <form action="{{ route('noticias.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="titulo" class="block">Título</label>
                        <input type="text" id="titulo" name="titulo" class="w-full px-4 py-2 border rounded"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="subtitulo" class="block">Subtítulo</label>
                        <input type="text" id="subtitulo" name="subtitulo" class="w-full px-4 py-2 border rounded">
                    </div>
                    <div class="mb-4">
                        <label for="contenido" class="block">Contenido</label>
                        <textarea id="contenido" name="contenido" class="w-full px-4 py-2 border rounded" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="autor" class="block">Autor</label>
                        <input type="text" id="autor" name="autor" class="w-full px-4 py-2 border rounded"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="fecha" class="block">Fecha</label>
                        <input type="date" id="fecha" name="fecha" class="w-full px-4 py-2 border rounded"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="imagen" class="block">Imagen</label>
                        <input type="file" id="imagen" name="imagen" class="w-full px-4 py-2 border rounded"
                            required>
                    </div>
                    <button type="submit"
                        class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-700">Guardar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Eliminar -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 w-full h-full">
        <div class="flex items-center justify-center w-full h-full">
            <div class="bg-white p-7 rounded shadow-lg max-w-md w-full relative">
                <button class="absolute top-0.5 right-0.5 text-gray-500 hover:text-black text-3xl p-2"
                    onclick="closeDeleteModal()">&times;</button>
                <h2 class="text-xl font-bold mb-4">Eliminar Noticia</h2>
                <p>¿Estás seguro de que deseas eliminar la noticia "<span id="noticiaTitulo"></span>"?</p>

                <!-- Formulario de eliminación -->
                <form id="deleteForm" method="POST" action="{{ route('noticias.destroy', '') }}" class="mt-4">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-700">Aceptar</button>
                    <button type="button" onclick="closeDeleteModal()"
                        class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-700 mt-2">Cancelar</button>
                </form>
            </div>
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
            document.getElementById('noticiaTitulo').innerText = titulo;
            const form = document.getElementById('deleteForm');
            form.action = "{{ route('noticias.destroy', '') }}/" + id;
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
@endsection
