@extends('administrador.dashboard.plantilla')

@section('title', 'Vista Proyectos')

@section('contenido')
    <div class="max-w-screen-2xl mx-auto my-8 px-4">
         <!-- Sección de detalles de contacto -->
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-[#2e5382]">Proyectos</h1>
            <div class="w-1/4 mx-auto h-0.5 bg-[#64d423]"></div>
        </div>

        <div class="flex justify-between mb-6">

            <div class="flex space-x-4">
                <input
                    type="text"
                    id="search"
                    placeholder="Buscar por título o autor"
                    class="px-4 py-2 border rounded"
                    oninput="buscarProyectos(this.value)"
                >
            </div>
            <button
                class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-700"
                onclick="openCreateModal()"
            >
                Crear Proyecto
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
                        <th class="px-4 py-3">Imagen</th>
                        <th class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proyect as $proyecto)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $proyecto->titulo }}</td>
                            <td class="px-4 py-3">{{ $proyecto->subtitulo }}</td>
                            <td class="px-4 py-3">{{ Str::limit($proyecto->descripcion, 50) }}</td>
                            <td class="px-4 py-3">{{ $proyecto->autor }}</td>
                            <td class="px-4 py-3">{{ $proyecto->fecha_publicacion }}</td>
                            <!-- Fila de la imagen -->
                            <td class="px-4 py-3">
                            @if ($proyecto->imagen)
                                    <div class="px-8 py-0.1 text-center">
                                        <button 
                                            class="w-8 h-8 flex items-center justify-start rounded shadow cursor-pointer"
                                            onclick="openModal('{{ Storage::url($proyecto->imagen) }}', 'image')"
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
                                <!-- Editar -->
                                <a
                                    href="{{ route('proyect.edit', $proyecto->id) }}"
                                    class="text-yellow-500 hover:text-yellow-700 flex items-center justify-center mt-2"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 3l3 3-8 8H3v-3l8-8z" />
                                    </svg>
                                 </a>
                                <!-- Botón de Eliminar -->
                               <button onclick="openDeleteModal({{ $proyecto->id }}, '{{ $proyecto->titulo }}')" class="text-red-500 hover:text-red-700 flex items-center justify-center">
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

        <!-- Paginación -->
        <div class="flex justify-end text-sm mt-4">
            {{ $proyect->links('pagination::tailwind') }}
        </div>
    </div>

    <!-- Modal Crear -->
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
            <h2 class="text-xl font-bold mb-2">Crear Proyecto</h2>
            <form action="{{ route('proyect.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label for="descripcion" class="block">Descripcion</label>
                    <textarea id="descripcion" name="descripcion" class="w-full px-4 py-2 border rounded" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="autor" class="block">Autor</label>
                    <input type="text" id="autor" name="autor" class="w-full px-4 py-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="fecha_publicacion" class="block">Fecha</label>
                    <input type="date" id="fecha_publicacion" name="fecha_publicacion" class="w-full px-2 py-1 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="imagen" class="block">Imagen</label>
                    <input type="file" id="imagen" name="imagen" class="w-full px-2 py-1 border rounded" required accept="image/jpeg,image/png">
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-700">Guardar</button>
            </form>
        </div>
    </div>
<!-- Modal Eliminar -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white p-7 rounded shadow-lg max-w-md w-full relative">
        <button class="absolute top-0.5 right-0.5 text-gray-500 hover:text-black text-3xl p-2" onclick="closeDeleteModal()">&times;</button>
        <h2 class="text-xl font-bold mb-4">Eliminar Proyecto</h2>
        <p>¿Estás seguro de que deseas eliminar la proyecto "<span id="proyectoTitulo"></span>"?</p>

        <!-- Formulario de eliminación -->
        <form id="deleteForm" method="POST" action="{{ route('proyect.destroy', '') }}" class="mt-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-700">Aceptar</button>
            <button type="button" onclick="closeDeleteModal()" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-700 mt-2">Cancelar</button>
        </form>
    </div>
</div>

<!-- Modal para mostrar imágenes -->
<div id="archivoModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white p-7 rounded shadow-lg max-w-7xl w-full relative">
            <button class="absolute top-0.5 right-0.5 text-gray-500 hover:text-black text-3xl p-2" onclick="closeModal()">×</button>
            <div id="modalContent"></div>
        </div>
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                title: "Creado!",
                text: "{{ session('success') }}",
                icon: "success",
                customClass: {
                    confirmButton: 'bg-green-500 text-white hover:bg-green-600 focus:ring-2 focus:ring-green-300 rounded-lg py-2 px-4'
                }
            });
        </script>
    @elseif(session('edit'))
        <script>
            Swal.fire({
                title: "Actualizado!",
                text: "{{ session('edit') }}",
                icon: "success",
                customClass: {
                    confirmButton: 'bg-green-500 text-white hover:bg-green-600 focus:ring-2 focus:ring-green-300 rounded-lg py-2 px-4'
                }
            });
        </script>
    @elseif (session('destroy'))
        <script>
            Swal.fire({
                title: "Eliminado!",
                text: "{{ session('destroy') }}",
                icon: "success",
                customClass: {
                    confirmButton: 'bg-green-500 text-white hover:bg-green-600 focus:ring-2 focus:ring-green-300 rounded-lg py-2 px-4'
                }
            });
        </script>
     @elseif (session('error'))
     <script>
         Swal.fire({
             icon: 'error',
             title: '¡Hubo un error!',
             html: "{!! session('error') !!}",
             showConfirmButton: true,
             confirmButtonText: 'Aceptar',
             customClass: {
                 confirmButton: 'bg-red-500 text-white hover:bg-red-600 focus:ring-2 focus:ring-red-300 rounded-lg py-2 px-4'
             }
         });
     </script>
    @endif


    <script>
        function openCreateModal() {
            document.getElementById('createModal').classList.remove('hidden');
        }

        function closeCreateModal() {
            document.getElementById('createModal').classList.add('hidden');
        }

        function openDeleteModal(id, titulo) {
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('proyectoTitulo').innerText = titulo;
            const form = document.getElementById('deleteForm');
            form.action = "{{ route('proyect.destroy', '') }}/" + id;
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        function buscarProyectos(query) {
            fetch(`/admin/proyectos/buscar?search=${query}`, {
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
    </script>
@endsection