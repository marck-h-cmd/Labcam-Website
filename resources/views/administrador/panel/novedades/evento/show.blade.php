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
                <input type="text" id="search" placeholder="Buscar por título o autor" class="px-4 py-2 border rounded"
                    oninput="buscarEvento(this.value)">
            </div>
            <button class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-700" onclick="openCreateModal()">
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
                                            onclick="openModal('{{ Storage::url($evento->imagen) }}', 'image')">
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

                            <td class="px-4 py-3 flex items-center justify-center space-x-4">
                                @if ($evento->categoria === 'futuro')
                                    <!-- Editar -->
                                    <button type="button" onclick="openEditModal(this)"
                                        data-evento='@json($evento)'
                                        class="text-blue-600 font-bold hover:text-blue-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11 3l3 3-8 8H3v-3l8-8z" />
                                        </svg>
                                    </button>
                                    <button onclick="openDeleteModal({{ $evento->id }}, '{{ $evento->titulo }}')"
                                        class="text-red-500 hover:text-red-700 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 6h18M9 6V4a1 1 0 011-1h4a1 1 0 011 1v2M10 11v6M14 11v6M5 6h14l1 16a1 1 0 01-1 1H5a1 1 0 01-1-1L5 6z" />
                                        </svg>
                                    </button>
                                @else
                                    <span class="italic">Este evento ya se realizó</span>
                                @endif
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

    <!-- Modal Crear -->
    <div id="createModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 w-full h-full">
        <div class="flex items-center justify-center w-full h-full">
            <div class="bg-white px-8 py-6 rounded-lg shadow-xl max-w-4xl w-full relative max-h-screen overflow-y-auto">
                <!-- Título centrado -->
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-semibold text-blue-800">Crear Evento</h2>
                    <div class="mx-auto mt-2 w-1/5 h-1 bg-green-400"></div>
                </div>

                <!-- Formulario -->
                <form id="form" action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    <!-- Contenedor principal con Grid (2 columnas en md+) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Columna Izquierda -->
                        <div class="space-y-4">
                            <!-- Título -->
                            <div>
                                <label for="titulo" class="block text-gray-700">Título</label>
                                <input type="text" id="titulo" name="titulo"
                                    class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-md
                                              focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>

                            <!-- Subtítulo -->
                            <div>
                                <label for="subtitulo" class="block text-gray-700">Subtítulo</label>
                                <input type="text" id="subtitulo" name="subtitulo"
                                    class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-md
                                              focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <!-- Autor -->
                            <div>
                                <label for="autor" class="block text-gray-700">Autor</label>
                                <input type="text" id="autor" name="autor"
                                    class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-md
                                              focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>

                            <!-- Fecha -->
                            <div>
                                <label for="fecha" class="block text-gray-700">Fecha</label>
                                <input type="date" id="fecha" name="fecha"
                                    class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-md
                                              focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>
                        </div>

                        <!-- Columna Derecha -->
                        <div class="space-y-4">
                            <!-- Descripcion -->
                            <div>
                                <label for="descripcion" class="block text-gray-700">Descripcion</label>
                                <textarea id="descripcion" name="descripcion" rows="7"
                                    class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-md
                                                 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required></textarea>
                            </div>

                            <!-- Imagen (Drag & Drop) -->
                            <div>
                                <label class="block text-gray-700 mb-1">Imagen</label>
                                <div id="image-upload"
                                    class="border-2 border-dashed border-gray-300 w-full h-48
                                            flex flex-col items-center justify-center cursor-pointer relative text-center rounded-md"
                                    onclick="document.getElementById('imagen').click()" ondragover="handleDragOver(event)"
                                    ondrop="handleDrop(event, 'imagen')">
                                    <!-- Placeholder (se ve si no hay imagen) -->
                                    <span id="image-placeholder" class="text-gray-500 flex flex-col items-center">
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
                                        class="hidden w-full h-full object-cover rounded shadow mx-auto">
                                    <!-- Botón eliminar imagen -->
                                    <button type="button" id="remove-image"
                                        class="hidden absolute top-2 right-2 bg-red-500 text-white p-1 rounded-full hover:bg-red-600 transition cursor-pointer"
                                        onclick="removeImage(event)">
                                        <!-- Icono papelera -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0
                                                                                                                                                                     0116.138 21H7.862a2 2 0
                                                                                                                                                                     01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V5a2 2
                                                                                                                                                                     0 00-2-2H9a2 2 0 00-2 2v2m3 0h4" />
                                        </svg>
                                    </button>
                                    <input type="file" id="imagen" name="imagen" class="hidden"
                                        accept="image/png, image/jpeg, image/jpg" required
                                        onchange="mostrarVistaPrevia(event)">
                                </div>
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

    <!-- Modal Editar -->
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 w-full h-full">
        <div class="flex items-center justify-center w-full h-full">
            <div class="bg-white px-8 py-6 rounded-lg shadow-xl max-w-4xl w-full relative max-h-screen overflow-y-auto">
                <!-- Título centrado -->
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-semibold text-blue-800">Editar Evento</h2>
                    <div class="mx-auto mt-2 w-1/5 h-1 bg-green-400"></div>
                </div>

                <!-- Formulario -->
                <form id="editForm" action="" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Grid principal (2 columnas en md+) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Columna Izquierda -->
                        <div class="space-y-4">
                            <!-- Título -->
                            <div>
                                <label for="edit_titulo" class="block text-gray-700">Título</label>
                                <input type="text" id="edit_titulo" name="edit_titulo"
                                    class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>
                            <!-- Subtítulo -->
                            <div>
                                <label for="edit_subtitulo" class="block text-gray-700">Subtítulo</label>
                                <input type="text" id="edit_subtitulo" name="edit_subtitulo"
                                    class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <!-- Autor -->
                            <div>
                                <label for="edit_autor" class="block text-gray-700">Autor</label>
                                <input type="text" id="edit_autor" name="edit_autor"
                                    class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>
                            <!-- Fecha -->
                            <div>
                                <label for="edit_fecha" class="block text-gray-700">Fecha</label>
                                <input type="date" id="edit_fecha" name="edit_fecha"
                                    class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>
                        </div>

                        <!-- Columna Derecha -->
                        <div class="space-y-4">
                            <!-- Contenido -->
                            <div>
                                <label for="edit_descripcion" class="block text-gray-700">Descripcion</label>
                                <textarea id="edit_descripcion" name="edit_descripcion" rows="7"
                                    class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required></textarea>
                            </div>
                            <!-- Imagen (Drag & Drop y selector) -->
                            <div>
                                <label class="block text-gray-700 mb-1">Imagen</label>
                                <div id="edit-image-upload"
                                    class="border-2 border-dashed border-gray-300 w-full h-48 flex items-center justify-center cursor-pointer relative text-center rounded-md overflow-hidden"
                                    ondragover="handleDragOver(event)" ondrop="handleDrop(event, 'edit_imagen')"
                                    onclick="if(document.getElementById('edit_previewImage').classList.contains('hidden')) { document.getElementById('edit_imagen').click(); }">
                                    <!-- Vista previa -->
                                    <img id="edit_previewImage" src="" alt="Vista previa"
                                        class="hidden w-full h-full object-cover rounded shadow mx-auto">
                                    <!-- Placeholder -->
                                    <span id="edit-image-placeholder" class="text-gray-500 flex flex-col items-center">
                                        <svg class="w-8 h-8 mb-4 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 20 16" aria-hidden="true">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        Selecciona o arrastra una
                                        imagen (png, jpeg, jpg)</span>
                                    <!-- Botón eliminar imagen (muestra icono de papelera) -->
                                    <button type="button" id="edit_remove_image"
                                        class="hidden absolute top-2 right-2 bg-red-500 text-white p-1 rounded-full hover:bg-red-600 transition cursor-pointer"
                                        onclick="removeImageEdit(event)">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V5a2 2 0 00-2-2H9a2 2 0 00-2 2v2m3 0h4" />
                                        </svg>
                                    </button>
                                    <input type="file" id="edit_imagen" name="edit_imagen" class="hidden"
                                        accept="image/png, image/jpeg, image/jpg" onchange="previewImageEdit(event)">
                                </div>
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
                <h2 class="text-xl font-bold mb-4">Eliminar Evento</h2>
                <p>¿Estás seguro de que deseas eliminar el evento "<span id="eventoTitulo"></span>"?</p>

                <!-- Formulario de eliminación -->
                <form id="deleteForm" method="POST" action="{{ route('event.destroy', '') }}" class="mt-4">
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

    <!-- Modal para mostrar imágenes -->
    <div id="archivoModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 w-full h-full">
        <div class="flex items-center justify-center w-full h-full">
            <div class="bg-white p-7 rounded shadow-lg max-w-7xl w-full relative">
                <button class="absolute top-0.5 right-0.5 text-gray-500 hover:text-black text-3xl p-2"
                    onclick="closeModal()">×</button>
                <div id="modalContent"></div>
            </div>
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
        // Abre el modal
        function openCreateModal() {
            document.getElementById('createModal').classList.remove('hidden');
        }

        // Cierra el modal
        function closeCreateModal() {
            document.getElementById('createModal').classList.add('hidden');
            // Limpia campos y vista previa (opcional)
            const formElement = document.getElementById('form');
            if (formElement) {
                formElement.reset();
            }
            removeImage(); // Quita la imagen si estaba seleccionada
        }

        // Vista previa de imagen (Drag & Drop o selector)
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

        // Quitar imagen seleccionada
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

        // Drag & Drop
        function handleDragOver(event) {
            event.preventDefault();
        }

        function handleDrop(event, inputId) {
            event.preventDefault();
            const inputElement = document.getElementById(inputId);
            if (event.dataTransfer.files && event.dataTransfer.files[0]) {
                inputElement.files = event.dataTransfer.files;
                // Llama a la función de vista previa según el inputId
                if (inputId === 'imagen') {
                    mostrarVistaPrevia({
                        target: inputElement
                    });
                } else if (inputId === 'edit_imagen') {
                    previewImageEdit({
                        target: inputElement
                    });
                }
            }
        }


        // Abre el modal de editar y precarga los datos
        function openEditModal(button) {
            // Se espera que el botón tenga data-evento con el JSON del evento
            let evento = JSON.parse(button.getAttribute('data-evento'));

            // Precargar datos en los campos
            document.getElementById('edit_titulo').value = evento.titulo;
            document.getElementById('edit_subtitulo').value = evento.subtitulo;
            document.getElementById('edit_descripcion').value = evento.descripcion;
            document.getElementById('edit_autor').value = evento.autor;
            document.getElementById('edit_fecha').value = evento.fecha;

            // Configura la acción del formulario
            document.getElementById('editForm').action = `/admin/eventos/${evento.id}`;

            // Precargar imagen
            const previewImage = document.getElementById('edit_previewImage');
            const imagePlaceholder = document.getElementById('edit-image-placeholder');
            const removeBtn = document.getElementById('edit_remove_image');
            if (evento.imagen) {
                previewImage.src = `{{ url('storage') }}/${evento.imagen}`;
                previewImage.classList.remove('hidden');
                imagePlaceholder.classList.add('hidden');
                removeBtn.classList.remove('hidden');
            } else {
                previewImage.src = "";
                previewImage.classList.add('hidden');
                imagePlaceholder.classList.remove('hidden');
                removeBtn.classList.add('hidden');
            }

            // Muestra el modal
            document.getElementById('editModal').classList.remove('hidden');
        }

        // Cierra el modal de editar y limpia el formulario
        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('editForm').reset();
            removeImageEdit();
        }

        // Vista previa de imagen para el modal de editar
        function previewImageEdit(event) {
            const input = event.target;
            const previewImage = document.getElementById("edit_previewImage");
            const imagePlaceholder = document.getElementById("edit-image-placeholder");
            const removeBtn = document.getElementById("edit_remove_image");

            if (input.files && input.files[0]) {
                const file = input.files[0];
                const allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
                if (!allowedTypes.includes(file.type)) {
                    alert("Tipo de archivo no permitido. Solo se permiten PNG, JPEG, JPG.");
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

        // Función para eliminar la imagen seleccionada en el modal de editar
        function removeImageEdit(event) {
            if (event) event.stopPropagation();
            const imageInput = document.getElementById("edit_imagen");
            imageInput.value = "";
            const previewImage = document.getElementById("edit_previewImage");
            previewImage.src = "";
            previewImage.classList.add('hidden');
            document.getElementById("edit-image-placeholder").classList.remove('hidden');
            document.getElementById("edit_remove_image").classList.add('hidden');
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
                modalContent.innerHTML =
                    `<img src="${fileUrl}" alt="Archivo" class="w-full max-h-[80vh] object-contain rounded">`;
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
                    [{
                        'size': ['small', false, 'large', 'huge']
                    }],
                    ['bold', 'italic', 'underline'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }],
                    [{
                        'align': []
                    }],
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
