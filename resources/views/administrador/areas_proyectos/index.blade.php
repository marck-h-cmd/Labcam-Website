@extends('administrador.dashboard.plantilla')

@section('contenido')
    <div class="max-w-screen-2xl mx-auto my-8 px-4">
        <!-- Sección de título -->
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-[#2e5382]">Áreas de Proyectos</h1>
            <div class="w-1/4 mx-auto h-0.5 bg-[#64d423]"></div>
        </div>

        <div class="flex justify-between mb-6">
            <!-- Formulario de búsqueda sin botón -->
            <form action="{{ route('areas_proyectos_admin') }}" method="GET" class="flex space-x-4">
                <input type="text" name="search" id="search" value="{{ request('search') }}"
                    placeholder="Buscar por nombre" class="px-4 py-2 border rounded" oninput="this.form.submit()">
            </form>
            <button class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-700" onclick="openCreateModal()">
                Crear Área
            </button>
        </div>

        <!-- Tabla de Áreas de Proyectos -->
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full text-sm text-left text-gray-600 table-fixed">
                <thead class="bg-gray-200 text-gray-700 uppercase">
                    <tr>
                        <th class="px-4 py-3">Nombre del Área</th>
                        <th class="px-4 py-3">Imagen</th>
                        <th class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($areasProyecto as $area)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $area->nombreArea }}</td>
                            <td class="px-4 py-3">
                                @if ($area->imagen)
                                    <div class="px-8 py-0.1 text-center">
                                        <button
                                            class="w-8 h-8 flex items-center justify-center rounded shadow cursor-pointer text-blue-600 hover:text-blue-800"
                                            onclick="openModal('{{ Storage::url($area->imagen) }}', 'image')">
                                            <!-- Ícono "ver imagen" -->
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="w-6 h-6" viewBox="0 0 24 24">
                                                <path d="M18 22H4a2 2 0 0 1-2-2V6" />
                                                <path d="m22 13-1.296-1.296a2.41 2.41 0 0 0-3.408 0L11 18" />
                                                <circle cx="12" cy="8" r="2" />
                                                <rect width="16" height="16" x="6" y="2" rx="2" />
                                            </svg>
                                        </button>
                                    </div>
                                @else
                                    <span>No hay imagen</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 flex items-center space-x-4">
                                <!-- Botón para editar -->
                                <button type="button" onclick="openEditModal(this)"
                                    data-area='@json($area)'
                                    class="text-blue-600 font-bold hover:text-blue-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 3l3 3-8 8H3v-3l8-8z" />
                                    </svg>
                                </button>
                                <!-- Botón para eliminar -->
                                <button onclick="openDeleteModal({{ $area->id }}, '{{ $area->nombreArea }}')"
                                    class="text-red-500 hover:text-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 6h18M9 6V4a1 1 0 011-1h4a1 1 0 011 1v2M10 11v6M14 11v6M5 6h14l1 16a1 1 0 01-1 1H5a1 1 0 01-1-1L5 6z" />
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
            {{ $areasProyecto->appends(request()->query())->links('pagination::tailwind') }}
        </div>
    </div>

    <!-- Modal para mostrar imágenes (Visualización) -->
    <div id="archivoModal" class="hidden">
        <div class="fixed inset-0 bg-black bg-opacity-50 z-50 w-full h-full flex items-center justify-center">
            <!-- Contenedor cuadrado de 500x500 -->
            <div class="bg-white rounded shadow-lg relative w-[500px] h-[500px]">
                <!-- Botón de cerrar modal -->
                <button class="absolute top-2 right-2 text-gray-500 hover:text-black text-3xl p-2" onclick="closeModal()">
                    &times;
                </button>
                <!-- Área donde se inyecta la imagen -->
                <div id="modalContent" class="w-full h-full flex items-center justify-center"></div>
            </div>
        </div>
    </div>

    <!-- Modal Crear Área de Proyecto -->
    <div id="createModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 w-full h-full">
        <div class="flex items-center justify-center w-full h-full">
            <div class="bg-white px-8 py-6 rounded-lg shadow-xl max-w-3xl w-full relative max-h-screen overflow-y-auto">
                <!-- Título centrado -->
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-semibold text-blue-800">Crear Área de Proyecto</h2>
                    <div class="mx-auto mt-2 w-1/2 h-1 bg-green-400"></div>
                </div>

                <!-- Formulario de creación -->
                <form id="form" action="{{ route('areas_proyectos_store') }}" method="POST"
                    enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div class="space-y-6">
                        <!-- Nombre del Área -->
                        <div>
                            <label for="nombreArea" class="block text-gray-700">Nombre del Área</label>
                            <input type="text" id="nombreArea" name="nombreArea"
                                class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>

                        <!-- Imagen (Drag & Drop) -->
                        <div>
                            <label class="block text-gray-700 mb-1">Imagen</label>
                            <div id="image-upload"
                                class="border-2 border-dashed border-gray-300 w-full h-80 flex items-center justify-center cursor-pointer relative text-center rounded-md overflow-hidden"
                                onclick="document.getElementById('imagen').click()" ondragover="handleDragOver(event)"
                                ondrop="handleDrop(event, 'imagen')">
                                <!-- Placeholder -->
                                <span id="image-placeholder" class="text-gray-500 flex flex-col items-center absolute">
                                    <svg class="w-8 h-8 mb-4 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 16" aria-hidden="true">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    Selecciona o arrastra una imagen (png, jpeg, jpg)
                                </span>
                                <!-- Vista previa -->
                                <img id="previewImage" src="" alt="Vista previa"
                                    class="hidden max-w-full max-h-full object-contain rounded shadow mx-auto">
                                <!-- Botón eliminar imagen -->
                                <button type="button" id="remove-image"
                                    class="hidden absolute top-2 right-2 bg-red-500 text-white p-1 rounded-full hover:bg-red-600 transition cursor-pointer"
                                    onclick="removeImage(event)">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V5a2 2 0 00-2-2H9a2 2 0 00-2 2v2m3 0h4" />
                                    </svg>
                                </button>
                                <input type="file" id="imagen" name="imagen" class="hidden"
                                    accept="image/png, image/jpeg, image/jpg" required
                                    onchange="mostrarVistaPrevia(event)">
                            </div>
                        </div>
                    </div>

                    <!-- Botones de acción -->
                    <div class="flex justify-center gap-4 mt-6">
                        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-700">
                            Guardar
                        </button>
                        <button type="button" onclick="closeCreateModal()"
                            class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-700">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Editar Área de Proyecto -->
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 w-full h-full">
        <div class="flex items-center justify-center w-full h-full">
            <div class="bg-white px-8 py-6 rounded-lg shadow-xl max-w-3xl w-full relative max-h-screen overflow-y-auto">
                <!-- Título centrado -->
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-semibold text-blue-800">Editar Área de Proyecto</h2>
                    <div class="mx-auto mt-2 w-1/2 h-1 bg-green-400"></div>
                </div>

                <!-- Formulario de edición -->
                <form id="editForm" action="" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <div class="space-y-6">
                        <!-- Nombre del Área -->
                        <div>
                            <label for="editNombreArea" class="block text-gray-700">Nombre del Área</label>
                            <input type="text" id="editNombreArea" name="nombreArea"
                                class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>
                        <!-- Imagen (Drag & Drop) -->
                        <div>
                            <label class="block text-gray-700 mb-1">Imagen</label>
                            <div id="editImage-upload"
                                class="border-2 border-dashed border-gray-300 w-full h-80 flex items-center justify-center cursor-pointer relative text-center rounded-md overflow-hidden"
                                onclick="document.getElementById('editImagen').click()" ondragover="handleDragOver(event)"
                                ondrop="handleDrop(event, 'editImagen')">
                                <!-- Placeholder -->
                                <span id="editImage-placeholder"
                                    class="text-gray-500 flex flex-col items-center absolute">
                                    <svg class="w-8 h-8 mb-4 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 16" aria-hidden="true">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    Selecciona o arrastra una imagen (png, jpeg, jpg)
                                </span>
                                <!-- Vista previa -->
                                <img id="editPreviewImage" src="" alt="Vista previa"
                                    class="hidden max-w-full max-h-full object-contain rounded shadow mx-auto">
                                <!-- Botón eliminar imagen -->
                                <button type="button" id="editRemove-image"
                                    class="hidden absolute top-2 right-2 bg-red-500 text-white p-1 rounded-full hover:bg-red-600 transition cursor-pointer"
                                    onclick="removeEditImage(event)">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V5a2 2 0 00-2-2H9a2 2 0 00-2 2v2m3 0h4" />
                                    </svg>
                                </button>
                                <input type="file" id="editImagen" name="imagen" class="hidden"
                                    accept="image/png, image/jpeg, image/jpg" onchange="mostrarVistaPreviaEdit(event)">
                            </div>
                        </div>
                    </div>

                    <!-- Botones de acción -->
                    <div class="flex justify-center gap-4 mt-6">
                        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-700">
                            Actualizar
                        </button>
                        <button type="button" onclick="closeEditModal()"
                            class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-700">
                            Cancelar
                        </button>
                    </div>
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
                <h2 class="text-xl font-bold mb-4">Eliminar Área</h2>
                <p>¿Estás seguro de que deseas eliminar el área "<span id="areaTitulo"></span>"?</p>
                <!-- Formulario de eliminación -->
                <form id="deleteForm" method="POST" action="{{ route('areas_proyectos_destroy', '') }}" class="mt-4">
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

    <!-- Scripts para modales y drag & drop -->
    <script>
        // Función para abrir modal de creación
        function openCreateModal() {
            document.getElementById('createModal').classList.remove('hidden');
        }

        function closeCreateModal() {
            document.getElementById('createModal').classList.add('hidden');
            const formElement = document.getElementById('form');
            if (formElement) {
                formElement.reset();
            }
            removeImage();
        }

        // Función para vista previa en modal de creación
        function mostrarVistaPrevia(event) {
            const input = event.target;
            const previewImage = document.getElementById("previewImage");
            const imagePlaceholder = document.getElementById("image-placeholder");
            const removeBtn = document.getElementById("remove-image");
            if (input.files && input.files[0]) {
                const file = input.files[0];
                const allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
                if (!allowedTypes.includes(file.type)) {
                    alert("Tipo de archivo no permitido. Solo se permiten png, jpeg, jpg.");
                    input.value = "";
                    return;
                }
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('hidden');
                    imagePlaceholder.classList.add('hidden');
                    removeBtn.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        }

        // Función para quitar imagen en modal de creación
        function removeImage(event) {
            if (event) event.stopPropagation();
            const imageInput = document.getElementById("imagen");
            imageInput.value = "";
            const previewImage = document.getElementById("previewImage");
            previewImage.src = "";
            previewImage.classList.add('hidden');
            document.getElementById("image-placeholder").classList.remove('hidden');
            document.getElementById("remove-image").classList.add('hidden');
        }

        // Funciones para drag & drop (comparten la misma función para ambos modales)
        function handleDragOver(event) {
            event.preventDefault();
        }

        function handleDrop(event, inputId) {
            event.preventDefault();
            const inputElement = document.getElementById(inputId);
            if (event.dataTransfer.files && event.dataTransfer.files[0]) {
                inputElement.files = event.dataTransfer.files;
                // Llama a la función de vista previa adecuada según el inputId
                if (inputId === 'editImagen') {
                    mostrarVistaPreviaEdit({
                        target: inputElement
                    });
                } else {
                    mostrarVistaPrevia({
                        target: inputElement
                    });
                }
            }
        }

        // Funciones para modal de edición
        function openEditModal(button) {
            const areaData = JSON.parse(button.getAttribute('data-area'));
            document.getElementById('editNombreArea').value = areaData.nombreArea;
            if (areaData.imagen) {
                let filename = areaData.imagen;
                if (filename.startsWith('/storage/')) {
                    filename = filename.replace('/storage/', '');
                }
                const imageUrl = `/user/template/images/${filename}`;
                const previewImg = document.getElementById('editPreviewImage');
                previewImg.src = imageUrl;
                previewImg.classList.remove('hidden');
                document.getElementById('editImage-placeholder').classList.add('hidden');
                document.getElementById('editRemove-image').classList.remove('hidden');
            } else {
                document.getElementById('editPreviewImage').classList.add('hidden');
                document.getElementById('editImage-placeholder').classList.remove('hidden');
                document.getElementById('editRemove-image').classList.add('hidden');
            }
            const editForm = document.getElementById('editForm');
            editForm.action = "{{ route('areas_proyectos_update', '') }}/" + areaData.id;
            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('editForm').reset();
            document.getElementById('editPreviewImage').src = "";
            document.getElementById('editPreviewImage').classList.add('hidden');
            document.getElementById('editImage-placeholder').classList.remove('hidden');
            document.getElementById('editRemove-image').classList.add('hidden');
        }

        function mostrarVistaPreviaEdit(event) {
            const input = event.target;
            const previewImage = document.getElementById("editPreviewImage");
            const imagePlaceholder = document.getElementById("editImage-placeholder");
            const removeBtn = document.getElementById("editRemove-image");
            if (input.files && input.files[0]) {
                const file = input.files[0];
                const allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
                if (!allowedTypes.includes(file.type)) {
                    alert("Tipo de archivo no permitido. Solo se permiten png, jpeg, jpg.");
                    input.value = "";
                    return;
                }
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('hidden');
                    imagePlaceholder.classList.add('hidden');
                    removeBtn.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        }

        function removeEditImage(event) {
            if (event) event.stopPropagation();
            const imageInput = document.getElementById("editImagen");
            imageInput.value = "";
            const previewImage = document.getElementById("editPreviewImage");
            previewImage.src = "";
            previewImage.classList.add('hidden');
            document.getElementById("editImage-placeholder").classList.remove('hidden');
            document.getElementById("editRemove-image").classList.add('hidden');
        }

        // Funciones para modal de eliminación
        function openDeleteModal(id, titulo) {
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('areaTitulo').innerText = titulo;
            const form = document.getElementById('deleteForm');
            form.action = "{{ route('areas_proyectos_destroy', '') }}/" + id;
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        function openModal(src, type) {
            let filename = src;
            if (filename.startsWith('/storage/')) {
                filename = filename.replace('/storage/', '');
            }
            const imageUrl = `/user/template/images/${filename}`;

            // Muestra el modal
            document.getElementById('archivoModal').classList.remove('hidden');

            let content = '';
            if (type === 'image') {
                // Clases Tailwind para que la imagen no llene al 100% y deje margen
                content = `
        <img 
          src="${imageUrl}" 
          alt="Imagen" 
          class="object-contain max-w-[80%] max-h-[80%]"
        />
      `;
            }
            document.getElementById('modalContent').innerHTML = content;
        }

        function closeModal() {
            document.getElementById('archivoModal').classList.add('hidden');
            document.getElementById('modalContent').innerHTML = '';
        }
    </script>

    <!-- SweetAlert para eliminación y creación -->
    @if (session('destroy'))
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
    @endif

    @if (session('create_success'))
        <script>
            Swal.fire({
                title: "¡Creado!",
                text: "{{ session('create_success') }}",
                icon: "success",
                customClass: {
                    confirmButton: 'bg-green-500 text-white hover:bg-green-600 focus:ring-2 focus:ring-green-300 rounded-lg py-2 px-4'
                }
            });
        </script>
    @endif

    <!-- Modal para mostrar imágenes -->
    <div id="archivoModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 items-center justify-center">
        <!-- Contenedor principal (750×750), con padding y posición relativa -->
        <div class="relative bg-white rounded shadow-lg w-[750px] h-[750px] p-8 flex flex-col">
            <!-- Botón de cerrar con posición absoluta -->
            <button class="absolute top-4 right-4 text-gray-500 hover:text-black text-3xl" onclick="closeModal()">
                &times;
            </button>

            <!-- Contenedor que centra la imagen -->
            <div class="flex-1 flex items-center justify-center overflow-hidden">
                <!-- Aquí se inyecta la imagen -->
                <div id="modalContent" class="w-full h-full flex items-center justify-center"></div>
            </div>
        </div>
    </div>
@endsection
