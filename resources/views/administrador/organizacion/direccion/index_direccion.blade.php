@extends('administrador.dashboard.plantilla')

@section('contenido')
    <div class="main-title flex flex-col items-center gap-3 mb-8">
        <div class="title text-2xl font-semibold text-[#2e5382]">Dirección</div>
        <div class="blue-line w-1/5 h-0.5 bg-[#64d423]"></div>
    </div>

    <div class="p-2">
        <div class="max-w-[1200px] mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="flow-root">
                        <div class="mt-10 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="w-full divide-y divide-gray-300">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Nombres y Apellidos
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Grado Académico
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Rol
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Linkedin
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Cti Vitae
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Foto
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                CV
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Opciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body" class="divide-y divide-gray-200 bg-white">
                                        @foreach ($direcciones as $direccion)
                                            <tr>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $direccion->nombre }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $direccion->carrera }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $direccion->rol }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    <a href="{{ $direccion->linkedin }}" target="_blank"><svg
                                                            xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                            width="40" height="40" viewBox="0 0 64 64">
                                                            <rect width="50" height="50" x="7" y="7" fill="#58b5e8"
                                                                rx="6" ry="6"></rect>
                                                            <path fill="#faefde"
                                                                d="M19.5 19A3.5 3.5 0 1 0 19.5 26 3.5 3.5 0 1 0 19.5 19zM39.76 28c-2.21 0-5 1.78-6.19 2.79V29.46a1 1 0 0 0-1-1H27.48a1 1 0 0 0-1 1v21a1 1 0 0 0 1 1h5.4a1 1 0 0 0 1-1V39.88c0-3.16 1.78-5.34 3.89-5.34s3.37 2.39 3.37 5.51V50.48a1 1 0 0 0 1 1h5.4a1 1 0 0 0 1-1V38.77C48.4 33.44 47.37 28 39.76 28zM16 29H23V51H16z">
                                                            </path>
                                                            <path fill="#65c5ef"
                                                                d="M11,7H53a4,4,0,0,1,4,4v0a3,3,0,0,1-3,3H10a3,3,0,0,1-3-3v0a4,4,0,0,1,4-4Z">
                                                            </path>
                                                            <path fill="#8d6c9f"
                                                                d="M23 28H16a1 1 0 0 0-1 1V51a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V29A1 1 0 0 0 23 28zM22 50H17V30h5zM39.88 27.44a8.47 8.47 0 0 0-5.44 1.88V29a1 1 0 0 0-1-1H27a1 1 0 0 0-1 1V51a1 1 0 0 0 1 1h6.7a1 1 0 0 0 1-1V39.89c0-3.31.82-4.55 3-4.55s2.49 1.46 2.49 4.72V51a1 1 0 0 0 1 1h6.71a1 1 0 0 0 1-1V38.72C48.92 33.14 47.85 27.44 39.88 27.44zm7 22.56H42.21V40.06c0-2.35 0-6.72-4.49-6.72-5 0-5 4.93-5 6.55V50H28V30h4.43v2a1.08 1.08 0 0 0 1.09 1 1 1 0 0 0 .88-.53 6.07 6.07 0 0 1 5.46-3c5.87 0 7 3.55 7 9.29zM19.5 18A4.5 4.5 0 1 0 24 22.5 4.5 4.5 0 0 0 19.5 18zm0 7.33a2.83 2.83 0 1 1 2.83-2.83A2.83 2.83 0 0 1 19.5 25.33z">
                                                            </path>
                                                            <path fill="#8d6c9f"
                                                                d="M51,6H13a7,7,0,0,0-7,7V51a7,7,0,0,0,7,7H51a7,7,0,0,0,7-7V13A7,7,0,0,0,51,6Zm5,45a5,5,0,0,1-5,5H13a5,5,0,0,1-5-5V13a5,5,0,0,1,5-5H51a5,5,0,0,1,5,5Z">
                                                            </path>
                                                            <path fill="#8d6c9f"
                                                                d="M17 16a1 1 0 0 0 1-1V13a1 1 0 0 0-2 0v2A1 1 0 0 0 17 16zM12 12a1 1 0 0 0-1 1v2a1 1 0 0 0 2 0V13A1 1 0 0 0 12 12zM32 16a1 1 0 0 0 1-1V13a1 1 0 0 0-2 0v2A1 1 0 0 0 32 16zM37 16a1 1 0 0 0 1-1V13a1 1 0 0 0-2 0v2A1 1 0 0 0 37 16zM42 16a1 1 0 0 0 1-1V13a1 1 0 0 0-2 0v2A1 1 0 0 0 42 16zM47 16a1 1 0 0 0 1-1V13a1 1 0 0 0-2 0v2A1 1 0 0 0 47 16zM52 12a1 1 0 0 0-1 1v2a1 1 0 0 0 2 0V13A1 1 0 0 0 52 12zM22 16a1 1 0 0 0 1-1V13a1 1 0 0 0-2 0v2A1 1 0 0 0 22 16zM27 16a1 1 0 0 0 1-1V13a1 1 0 0 0-2 0v2A1 1 0 0 0 27 16z">
                                                            </path>
                                                        </svg></a>
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    <a href="{{ $direccion->ctivitae }}" target="_blank"><img width="40"
                                                            height="40" src="https://img.icons8.com/fluency/48/link.png"
                                                            alt="link" /></a>
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    <button
                                                        onclick='openModal("/user/template/images/{{ $direccion->foto }}", "image")'>
                                                        <img width="40" height="40"
                                                            src="https://img.icons8.com/stickers/50/image.png"
                                                            alt="image" />
                                                    </button>
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    <a href="/user/template/uploads/pdfs/{{ $direccion->cv }}"
                                                        target="_blank"><img width="40" height="40"
                                                            src="https://img.icons8.com/ultraviolet/40/documents.png"
                                                            alt="documents" /></a>
                                                </td>
                                                <td
                                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                    <button type="button" onclick="openEditModal(this)"
                                                        data-direccion='@json($direccion)'class="text-blue-600 font-bold hover:text-blue-900">
                                                        <img width="40" height="40"
                                                            src="https://img.icons8.com/stickers/50/sign-up.png"
                                                            alt="sign-up" />
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- --------------------MODAL DE EDITAR DE REGISTRO---------------------- --}}
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 w-full h-full">
        <div class="flex items-center justify-center w-full h-full">
            <div class="bg-white px-8 py-6 rounded-lg shadow-xl max-w-4xl w-full relative max-h-screen overflow-y-auto">
                <!-- Título centrado -->
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-semibold text-blue-800">Editar Registro</h2>
                    <div class="mx-auto mt-2 w-1/5 h-1 bg-green-400"></div>
                </div>

                <!-- Formulario -->
                <form id="editForm" action="" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Grid principal: 2 columnas en md+ -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Columna Izquierda -->
                        <div class="space-y-4">
                            <!-- Nombres y Apellidos -->
                            <div>
                                <label for="edit_nombre" class="block text-gray-700">Nombres y Apellidos:</label>
                                <input type="text" id="edit_nombre" name="edit_nombre"
                                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md
                                          focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>

                            <!-- Grado Académico -->
                            <div>
                                <label for="edit_carrera" class="block text-gray-700">Grado Académico:</label>
                                <input type="text" id="edit_carrera" name="edit_carrera"
                                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md
                                          focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>

                            <!-- Rol (readonly) -->
                            <div>
                                <label for="edit_rol" class="block text-gray-700">Rol:</label>
                                <input type="text" id="edit_rol" name="edit_rol"
                                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100" readonly>
                            </div>

                            <!-- Descripción (textarea) -->
                            <div>
                                <label for="edit_descripcion" class="block text-gray-700">Descripción:</label>
                                <textarea id="edit_descripcion" name="edit_descripcion" rows="8"
                                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md
                                             focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required></textarea>
                            </div>
                        </div>

                        <!-- Columna Derecha -->
                        <div class="space-y-4">
                            <!-- Imagen de Perfil (drag & drop) -->
                            <div>
                                <label class="block text-gray-700 mb-1">Imagen de Perfil:</label>
                                <div id="edit-image-upload"
                                    class="border-2 border-dashed border-gray-300 w-full h-52
                                        flex flex-col items-center justify-center cursor-pointer relative text-center rounded-md"
                                    onclick="document.getElementById('edit_img').click()"
                                    ondragover="handleDragOver(event)" ondrop="handleDrop(event, 'edit_img')">

                                    <!-- Placeholder -->
                                    <span id="edit-image-placeholder" class="text-gray-500 flex flex-col items-center">
                                        <svg class="w-8 h-8 mb-4 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 20 16" aria-hidden="true">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        Selecciona o arrastra una imagen (png, jpeg, jpg, gif)
                                    </span>

                                    <!-- Vista previa de la imagen -->
                                    <img id="previewImg" src="" alt="Vista previa"
                                        class="hidden w-52 h-full object-cover rounded shadow mx-auto">

                                    <!-- Botón papelera (para eliminar imagen) -->
                                    <button type="button" id="edit_remove_image"
                                        class="hidden absolute top-2 right-2 bg-red-500 text-white p-1 rounded-full hover:bg-red-600 transition cursor-pointer"
                                        onclick="removeImageEdit(event)">
                                        <!-- Ícono papelera -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0
                                                                                     0116.138 21H7.862a2 2 0
                                                                                     01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V5a2 2
                                                                                     0 00-2-2H9a2 2 0 00-2 2v2m3 0h4" />
                                        </svg>
                                    </button>
                                    <input type="file" id="edit_img" name="edit_img" class="hidden"
                                        accept="image/*" onchange="previewImageEdit(event)">
                                </div>
                            </div>

                            <!-- CV (drag & drop) -->
                            <div>
                                <label for="edit_cv" class="block text-gray-700 mb-1">CV:</label>
                                <div id="edit-cv-upload"
                                    class="border-2 border-dashed border-gray-300 w-full h-11
                                        flex flex-col items-center justify-center cursor-pointer relative text-center rounded-md"
                                    onclick="document.getElementById('edit_cv').click()"
                                    ondragover="handleDragOver(event)" ondrop="handleDrop(event, 'edit_cv')">

                                    <!-- Placeholder CV -->
                                    <span id="edit-cv-placeholder" class="text-gray-500">
                                        Selecciona o arrastra un archivo PDF
                                    </span>

                                    <!-- Nombre de archivo CV (se muestra si ya hay uno o se elige uno nuevo) -->
                                    <div id="cvPreview" class="hidden text-sm mt-1"></div>

                                    <!-- Botón papelera (para eliminar CV) -->
                                    <button type="button" id="edit_remove_cv"
                                        class="hidden absolute top-1 right-2 bg-red-500 text-white p-1 rounded-full hover:bg-red-600 transition cursor-pointer"
                                        onclick="removeCVEdit(event)">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0
                                                                                     0116.138 21H7.862a2 2 0
                                                                                     01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V5a2 2
                                                                                     0 00-2-2H9a2 2 0 00-2 2v2m3 0h4" />
                                        </svg>
                                    </button>
                                    <input type="file" id="edit_cv" name="edit_cv" class="hidden"
                                        accept="application/pdf" onchange="previewCVEdit(event)">
                                </div>
                            </div>

                            <!-- LinkedIn -->
                            <div>
                                <label for="edit_linkedin" class="block text-gray-700">LinkedIn:</label>
                                <input type="text" id="edit_linkedin" name="edit_linkedin"
                                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md
                                          focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>

                            <!-- CtiVitae -->
                            <div>
                                <label for="edit_ctivitae" class="block text-gray-700">CtiVitae:</label>
                                <input type="text" id="edit_ctivitae" name="edit_ctivitae"
                                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md
                                          focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
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


    @if (session('update_success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Actualización exitosa',
                text: '{{ session('update_success') }}',
                showConfirmButton: true,
                confirmButtonText: 'Aceptar',
                customClass: {
                    confirmButton: 'bg-green-500 text-white hover:bg-green-600 focus:ring-2 focus:ring-green-300 rounded-lg py-2 px-4'
                }
            });
        </script>
    @endif

    <script>
        // Abre el modal, precarga datos y muestra la vista previa (imagen, CV) si existen
        function openEditModal(button) {
            let direccion = JSON.parse(button.getAttribute('data-direccion'));

            // Completar campos
            document.getElementById('edit_nombre').value = direccion.nombre;
            document.getElementById('edit_descripcion').value = direccion.descripcion;
            document.getElementById('edit_carrera').value = direccion.carrera;
            document.getElementById('edit_rol').value = direccion.rol;
            document.getElementById('edit_linkedin').value = direccion.linkedin;
            document.getElementById('edit_ctivitae').value = direccion.ctivitae;

            // Imagen actual
            const previewImg = document.getElementById('previewImg');
            const editImagePlaceholder = document.getElementById('edit-image-placeholder');
            const removeBtn = document.getElementById('edit_remove_image');
            if (direccion.foto) {
                previewImg.src = `/user/template/images/${direccion.foto}`;
                previewImg.classList.remove('hidden');
                editImagePlaceholder.classList.add('hidden');
                removeBtn.classList.remove('hidden');
            } else {
                // No hay imagen previa
                previewImg.src = "";
                previewImg.classList.add('hidden');
                editImagePlaceholder.classList.remove('hidden');
                removeBtn.classList.add('hidden');
            }

            // CV actual
            const cvPlaceholder = document.getElementById('edit-cv-placeholder');
            const cvPreview = document.getElementById('cvPreview');
            const removeCVBtn = document.getElementById('edit_remove_cv');
            if (direccion.cv) {
                // Muestra nombre del CV
                cvPreview.textContent = direccion.cv;
                cvPreview.classList.remove('hidden');
                cvPlaceholder.classList.add('hidden');
                removeCVBtn.classList.remove('hidden');
            } else {
                // No hay CV previo
                cvPreview.textContent = "";
                cvPreview.classList.add('hidden');
                cvPlaceholder.classList.remove('hidden');
                removeCVBtn.classList.add('hidden');
            }

            // Define la acción del formulario (ej: /admin/direccion/ID)
            document.getElementById('editForm').action = `/admin/direccion/${direccion.id}`;

            // Muestra el modal
            document.getElementById('editModal').classList.remove('hidden');
        }

        // Cierra el modal de editar
        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('editForm').reset();
            removeImageEdit();
            removeCVEdit();
        }

        // =========== DRAG & DROP ===========
        function handleDragOver(event) {
            event.preventDefault();
        }

        function handleDrop(event, inputId) {
            event.preventDefault();
            const inputElement = document.getElementById(inputId);
            if (event.dataTransfer.files && event.dataTransfer.files[0]) {
                inputElement.files = event.dataTransfer.files;
                if (inputId === 'edit_img') {
                    previewImageEdit({
                        target: inputElement
                    });
                } else if (inputId === 'edit_cv') {
                    previewCVEdit({
                        target: inputElement
                    });
                }
            }
        }

        // =========== IMAGEN (Vista Previa) ===========
        function previewImageEdit(event) {
            const input = event.target;
            const previewImage = document.getElementById("previewImg");
            const imagePlaceholder = document.getElementById("edit-image-placeholder");
            const removeBtn = document.getElementById("edit_remove_image");

            if (input.files && input.files[0]) {
                const file = input.files[0];
                const allowedTypes = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];
                if (!allowedTypes.includes(file.type)) {
                    alert("Tipo de archivo no permitido. Solo se permiten png, jpeg, jpg, gif.");
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

        function removeImageEdit(event) {
            if (event) event.stopPropagation();
            const imageInput = document.getElementById("edit_img");
            imageInput.value = "";
            const previewImage = document.getElementById("previewImg");
            previewImage.src = "";
            previewImage.classList.add('hidden');
            document.getElementById("edit-image-placeholder").classList.remove('hidden');
            document.getElementById("edit_remove_image").classList.add('hidden');
        }

        // =========== CV (Vista Previa) ===========
        function previewCVEdit(event) {
            const input = event.target;
            const cvPlaceholder = document.getElementById("edit-cv-placeholder");
            const cvPreview = document.getElementById("cvPreview");
            const removeBtn = document.getElementById("edit_remove_cv");

            if (input.files && input.files[0]) {
                const file = input.files[0];
                if (file.type !== 'application/pdf') {
                    alert("Tipo de archivo no permitido. Solo se permite PDF.");
                    input.value = "";
                    return;
                }
                cvPreview.textContent = file.name; // Muestra el nombre del archivo elegido
                cvPreview.classList.remove('hidden');
                cvPlaceholder.classList.add('hidden');
                removeBtn.classList.remove('hidden');
            }
        }

        function removeCVEdit(event) {
            if (event) event.stopPropagation();
            const cvInput = document.getElementById("edit_cv");
            cvInput.value = "";
            document.getElementById("cvPreview").textContent = "";
            document.getElementById("cvPreview").classList.add('hidden');
            document.getElementById("edit-cv-placeholder").classList.remove('hidden');
            document.getElementById("edit_remove_cv").classList.add('hidden');
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
    </script>
@endsection
