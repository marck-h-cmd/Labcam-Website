@extends('administrador.dashboard.plantilla')

@section('title', 'Tutoriales')

@section('contenido')
    <div class="max-w-screen-2xl mx-auto my-8 px-4">
        <!-- Sección de detalles de tutoriales -->
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-[#2e5382]">Tutoriales</h1>
            <div class="w-1/4 mx-auto h-0.5 bg-[#64d423]"></div>
        </div>

        <div class="flex justify-between mb-6">

            <button class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-700" onclick="openCreateModal()">
                Crear Tutorial
            </button>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full text-sm text-left text-gray-600 table-fixed">
                <thead class="bg-gray-200 text-gray-700 uppercase">
                    <tr>
                        <th class="px-4 py-3">Título</th>
                        <th class="px-4 py-3">Visualizar</th>
                        <th class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tutorials as $tutorial)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $tutorial->titulo }}</td>
                            <td class="px-4 py-3 ">
                                <a href="{{ route('tutorials.show', $tutorial->id) }}"
                                    class="text-gray-600 font-bold hover:text-gray-900 mr-3"><svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 6C8.76722 6 5.95965 8.31059 4.2048 11.7955C4.17609 11.8526 4.15483 11.8948 4.1369 11.9316C4.12109 11.964 4.11128 11.9853 4.10486 12C4.11128 12.0147 4.12109 12.036 4.1369 12.0684C4.15483 12.1052 4.17609 12.1474 4.2048 12.2045C5.95965 15.6894 8.76722 18 12 18C15.2328 18 18.0404 15.6894 19.7952 12.2045C19.8239 12.1474 19.8452 12.1052 19.8631 12.0684C19.8789 12.036 19.8888 12.0147 19.8952 12C19.8888 11.9853 19.8789 11.964 19.8631 11.9316C19.8452 11.8948 19.8239 11.8526 19.7952 11.7955C18.0404 8.31059 15.2328 6 12 6ZM2.41849 10.896C4.35818 7.04403 7.7198 4 12 4C16.2802 4 19.6419 7.04403 21.5815 10.896C21.5886 10.91 21.5958 10.9242 21.6032 10.9389C21.6945 11.119 21.8124 11.3515 21.8652 11.6381C21.9071 11.8661 21.9071 12.1339 21.8652 12.3619C21.8124 12.6485 21.6945 12.8811 21.6032 13.0611C21.5958 13.0758 21.5886 13.09 21.5815 13.104C19.6419 16.956 16.2802 20 12 20C7.7198 20 4.35818 16.956 2.41849 13.104C2.41148 13.09 2.40424 13.0758 2.39682 13.0611C2.3055 12.881 2.18759 12.6485 2.13485 12.3619C2.09291 12.1339 2.09291 11.8661 2.13485 11.6381C2.18759 11.3515 2.3055 11.119 2.39682 10.9389C2.40424 10.9242 2.41148 10.91 2.41849 10.896ZM12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12C14 10.8954 13.1046 10 12 10ZM8.00002 12C8.00002 9.79086 9.79088 8 12 8C14.2092 8 16 9.79086 16 12C16 14.2091 14.2092 16 12 16C9.79088 16 8.00002 14.2091 8.00002 12Z" fill="#0F1729"></path> </g></svg></a>
                            </td>
                            <td class="px-4 py-3 flex items-center justify-center space-x-4">
                                <!-- Editar -->
                                <button type="button" onclick="openEditModal(this)"
                                    data-noticia='@json($tutorial)'
                                    class="text-blue-600 font-bold hover:text-blue-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 3l3 3-8 8H3v-3l8-8z" />
                                    </svg>
                                </button>
                                <!-- Botón de Eliminar -->
                                <button onclick="openDeleteModal({{ $tutorial->id }}, '{{ $tutorial->titulo }}')"
                                    class="text-red-500 hover:text-red-700 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24"
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
            {{ $tutorials->links('pagination::tailwind') }}
        </div>
    </div>

    <!-- Modal Crear -->
    <div id="createModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 w-full h-full">
        <div class="flex items-center justify-center w-full h-full">
            <!-- Se aumentó el ancho máximo a max-w-5xl para que el modal sea más ancho -->
            <div class="bg-white px-8 py-6 rounded-lg shadow-xl max-w-6xl w-full relative max-h-screen overflow-y-auto">
                <!-- Título centrado -->
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-semibold text-blue-800">Subir Tutorial</h2>
                    <div class="mx-auto mt-2 w-1/5 h-1 bg-green-400"></div>
                </div>

                <!-- Formulario -->
                <form id="form" action="{{ route('tutorials.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-2 px-10">
                    @csrf

                    <!-- Contenedor principal con Grid (2 columnas en md+) -->
                    <div class="grid grid-cols-1  gap-2">
                        <!-- Columna Izquierda -->
                        <div class="space-y-4">
                            <!-- Título -->
                            <div>
                                <label for="titulo" class="block text-gray-700">Título</label>
                                <input type="text" id="titulo" name="titulo"
                                    class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>

                            <!-- Archivos (Drag & Drop) -->
                            <div>
                                <label class="block text-gray-700 mb-1">Archivos</label>
                                <div id="image-upload"
                                    class="border-2 border-dashed border-gray-300 w-full h-48 flex flex-col items-center justify-center cursor-pointer relative text-center rounded-md"
                                    onclick="document.getElementById('files').click()" ondragover="handleDragOver(event)"
                                    ondrop="handleDrop(event, 'files')">
                                    <!-- Placeholder -->
                                    <span id="image-placeholder" class="text-gray-500 flex flex-col items-center">
                                        <svg class="w-8 h-8 mb-4 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 20 16" aria-hidden="true">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        Selecciona o arrastra un archivo (mp4, pdf, rar)
                                    </span>
                                    <input type="file" name="files[]" id="files" class="hidden"
                                        accept="application/pdf, video/mp4, application/zip, application/x-rar-compressed"
                                        multiple required onchange="handleFileSelect(event)">
                                </div>
                            </div>
                            <!-- FILES CONTAINER -->
                            <div id="preview-files"
                                class="min-h-[200px] w-full  bg-slate-100 p-6 flex gap-3 justify-center flex-wrap">
                                <p id="no-files-message" class="text-gray-500 self-center">No hay archivos subidos</p>
                                <!-- File cards will be dynamically inserted here -->
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
            <!-- Se aumentó el ancho máximo a max-w-6xl para que el modal sea más ancho, igual que en el modal crear -->
            <div class="bg-white px-8 py-6 rounded-lg shadow-xl max-w-6xl w-full relative max-h-screen overflow-y-auto">
                <!-- Título centrado -->
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-semibold text-blue-800">Editar Tutorial</h2>
                    <div class="mx-auto mt-2 w-1/5 h-1 bg-green-400"></div>
                </div>

                <!-- Formulario -->
                <form id="editForm" action="" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Hidden field for tracking deletions -->
                    <div id="deleted-files-container"></div>


                    <!-- Contenedor principal con Grid (2 columnas en md+) -->
                    <div class="grid grid-cols-1  gap-6">
                        <!-- Columna Izquierda -->
                        <div class="space-y-4">
                            <!-- Título -->
                            <div>
                                <label for="edit_titulo" class="block text-gray-700">Título</label>
                                <input type="text" id="edit_titulo" name="edit_titulo"
                                    class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>
                            <!-- Imagen (Drag & Drop y selector) -->
                            <div>
                                <label class="block text-gray-700 mb-1">Imagen</label>
                                <div id="edit-image-upload"
                                    class="border-2 border-dashed border-gray-300 w-full h-48 flex items-center justify-center cursor-pointer relative text-center rounded-md overflow-hidden"
                                    ondragover="handleDragOver(event)" ondrop="handleDrop(event, 'edit_files')"
                                    onclick="document.getElementById('edit_files').click(); ">

                                    <!-- Placeholder -->
                                    <span id="edit-image-placeholder" class="text-gray-500 flex flex-col items-center">
                                        <svg class="w-8 h-8 mb-4 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 20 16" aria-hidden="true">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        Selecciona o arrastra un archivo (mp4, pdf, rar)
                                    </span>

                                    <input type="file" id="edit_files" name="edit_files[]" class="hidden"
                                        accept="application/pdf, video/mp4, application/zip, application/x-rar-compressed "
                                        onchange="handleEditFileSelect(event)" multiple>
                                </div>
                            </div>
                            <!-- FILES CONTAINER -->
                            <div id="edit-preview-files"
                                class="min-h-[200px] w-full  bg-slate-100 p-6 flex gap-3 justify-center flex-wrap relative">
                                <p id="edit-no-files-message"
                                    class="empty:hidden absolute inset-0 flex items-center justify-center text-gray-500">
                                    No hay archivos subidos
                                </p>
                                <!-- File cards will be dynamically inserted here -->
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
                <h2 class="text-xl font-bold mb-4">Eliminar Tutorial</h2>
                <p>¿Estás seguro de que deseas eliminar eltutorial "<span id="tutorialTitulo"></span>"?</p>

                <!-- Formulario de eliminación -->
                <form id="deleteForm" method="POST" action="{{ route('tutorials.destroy', '') }}" class="mt-4">
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
        // ====================  FUNCTIONES COMPARTIDAS  ====================

        
        function getFileIcon(fileType) {
            if (fileType.startsWith('image/')) {
                return `<svg class="w-16 h-16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 11C3 7.22876 3 5.34315 4.17157 4.17157C5.34315 3 7.22876 3 11 3H13C16.7712 3 18.6569 3 19.8284 4.17157C21 5.34315 21 7.22876 21 11V13C21 16.7712 21 18.6569 19.8284 19.8284C18.6569 21 16.7712 21 13 21H11C7.22876 21 5.34315 21 4.17157 19.8284C3 18.6569 3 16.7712 3 13V11Z" stroke="#222222"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M18.9976 14.2904L18.6544 13.9471L18.6385 13.9313C18.238 13.5307 17.9149 13.2077 17.6314 12.9687C17.3394 12.7226 17.055 12.5353 16.7221 12.4349C16.2512 12.2928 15.7488 12.2928 15.2779 12.4349C14.945 12.5353 14.6606 12.7226 14.3686 12.9687C14.0851 13.2077 13.762 13.5307 13.3615 13.9313L13.3456 13.9471C13.0459 14.2469 12.8458 14.4462 12.6832 14.5807C12.5218 14.7142 12.452 14.7359 12.4237 14.7408C12.3029 14.762 12.1785 14.7381 12.0742 14.6735C12.0498 14.6584 11.993 14.6123 11.8928 14.4285C11.7917 14.2432 11.68 13.9838 11.513 13.5942L11.4596 13.4696L11.4475 13.4414L11.4475 13.4414C11.0829 12.5907 10.7931 11.9144 10.5107 11.4126C10.2237 10.9026 9.90522 10.4984 9.44575 10.268C9.03426 10.0618 8.57382 9.97308 8.11515 10.0118C7.603 10.055 7.15716 10.3121 6.70134 10.6789C6.25273 11.04 5.73245 11.5603 5.07799 12.2148L5.07798 12.2148L5.05634 12.2364L5 12.2928V12.9999C5 13.2462 5.00007 13.4816 5.00044 13.7065L5.76344 12.9435C6.44443 12.2626 6.92686 11.7811 7.32835 11.458C7.72756 11.1366 7.98255 11.0265 8.19924 11.0082C8.47444 10.985 8.75071 10.0382 8.9976 11.162C9.192 11.2594 9.38786 11.4564 9.63918 11.903C9.89194 12.3521 10.1611 12.9783 10.5404 13.8635L10.5938 13.9881L10.6034 14.0105L10.6034 14.0105C10.7583 14.3719 10.8884 14.6754 11.0149 14.9073C11.1448 15.1455 11.3038 15.3727 11.5479 15.5238C11.8608 15.7175 12.2341 15.7894 12.5966 15.7258C12.8794 15.6761 13.1114 15.5242 13.3204 15.3513C13.524 15.183 13.7575 14.9495 14.0355 14.6714L14.0527 14.6542C14.4728 14.2341 14.766 13.9416 15.013 13.7334C15.2553 13.5292 15.4185 13.437 15.5667 13.3922C15.8493 13.307 16.1507 13.307 16.4333 13.3922C16.5815 13.437 16.7447 13.5292 16.987 13.7334C17.234 13.9416 17.5272 14.2341 17.9473 14.6542L18.9755 15.6825C18.9887 15.2721 18.9948 14.812 18.9976 14.2904Z" fill="#222222"></path><circle cx="16.5" cy="7.5" r="1.5" fill="#222222"></circle></svg>`;
            } else if (fileType === 'application/pdf') {
                return `<svg class="w-16 h-16" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><path d="M75.9466667,285.653333 C63.8764997,278.292415 49.6246897,275.351565 35.6266667,277.333333 L1.42108547e-14,277.333333 L1.42108547e-14,405.333333 L28.3733333,405.333333 L28.3733333,356.48 L40.5333333,356.48 C53.1304778,357.774244 65.7885986,354.68506 76.3733333,347.733333 C85.3576891,340.027178 90.3112817,328.626053 89.8133333,316.8 C90.4784904,304.790173 85.3164923,293.195531 75.9466667,285.653333 L75.9466667,285.653333 Z M53.12,332.373333 C47.7608867,334.732281 41.8687051,335.616108 36.0533333,334.933333 L27.7333333,334.933333 L27.7333333,298.666667 L36.0533333,298.666667 C42.094796,298.02451 48.1897668,299.213772 53.5466667,302.08 C58.5355805,305.554646 61.3626692,311.370371 61.0133333,317.44 C61.6596233,323.558965 58.5400493,329.460862 53.12,332.373333 L53.12,332.373333 Z M150.826667,277.333333 L115.413333,277.333333 L115.413333,405.333333 L149.333333,405.333333 C166.620091,407.02483 184.027709,403.691457 199.466667,395.733333 C216.454713,383.072462 225.530463,362.408923 223.36,341.333333 C224.631644,323.277677 218.198313,305.527884 205.653333,292.48 C190.157107,280.265923 170.395302,274.806436 150.826667,277.333333 L150.826667,277.333333 Z M178.986667,376.32 C170.098963,381.315719 159.922142,383.54422 149.76,382.72 L144.213333,382.72 L144.213333,299.946667 L149.333333,299.946667 C167.253333,299.946667 174.293333,301.653333 181.333333,308.053333 C189.877212,316.948755 194.28973,329.025119 193.493333,341.333333 C194.590843,354.653818 189.18793,367.684372 178.986667,376.32 L178.986667,376.32 Z M254.506667,405.333333 L283.306667,405.333333 L283.306667,351.786667 L341.333333,351.786667 L341.333333,329.173333 L283.306667,329.173333 L283.306667,299.946667 L341.333333,299.946667 L341.333333,277.333333 L254.506667,277.333333 L254.506667,405.333333 L254.506667,405.333333 Z M234.666667,7.10542736e-15 L9.52127266e-13,7.10542736e-15 L9.52127266e-13,234.666667 L42.6666667,234.666667 L42.6666667,192 L42.6666667,169.6 L42.6666667,42.6666667 L216.96,42.6666667 L298.666667,124.373333 L298.666667,169.6 L298.666667,192 L298.666667,234.666667 L341.333333,234.666667 L341.333333,106.666667 L234.666667,7.10542736e-15 L234.666667,7.10542736e-15 Z" id="document-pdf"> </path></svg>`;
            } else if (fileType.startsWith('video/')) {
                return `<svg class="w-16 h-16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M16 8C16 6.34315 14.6569 5 13 5H4C2.34315 5 1 6.34315 1 8V16C1 17.6569 2.34315 19 4 19H13C14.6569 19 16 17.6569 16 16V13.9432L21.4188 17.8137C21.7236 18.0315 22.1245 18.0606 22.4576 17.8892C22.7907 17.7178 23 17.3746 23 17V7C23 6.62541 22.7907 6.28224 22.4576 6.11083C22.1245 5.93943 21.7236 5.96854 21.4188 6.18627L16 10.0568V8ZM16.7205 12L21 8.94319V15.0568L16.7205 12ZM13 7C13.5523 7 14 7.44772 14 8V12V16C14 16.5523 13.5523 17 13 17H4C3.44772 17 3 16.5523 3 16V8C3 7.44772 3.44772 7 4 7H13Z" fill="#000000"></path></svg>`;
            } else if (fileType.startsWith('application/x-rar-compressed')) {
                return `<svg class="w-16 h-16" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#000000;} </style> <g> <path class="st0" d="M378.412,0H208.298h-13.183l-9.314,9.314L57.02,138.102l-9.315,9.314v13.176v265.514 c0,47.36,38.528,85.895,85.896,85.895h244.811c47.354,0,85.882-38.535,85.882-85.895V85.895C464.294,38.528,425.766,0,378.412,0z M432.497,426.105c0,29.877-24.214,54.091-54.084,54.091H133.601c-29.884,0-54.098-24.214-54.098-54.091V160.591h83.717 c24.885,0,45.078-20.179,45.078-45.07V31.804h170.115c29.87,0,54.084,24.214,54.084,54.091V426.105z"></path> <path class="st0" d="M197.349,281.44c0-16.841-12.498-28.656-31.518-28.656h-29.339c-5.432,0-8.686,3.534-8.686,8.826v73.754 c0,6.388,4.203,10.599,10.04,10.599c5.851,0,9.915-4.21,9.915-10.599v-24.585c0-0.538,0.279-0.81,0.824-0.81h13.574l15.486,29.744 c2.318,4.344,5.711,6.25,9.789,6.25c5.976,0,9.496-4.35,9.496-9.51c0-1.899-0.405-3.805-1.354-5.572l-13.448-24.445 C191.638,301.681,197.349,292.716,197.349,281.44z M164.882,292.988h-16.296c-0.545,0-0.824-0.272-0.824-0.817v-21.324 c0-0.545,0.279-0.816,0.824-0.816h16.296c7.611,0,12.499,4.482,12.499,11.548C177.38,288.506,172.493,292.988,164.882,292.988z"></path> <path class="st0" d="M264.183,263.649c-2.583-7.331-6.786-11.681-13.853-11.681c-7.066,0-11.144,4.35-13.727,11.681l-24.983,69.138 c-0.405,1.082-0.684,2.444-0.684,3.798c0,5.705,4.622,9.378,9.65,9.378c4.343,0,7.876-2.584,9.37-7.066l3.658-11.27h33.012 l3.798,11.27c1.494,4.482,5.028,7.066,9.37,7.066c5.027,0,9.649-3.673,9.649-9.378c0-1.354-0.265-2.716-0.684-3.798 L264.183,263.649z M239.326,310.646l10.724-32.328h0.419l10.585,32.328H239.326z"></path> <path class="st0" d="M375.033,281.44c0-16.841-12.498-28.656-31.518-28.656h-29.34c-5.432,0-8.686,3.534-8.686,8.826v73.754 c0,6.388,4.203,10.599,10.04,10.599c5.851,0,9.915-4.21,9.915-10.599v-24.585c0-0.538,0.279-0.81,0.824-0.81h13.573l15.487,29.744 c2.318,4.344,5.712,6.25,9.789,6.25c5.977,0,9.496-4.35,9.496-9.51c0-1.899-0.405-3.805-1.355-5.572l-13.447-24.445 C369.322,301.681,375.033,292.716,375.033,281.44z M342.566,292.988h-16.297c-0.545,0-0.824-0.272-0.824-0.817v-21.324 c0-0.545,0.279-0.816,0.824-0.816h16.297c7.61,0,12.498,4.482,12.498,11.548C355.064,288.506,350.176,292.988,342.566,292.988z"></path> </g> </g></svg>`;
            } else if (fileType.startsWith('application/zip')) {
                return `<svg class="w-16 h-16" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#000000;} </style> <g> <path class="st0" d="M378.412,0H208.298h-13.183l-9.314,9.314L57.02,138.102l-9.315,9.314v13.176v265.514 c0,47.36,38.528,85.895,85.896,85.895h244.811c47.354,0,85.882-38.535,85.882-85.895V85.895C464.294,38.528,425.766,0,378.412,0z M432.497,426.105c0,29.877-24.214,54.091-54.084,54.091H133.601c-29.884,0-54.098-24.214-54.098-54.091V160.591h83.717 c24.885,0,45.078-20.179,45.078-45.07V31.804h170.115c29.87,0,54.084,24.214,54.084,54.091V426.105z"></path> <path class="st0" d="M197.349,281.44c0-16.841-12.498-28.656-31.518-28.656h-29.339c-5.432,0-8.686,3.534-8.686,8.826v73.754 c0,6.388,4.203,10.599,10.04,10.599c5.851,0,9.915-4.21,9.915-10.599v-24.585c0-0.538,0.279-0.81,0.824-0.81h13.574l15.486,29.744 c2.318,4.344,5.711,6.25,9.789,6.25c5.976,0,9.496-4.35,9.496-9.51c0-1.899-0.405-3.805-1.354-5.572l-13.448-24.445 C191.638,301.681,197.349,292.716,197.349,281.44z M164.882,292.988h-16.296c-0.545,0-0.824-0.272-0.824-0.817v-21.324 c0-0.545,0.279-0.816,0.824-0.816h16.296c7.611,0,12.499,4.482,12.499,11.548C177.38,288.506,172.493,292.988,164.882,292.988z"></path> <path class="st0" d="M264.183,263.649c-2.583-7.331-6.786-11.681-13.853-11.681c-7.066,0-11.144,4.35-13.727,11.681l-24.983,69.138 c-0.405,1.082-0.684,2.444-0.684,3.798c0,5.705,4.622,9.378,9.65,9.378c4.343,0,7.876-2.584,9.37-7.066l3.658-11.27h33.012 l3.798,11.27c1.494,4.482,5.028,7.066,9.37,7.066c5.027,0,9.649-3.673,9.649-9.378c0-1.354-0.265-2.716-0.684-3.798 L264.183,263.649z M239.326,310.646l10.724-32.328h0.419l10.585,32.328H239.326z"></path> <path class="st0" d="M375.033,281.44c0-16.841-12.498-28.656-31.518-28.656h-29.34c-5.432,0-8.686,3.534-8.686,8.826v73.754 c0,6.388,4.203,10.599,10.04,10.599c5.851,0,9.915-4.21,9.915-10.599v-24.585c0-0.538,0.279-0.81,0.824-0.81h13.573l15.487,29.744 c2.318,4.344,5.712,6.25,9.789,6.25c5.977,0,9.496-4.35,9.496-9.51c0-1.899-0.405-3.805-1.355-5.572l-13.447-24.445 C369.322,301.681,375.033,292.716,375.033,281.44z M342.566,292.988h-16.297c-0.545,0-0.824-0.272-0.824-0.817v-21.324 c0-0.545,0.279-0.816,0.824-0.816h16.297c7.61,0,12.498,4.482,12.498,11.548C355.064,288.506,350.176,292.988,342.566,292.988z"></path> </g> </g></svg>`;
            } else {
                return `<svg class="w-16 h-16" fill="#000000" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="796 796 200 200" enable-background="new 796 796 200 200" xml:space="preserve"><path d="M971.176,836.653H943.83v-27.346c0-7.338-5.971-13.307-13.309-13.307h-65.127c-3.553,0-6.896,1.384-9.408,3.898 l-44.574,44.572c-2.513,2.512-3.897,5.854-3.897,9.412v88.157c0,7.337,5.969,13.308,13.307,13.308h27.346v27.345 c0,7.339,5.972,13.309,13.31,13.309h109.697c7.339,0,13.309-5.97,13.309-13.309v-132.73 C984.484,842.624,978.516,836.653,971.176,836.653z M820.823,943.467c-0.787,0-1.426-0.642-1.426-1.428v-85.611 c0-1.643,1.332-2.975,2.975-2.975h32.637c5.675,0,10.275-4.601,10.275-10.274v-32.324c0-1.643,1.332-2.975,2.975-2.975h62.264 c0.787,0,1.43,0.641,1.43,1.428v27.347h-25.9c-3.553,0-6.893,1.383-9.409,3.898l-44.579,44.577 c-2.511,2.515-3.893,5.854-3.893,9.405v48.932H820.823L820.823,943.467z M972.605,982.691c0,0.788-0.641,1.428-1.428,1.428H861.479 c-0.788,0-1.43-0.64-1.43-1.428v-85.61c0-1.643,1.332-2.975,2.975-2.975h32.639c5.674,0,10.275-4.601,10.275-10.273v-32.325 c0-1.643,1.331-2.975,2.975-2.975h62.265c0.787,0,1.428,0.642,1.428,1.429V982.691L972.605,982.691z"></path></svg>`;
            }
        }

        
        function handleDragOver(event) {
            event.preventDefault();
            event.stopPropagation();
            event.currentTarget.classList.add('border-blue-500');
        }

        function handleDragLeave(event) {
            event.preventDefault();
            event.stopPropagation();
            event.currentTarget.classList.remove('border-blue-500');
        }

        // ==================== CREATE FORM FUNCTIONS ====================

        let createFiles = [];

        function handleFileSelect(event) {
            const newFiles = Array.from(event.target.files);
            //const previewContainer = document.getElementById('preview-files');
            const noFilesMsg = document.getElementById('no-files-message');
            const fileInput = document.getElementById('files');
            const dropZone = document.getElementById('image-upload');

            const remainingSlots = 5 - createFiles.length;

            
            if (remainingSlots <= 0) {
                updateFileInputUI(true); 
                event.target.value = '';
                return;
            }
            console.log("new", newFiles)
            console.log("create", createFiles)

            let filesAdded = 0;
            newFiles.forEach(newFile => {
                if (filesAdded >= remainingSlots) return;

                const exists = createFiles.some(file =>
                    file.name === newFile.name &&
                    file.size === newFile.size &&
                    file.lastModified === newFile.lastModified
                );

                if (!exists) {
                    createFiles.push(newFile);
                    filesAdded++;
                }
            });

            updateFileInputUI(createFiles.length >= 5);

            renderCreatePreviews();
            updateCreateFileInput();


        }

        function updateFileInputUI(isMaxReached) {
            const fileInput = document.getElementById('files');
            const dropZone = document.getElementById('image-upload');
            const submitBtn = document.querySelector('#form button[type="submit"]');

            if (isMaxReached) {
                fileInput.disabled = true;
                dropZone.classList.add('border-red-500', 'cursor-not-allowed');
                dropZone.classList.remove('border-blue-500', 'cursor-pointer');
            } else {
                fileInput.disabled = false;
                dropZone.classList.remove('border-red-500', 'cursor-not-allowed');
                dropZone.classList.add('border-blue-500', 'cursor-pointer');
            }

            // Habilita/desabilita boton submit basado en la cantidad de arhivos 0
            submitBtn.disabled = createFiles.length === 0;
        }

        function updateCreateFileInput() {
            const filesInput = document.getElementById('files');
            const dataTransfer = new DataTransfer();
            createFiles.forEach(file => dataTransfer.items.add(file));
            filesInput.files = dataTransfer.files;
        }


        function renderCreatePreviews() {
            const previewContainer = document.getElementById('preview-files');
            const noFilesMsg = document.getElementById('no-files-message');

            previewContainer.innerHTML = '';

            if (createFiles.length === 0) {
                if (noFilesMsg) noFilesMsg.style.display = 'block';
                return;
            }

            if (noFilesMsg) noFilesMsg.style.display = 'none';

            createFiles.forEach(file => {
                const fileCard = createFileCard(file, 'create');
                previewContainer.appendChild(fileCard);
            });
        }

        function createFileCard(file, formType) {
            const fileCard = document.createElement('div');
            fileCard.className =
                'file-card bg-white rounded-lg flex flex-col items-center justify-center relative shadow-lg p-2 h-28 w-24 sm:h-32 sm:w-28 md:h-36 md:w-32';

            const fileIcon = document.createElement('div');
            fileIcon.innerHTML = getFileIcon(file.type);
            fileCard.appendChild(fileIcon);

            const fileName = document.createElement('p');
            fileName.className = 'font-semibold text-xs my-1 truncate w-full text-center';
            fileName.textContent = file.name;
            fileCard.appendChild(fileName);

            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.className =
                'absolute top-2 right-2 bg-red-500 text-white p-1 rounded-full hover:bg-red-600 transition cursor-pointer';
            removeButton.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V5a2 2 0 00-2-2H9a2 2 0 00-2 2v2m3 0h4" />
                </svg>
            `;
            removeButton.onclick = () => removeCreateFile(file);
            fileCard.appendChild(removeButton);

            return fileCard;
        }

        function removeCreateFile(fileToRemove) {
            createFiles = createFiles.filter(file =>
                file.name !== fileToRemove.name ||
                file.size !== fileToRemove.size ||
                file.lastModified !== fileToRemove.lastModified
            );

            updateFileInputUI(createFiles.length >= 5);
            renderCreatePreviews();
            updateCreateFileInput();
        }

        function updateCreateFileInput() {
            const filesInput = document.getElementById('files');
            const dataTransfer = new DataTransfer();
            createFiles.forEach(file => dataTransfer.items.add(file));
            filesInput.files = dataTransfer.files;
        }

        function handleCreateDrop(event) {
            event.preventDefault();
            event.stopPropagation();
            document.getElementById('image-upload').classList.remove('border-blue-500');

            const inputElement = document.getElementById('files');
            if (event.dataTransfer.files && event.dataTransfer.files.length > 0) {
                inputElement.files = event.dataTransfer.files;
                handleFileSelect({
                    target: inputElement
                });
            }
        }

        // ==================== EDIT FORM FUNCTIONS ====================

        let editFiles = [];
        let existingFiles = [];

        function openEditModal(button) {
            const tutorial = JSON.parse(button.getAttribute('data-noticia'));

          // Cargar valores
            document.getElementById('edit_titulo').value = tutorial.titulo;
            document.getElementById('editForm').action = `/admin/tutoriales/${tutorial.id}`;

            // Borrar previos
            editFiles = [];
            existingFiles = [];

            if (tutorial.file_paths && tutorial.file_paths.length > 0) {
                existingFiles = tutorial.file_paths.map(filePath => {
                    const fileName = filePath.split('/').pop();
                    const fileType = getFileTypeFromName(fileName);

                    return {
                        name: fileName,
                        type: fileType,
                        size: 0,
                        lastModified: Date.now(),
                        isExisting: true,
                        path: filePath
                    };
                });

                editFiles = [...existingFiles];
                renderEditPreviews();
            } else {
                const edit = document.getElementById('edit-no-files-message');
                if (edit) edit.style.display = 'flex';
            }

            document.getElementById('editModal').classList.remove('hidden');
        }

        function getFileTypeFromName(filename) {
            const extension = filename.split('.').pop().toLowerCase();
            switch (extension) {
                case 'pdf':
                    return 'application/pdf';
                case 'mp4':
                    return 'video/mp4';
                case 'zip':
                    return 'application/zip';
                case 'rar':
                    return 'application/x-rar-compressed';
                default:
                    return 'application/octet-stream';
            }
        }

        function renderEditPreviews() {
            const previewContainer = document.getElementById('edit-preview-files');
            const noFilesMsg = document.getElementById('edit-no-files-message');

            previewContainer.innerHTML = '';

            if (editFiles.length === 0) {
                if (noFilesMsg) noFilesMsg.style.display = 'flex';
                if (previewContainer) previewContainer.appendChild(noFilesMsg);
                return;
            }

            if (noFilesMsg) noFilesMsg.style.display = 'none';

            editFiles.forEach(file => {
                const fileCard = createEditFileCard(file);
                previewContainer.appendChild(fileCard);
            });
        }

        function createEditFileCard(file) {
            const fileCard = document.createElement('div');
            fileCard.className =
                'file-card bg-white rounded-lg flex flex-col items-center justify-center relative shadow-lg p-2 h-28 w-24 sm:h-32 sm:w-28 md:h-36 md:w-32';

            const fileIcon = document.createElement('div');
            fileIcon.innerHTML = getFileIcon(file.type);
            fileCard.appendChild(fileIcon);

            const fileName = document.createElement('p');
            fileName.className = 'font-semibold text-xs my-1 truncate w-full text-center';
            fileName.textContent = file.name;
            fileCard.appendChild(fileName);

            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.className =
                'absolute top-2 right-2 bg-red-500 text-white p-1 rounded-full hover:bg-red-600 transition cursor-pointer';
            removeButton.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V5a2 2 0 00-2-2H9a2 2 0 00-2 2v2m3 0h4" />
                </svg>
            `;
            removeButton.onclick = () => removeEditFile(file);
            fileCard.appendChild(removeButton);

            return fileCard;
        }

        function removeEditFile(fileToRemove) {
            editFiles = editFiles.filter(file =>
                file.name !== fileToRemove.name ||
                (file.path && fileToRemove.path && file.path !== fileToRemove.path)
            );
            setEditMaxFilesUI((existingFiles.length + editFiles.filter(f => !f.isExisting).length) >= 5);
            renderEditPreviews();
            updateEditFileInput();
        }

        function handleEditFileSelect(event) {
            const newFiles = Array.from(event.target.files);
            const dropZone = document.getElementById('edit-image-upload');

            const currentNewFiles = editFiles.filter(f => !f.isExisting).length;
            const remainingSlots = 5 - existingFiles.length - currentNewFiles;

            if (remainingSlots <= 0) {
                setEditMaxFilesUI(true);
                event.target.value = '';
                return;
            }
            console.log("edit", editFiles)
            console.log("new", newFiles)

            // Agregar solo cuando hay espacio
            let filesAdded = 0;
            newFiles.forEach(newFile => {
                if (filesAdded >= remainingSlots) return;

                if (!editFiles.some(f =>
                        f.name === newFile.name &&
                        f.size === newFile.size &&
                        f.lastModified === newFile.lastModified
                    )) {
                    editFiles.push(newFile);
                    filesAdded++;
                }
            });

            setEditMaxFilesUI((existingFiles.length + editFiles.filter(f => !f.isExisting).length) >= 5);
            renderEditPreviews();
            updateEditFileInput();
        }

        function setEditMaxFilesUI(isMaxReached) {
            const dropZone = document.getElementById('edit-image-upload');

            if (isMaxReached) {
                dropZone.classList.add('border-red-500', 'cursor-not-allowed');
                dropZone.classList.remove('border-blue-500', 'cursor-pointer');
            } else {
                dropZone.classList.remove('border-red-500', 'cursor-not-allowed');
                dropZone.classList.add('border-blue-500', 'cursor-pointer');
            }
        }

        function updateEditFileInput() {
            const filesInput = document.getElementById('edit_files');
            const dataTransfer = new DataTransfer();

            editFiles
                .filter(file => !file.isExisting)
                .forEach(file => {
                    if (file instanceof File) {
                        dataTransfer.items.add(file);
                    }
                });

            filesInput.files = dataTransfer.files;
        }

        function handleEditDrop(event) {
            event.preventDefault();
            event.stopPropagation();
            document.getElementById('edit-image-upload').classList.remove('border-blue-500');

            const inputElement = document.getElementById('edit_files');
            if (event.dataTransfer.files && event.dataTransfer.files.length > 0) {
                inputElement.files = event.dataTransfer.files;
                handleEditFileSelect({
                    target: inputElement
                });
            }
        }

        // ==================== FORM SUBMISSION ====================

        document.getElementById('form').addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');

            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Subiendo...';

            // Desabilitar archivos input al subir
            document.getElementById('files').disabled = false;

 
            if (createFiles.length === 0) {
                e.preventDefault();
                alert('Please select at least one file.');
                submitBtn.disabled = false;
                submitBtn.innerHTML = 'Guardar';
                document.getElementById('files').disabled = false;
                return;
            }

        });

        document.getElementById('editForm').addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');

            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Actualizando...';

           
            updateEditFileInput();

            // Archivos a eliminar
            const filesToDelete = existingFiles.filter(existingFile =>
                !editFiles.some(file => file.path === existingFile.path)
            );

            filesToDelete.forEach(file => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'files_to_delete[]';
                input.value = file.path;
                this.appendChild(input);
            });
        });

        // ==================== INITIALIZATION ====================

        document.addEventListener('DOMContentLoaded', function() {
            // Create form events
            const createDropArea = document.getElementById('image-upload');
            createDropArea.addEventListener('dragover', handleDragOver);
            createDropArea.addEventListener('drop', handleCreateDrop);
            createDropArea.addEventListener('dragleave', handleDragLeave);

            document.getElementById('files').addEventListener('change', handleFileSelect);

            // Edit form events
            const editDropArea = document.getElementById('edit-image-upload');
            editDropArea.addEventListener('dragover', handleDragOver);
            editDropArea.addEventListener('drop', handleEditDrop);
            editDropArea.addEventListener('dragleave', handleDragLeave);

            document.getElementById('edit_files').addEventListener('change', handleEditFileSelect);
        });

        // ==================== MODAL CONTROLS ====================

        function openCreateModal() {
            document.getElementById('createModal').classList.remove('hidden');
        }

        function closeCreateModal() {
            document.getElementById('createModal').classList.add('hidden');
            document.getElementById('form').reset();
            createFiles = [];
            updateFileInputUI(false);
            renderCreatePreviews();

            // Resetear boton submit 
            const submitBtn = document.querySelector('#form button[type="submit"]');
            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Guardar';
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('editForm').reset();
            editFiles = [];
            existingFiles = [];
            renderEditPreviews();

            // Resetear boton submit 
            const submitBtn = document.querySelector('#editForm button[type="submit"]');
            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Actualizar';

            // Resetear  visuals
            const dropZone = document.getElementById('edit-image-upload');
            dropZone.classList.remove('opacity-50', 'pointer-events-none', 'border-red-500', 'cursor-not-allowed');
            dropZone.classList.add('border-blue-500', 'cursor-pointer');
        }

        function openDeleteModal(id, titulo) {
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('tutorialTitulo').innerText = titulo;
            const form = document.getElementById('deleteForm');
            form.action = "{{ route('tutorials.destroy', '') }}/" + id;
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
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
