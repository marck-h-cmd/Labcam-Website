@extends('administrador.dashboard.plantilla')
@section('title', 'Capital Humano')
@section('contenido')
    <div class="main-title flex flex-col items-center gap-3 mb-8">
        <div class="title text-2xl font-semibold text-[#2e5382]">Capital Humano</div>
        <div class="blue-line w-1/5 h-0.5 bg-[#64d423]"></div>
    </div>
    <!-- Menú -->
    <div
        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 bg-gray-200 mx-4 sm:mx-6 md:mx-8 lg:mx-14 mb-6 gap-4">
        <div id="menu-investigadores" class="cursor-pointer">
            <a href="{{ route('capital_index', ['role' => 'Investigadores', 'buscarpor' => $buscarpor]) }}"
                class="flex justify-center py-4 px-4 w-full h-full font-medium rounded-md {{ $role == 'Investigadores' ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-600 hover:text-white' }}">
                <span class="text-sm">Investigadores</span>
            </a>
        </div>
        <div id="menu-egresados" class="cursor-pointer">
            <a href="{{ route('capital_index', ['role' => 'Egresados', 'buscarpor' => $buscarpor]) }}"
                class="flex justify-center py-4 px-4 w-full h-full font-medium rounded-md {{ $role == 'Egresados' ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-600 hover:text-white' }}">
                <span class="text-sm">Egresados</span>
            </a>
        </div>
        <div id="menu-tesistas" class="cursor-pointer">
            <a href="{{ route('capital_index', ['role' => 'Tesistas', 'buscarpor' => $buscarpor]) }}"
                class="flex justify-center py-4 px-4 w-full h-full font-medium rounded-md {{ $role == 'Tesistas' ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-600 hover:text-white' }}">
                <span class="text-sm">Tesistas</span>
            </a>
        </div>
        <div id="menu-pasantes" class="cursor-pointer">
            <a href="{{ route('capital_index', ['role' => 'Pasantes', 'buscarpor' => $buscarpor]) }}"
                class="flex justify-center py-4 px-4 w-full h-full font-medium rounded-md {{ $role == 'Pasantes' ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-600 hover:text-white' }}">
                <span class="text-sm">Pasantes</span>
            </a>
        </div>
        <div id="menu-aliados" class="cursor-pointer">
            <a href="{{ route('capital_index', ['role' => 'Aliados', 'buscarpor' => $buscarpor]) }}"
                class="flex justify-center py-4 px-4 w-full h-full font-medium rounded-md {{ $role == 'Aliados' ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-600 hover:text-white' }}">
                <span class="text-sm">Aliados</span>
            </a>
        </div>
    </div>



    {{-- -----------TABLA------- --}}
    <div class="p-2">
        <div class="max-w-[1200px] mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <!-- Botón Crear Nuevo -->
                        <form action="{{ route('capitales.store') }}" method="POST" id="form1">
                            @csrf
                            <button type="button"
                                class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-700 w-full sm:w-auto"
                                onclick="openCreateModal()">
                                + Nuevo
                            </button>
                        </form>
                        <form class="flex items-center max-w-lg" method="GET">
                            <label for="default-search"
                                class="mb-2 text-sm font-medium text-gray-400 sr-only dark:text-white">Search</label>
                            <div class="relative w-full max-w-xs">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-700 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="search" id="default-search" name="buscarpor" value="{{ $buscarpor }}"
                                    class="block w-full p-4 pl-10 text-sm border border-gray-300 rounded-lg bg-gray-500 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-200 dark:placeholder-gray-400 dark:text-black"
                                    placeholder="Nombre..." />
                            </div>
                        </form>
                    </div>

                    <div class="flow-root">
                        <div class="mt-10 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="w-full divide-y divide-gray-300">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Nombres Y Apellidos
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Grado Académico
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Área de Investigación
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Correo
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
                                        @foreach ($capitales as $capital)
                                            <tr data-role="{{ $capital->rol }}" class="even:bg-gray-50">
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $capital->nombre }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $capital->carrera }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $capital->areaInvestigacion->nombre }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $capital->correo }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    <a href="/user/template/uploads/pdfs/{{ $capital->cv }}"
                                                        target="_blank"><img width="40" height="40"
                                                            src="https://img.icons8.com/ultraviolet/40/documents.png"
                                                            alt="documents" /></a>
                                                </td>
                                                <td
                                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                    <form action="{{ route('capitales.destroy', $capital->id) }}"
                                                        method="POST" class="flex items-center space-x-2 ">
                                                        <button type="button" onclick="openEditModal(this)"
                                                            data-capital='@json($capital)'
                                                            class="text-blue-600 font-bold hover:text-blue-900">
                                                            <img width="40" height="40"
                                                                src="https://img.icons8.com/stickers/50/multi-edit.png"
                                                                alt="multi-edit" />
                                                        </button>
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('capitales.destroy', $capital->id) }}"
                                                            class="text-red-600 font-bold hover:text-red-900"
                                                            onclick="event.preventDefault(); 
                                                    Swal.fire({
                                                        title: '¿Estás seguro?',
                                                        text: 'No será posible revertir los cambios!',
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33',
                                                        confirmButtonText: 'Eliminar'
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            this.closest('form').submit();
                                                        }
                                                    });">
                                                            <img width="40" height="40"
                                                                src="https://img.icons8.com/stickers/50/delete-trash.png"
                                                                alt="delete-trash" />
                                                        </a>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-4 px-4">
                                    {{ $capitales->appends(request()->all())->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- --------------------Modal de create------------------------ --}}
    <div id="createModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 w-full h-full">
        <div class="flex items-center justify-center w-full h-full">
            <div class="bg-white px-8 py-6 rounded-lg shadow-xl max-w-4xl w-full relative max-h-screen overflow-y-auto">
                <!-- Título centrado -->
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-semibold text-blue-800">Nuevo Registro</h2>
                    <div class="mx-auto mt-2 w-1/5 h-1 bg-green-400"></div>
                </div>

                <!-- Formulario -->
                <form id="form" action="{{ route('capitales.store') }}" method="POST"
                    enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('POST')

                    <!-- Contenedor principal con Grid (2 columnas en md+) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Columna Izquierda -->
                        <div class="space-y-4">
                            <div>
                                <label for="nombres" class="block text-gray-700">Nombres y Apellidos:</label>
                                <input type="text" id="nombres" name="nombres"
                                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>
                            <div>
                                <label for="area_investigacion" class="block text-gray-700">Área de Investigación:</label>
                                <select id="area_investigacion" name="area_investigacion"
                                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                                    <option value="">Seleccione un área</option>
                                    @foreach ($areasInvestigacion as $area)
                                        <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="correo" class="block text-gray-700">Correo:</label>
                                <input type="email" id="correo" name="correo"
                                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>
                            <div>
                                <label for="carrera" class="block text-gray-700">Grado Académico:</label>
                                <input type="text" id="carrera" name="carrera"
                                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>
                            <div>
                                <label for="rol" class="block text-gray-700">Rol:</label>
                                <input type="text" id="rol" name="rol" value="{{ $role }}"
                                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100" readonly>
                            </div>
                        </div>

                        <!-- Columna Derecha -->
                        <div class="space-y-4">
                            <!-- Imagen Upload -->
                            <div>
                                <label class="block text-gray-700 mb-1">Imagen de Perfil:</label>
                                <div id="image-upload"
                                    class="border-2 border-dashed border-gray-300 w-full h-52
                                            flex flex-col items-center justify-center cursor-pointer relative text-center rounded-md"
                                    onclick="document.getElementById('imagen').click()" ondragover="handleDragOver(event)"
                                    ondrop="handleDrop(event, 'imagen')">
                                    <!-- Placeholder (solo se ve si no hay imagen) -->
                                    <span id="image-placeholder" class="text-gray-500 flex flex-col items-center">
                                        <svg class="w-8 h-8 mb-4 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 20 16" aria-hidden="true">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        Selecciona o arrastra una imagen (png, jpeg, jpg, gif)
                                    </span>
                                    <!-- Vista previa -->
                                    <img id="previewImage" src="" alt="Vista previa"
                                        class="hidden w-52 h-full object-cover rounded shadow mx-auto">
                                    <!-- Botón eliminar imagen -->
                                    <button type="button" id="remove-image"
                                        class="hidden absolute top-2 right-2 bg-red-500 text-white p-1 rounded-full hover:bg-red-600 transition cursor-pointer"
                                        onclick="removeImage(event)">
                                        <!-- Icono papelera -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0
                                                                                                                                                                                     0116.138 21H7.862a2 2 0
                                                                                                                                                                                     01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V5a2 2
                                                                                                                                                                                     0 00-2-2H9a2 2 0 00-2 2v2m3 0h4" />
                                        </svg>
                                    </button>
                                    <input type="file" id="imagen" name="imagen" class="hidden"
                                        accept="image/png, image/jpeg, image/jpg, image/gif"
                                        onchange="mostrarVistaPrevia(event)">
                                </div>
                            </div>

                            <!-- CV Upload -->
                            <div>
                                <label class="block text-gray-700 mb-1">CV:</label>
                                <div id="cv-upload"
                                    class="border-2 border-dashed border-gray-300 w-full h-11
                                            flex flex-col items-center justify-center cursor-pointer relative text-center rounded-md"
                                    onclick="document.getElementById('cv').click()" ondragover="handleDragOver(event)"
                                    ondrop="handleDrop(event, 'cv')">
                                    <!-- Placeholder CV -->
                                    <span id="cv-placeholder" class="text-gray-500">
                                        Selecciona o arrastra un archivo PDF
                                    </span>
                                    <!-- Nombre de archivo CV -->
                                    <div id="cv-file-info" class="hidden text-sm"></div>
                                    <!-- Botón eliminar CV -->
                                    <button type="button" id="remove-cv"
                                        class="hidden absolute top-1 right-2 bg-red-500 text-white p-1 
                                                   rounded-full hover:bg-red-600 transition cursor-pointer"
                                        onclick="removeCV(event)">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0
                                                                                                                                                                                     0116.138 21H7.862a2 2 0
                                                                                                                                                                                     01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V5a2 2
                                                                                                                                                                                     0 00-2-2H9a2 2 0 00-2 2v2m3 0h4" />
                                        </svg>
                                    </button>
                                    <input type="file" id="cv" name="cv" class="hidden"
                                        accept="application/pdf" onchange="mostrarCV(event)">
                                </div>
                            </div>

                            <!-- LinkedIn -->
                            <div>
                                <label for="linkedin" class="block text-gray-700">LinkedIn:</label>
                                <input type="text" id="linkedin" name="linkedin"
                                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md 
                                              focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>
                        </div>

                        <!-- Fila para Tipo de Tesista y Cti Vitae -->
                        <!-- Ocupa 2 columnas en md+ (para que estén en la misma fila) -->
                        <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-4 items-start">
                            <!-- Campo Tipo de Tesista (oculto por defecto) -->
                            <div class="hidden" id="tesistasTypeField">
                                <label for="tesistas_type" class="block text-gray-700">Tipo de Tesista:</label>
                                <select id="tesistas_type" name="tesistas_type"
                                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md 
                                               focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Seleccione un tipo</option>
                                    <option value="Pregrado">Pregrado</option>
                                    <option value="Posgrado">Posgrado</option>
                                </select>
                            </div>

                            <!-- Campo Cti Vitae (por defecto col-span-2, si Tesistas oculto) -->
                            <div class="md:col-span-2" id="ctiVitaeContainer">
                                <label for="ctivitae" class="block text-gray-700">Cti Vitae:</label>
                                <input type="text" id="ctivitae" name="ctivitae"
                                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md 
                                              focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>
                        </div>
                    </div>

                    <!-- Botones de acción -->
                    <div class="flex justify-center gap-4 mt-6">
                        <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-700">
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

    @if (session('create_success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Registro exitoso',
                text: '{{ session('create_success') }}',
                showConfirmButton: true,
                confirmButtonText: 'Aceptar',
                customClass: {
                    confirmButton: 'bg-green-500 text-white hover:bg-green-600 focus:ring-2 focus:ring-green-300 rounded-lg py-2 px-4'
                }
            });
        </script>
    @endif

    @if (session('delete_success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Eliminación exitosa',
                text: '{{ session('delete_success') }}',
                showConfirmButton: true,
                confirmButtonText: 'Aceptar',
                customClass: {
                    confirmButton: 'bg-green-500 text-white hover:bg-green-600 focus:ring-2 focus:ring-green-300 rounded-lg py-2 px-4'
                }
            });
        </script>
    @endif


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

                    <!-- Contenedor principal con Grid (2 columnas en md+) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Columna Izquierda -->
                        <div class="space-y-4">
                            <div>
                                <label for="edit_nombre" class="block text-gray-700">Nombres y Apellidos:</label>
                                <input type="text" id="edit_nombre" name="edit_nombre"
                                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>
                            <div>
                                <label for="edit_area_investigacion" class="block text-gray-700">Área de
                                    Investigación:</label>
                                <select id="edit_area_investigacion" name="edit_area_investigacion"
                                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                                    <option value="">Seleccione una opción</option>
                                    @foreach ($areasInvestigacion as $area)
                                        <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="edit_correo" class="block text-gray-700">Correo:</label>
                                <input type="email" id="edit_correo" name="edit_correo"
                                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>
                            <div>
                                <label for="edit_carrera" class="block text-gray-700">Grado Académico:</label>
                                <input type="text" id="edit_carrera" name="edit_carrera"
                                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>
                            <div>
                                <label for="edit_rol" class="block text-gray-700">Rol:</label>
                                <input type="text" id="edit_rol" name="edit_rol"
                                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100" readonly>
                            </div>
                        </div>

                        <!-- Columna Derecha -->
                        <div class="space-y-4">
                            <!-- Imagen Upload -->
                            <div>
                                <label class="block text-gray-700 mb-1">Imagen de Perfil:</label>
                                <div id="edit-image-upload"
                                    class="border-2 border-dashed border-gray-300 w-full h-52 flex flex-col items-center justify-center cursor-pointer relative text-center rounded-md"
                                    onclick="document.getElementById('edit_imagen').click()"
                                    ondragover="handleDragOver(event)" ondrop="handleDrop(event, 'edit_imagen')">
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
                                    <!-- Vista previa -->
                                    <img id="edit_previewImage" src="" alt="Vista previa"
                                        class="hidden w-52 h-full object-cover rounded shadow mx-auto">
                                    <!-- Botón eliminar imagen -->
                                    <button type="button" id="edit_remove_image"
                                        class="hidden absolute top-2 right-2 bg-red-500 text-white p-1 rounded-full hover:bg-red-600 transition cursor-pointer"
                                        onclick="removeImageEdit(event)">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V5a2 2 0 00-2-2H9a2 2 0 00-2 2v2m3 0h4" />
                                        </svg>
                                    </button>
                                    <input type="file" id="edit_imagen" name="edit_imagen" class="hidden"
                                        accept="image/png, image/jpeg, image/jpg, image/gif"
                                        onchange="mostrarVistaPreviaEdit(event)">
                                </div>
                            </div>

                            <!-- CV Upload -->
                            <div>
                                <label class="block text-gray-700 mb-1">CV:</label>
                                <div id="edit-cv-upload"
                                    class="border-2 border-dashed border-gray-300 w-full h-11 flex flex-col items-center justify-center cursor-pointer relative text-center rounded-md"
                                    onclick="document.getElementById('edit_cv').click()"
                                    ondragover="handleDragOver(event)" ondrop="handleDrop(event, 'edit_cv')">
                                    <!-- Placeholder -->
                                    <span id="edit-cv-placeholder" class="text-gray-500">
                                        Selecciona o arrastra un archivo PDF
                                    </span>
                                    <!-- Nombre de archivo -->
                                    <div id="edit-cv-file-info" class="hidden text-sm"></div>
                                    <!-- Botón eliminar CV -->
                                    <button type="button" id="edit_remove_cv"
                                        class="hidden absolute top-1 right-2 bg-red-500 text-white p-1 rounded-full hover:bg-red-600 transition cursor-pointer"
                                        onclick="removeCVEdit(event)">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V5a2 2 0 00-2-2H9a2 2 0 00-2 2v2m3 0h4" />
                                        </svg>
                                    </button>
                                    <input type="file" id="edit_cv" name="edit_cv" class="hidden"
                                        accept="application/pdf" onchange="mostrarCVEdit(event)">
                                </div>
                                <!-- Enlace al CV actual (opcional) -->
                                <div id="edit-cvPreview" class="mt-2">
                                    <a id="edit-cvLink" href="#" target="_blank"
                                        class="text-blue-600 hover:underline hidden">Ver CV Actual</a>
                                </div>
                            </div>

                            <!-- LinkedIn -->
                            <div>
                                <label for="edit_linkedin" class="block text-gray-700">LinkedIn:</label>
                                <input type="text" id="edit_linkedin" name="edit_linkedin"
                                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>
                        </div>

                        <!-- Fila para Tipo de Tesista y Cti Vitae -->
                        <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-4 items-start">
                            <!-- Campo Tipo de Tesista (oculto por defecto) -->
                            <div class="hidden" id="edit_tesistasTypeField">
                                <label for="edit_tesistas_type" class="block text-gray-700">Tipo de Tesista:</label>
                                <select id="edit_tesistas_type" name="edit_tesistas_type"
                                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Seleccione un tipo</option>
                                    <option value="Pregrado">Pregrado</option>
                                    <option value="Posgrado">Posgrado</option>
                                </select>
                            </div>
                            <!-- Campo Cti Vitae (envuelto en contenedor para layout) -->
                            <div class="md:col-span-2" id="edit_ctiVitaeContainer">
                                <label for="edit_ctivitae" class="block text-gray-700">Cti Vitae:</label>
                                <input type="text" id="edit_ctivitae" name="edit_ctivitae"
                                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>
                        </div>
                    </div>

                    <!-- Botones de acción -->
                    <div class="flex justify-center gap-4 mt-6">
                        <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-700">
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
        // Variable global para el rol seleccionado
        let selectedRole = "Investigadores"; // Rol por defecto

        // Cuando el DOM cargue
        document.addEventListener('DOMContentLoaded', () => {
            // Lee el rol actual que viene del controlador (URL)
            let currentRole = "{{ $role ?? 'Investigadores' }}";
            // Normaliza, por ejemplo, si "Tesistas Pregrado" se debe mostrar como "Tesistas"
            if (currentRole.toLowerCase().includes('tesistas')) {
                currentRole = 'Tesistas';
            }
            // Busca el botón de menú correspondiente (suponiendo que el id está en minúscula)
            const menuItem = document.querySelector(`#menu-${currentRole.toLowerCase()} a`);
            if (menuItem) {
                // Marca el botón seleccionado
                menuItem.classList.add('bg-blue-600', 'text-white');
                menuItem.classList.remove('text-gray-700');
            }
        });


        // ---------- FUNCIONES DE MODAL ----------
        function openCreateModal() {
            document.getElementById('createModal').classList.remove('hidden');
            // Usa el valor del rol actual que viene del controlador (por URL)
            const rolValor = "{{ $role }}";
            document.getElementById('rol').value = rolValor;
            selectedRole = rolValor;
            const tesistasField = document.getElementById('tesistasTypeField');
            const ctiVitaeContainer = document.getElementById('ctiVitaeContainer');
            if (selectedRole === "Tesistas") {
                tesistasField.classList.remove('hidden');
                ctiVitaeContainer.classList.remove('md:col-span-2');
                ctiVitaeContainer.classList.add('md:col-span-1');
            } else {
                tesistasField.classList.add('hidden');
                ctiVitaeContainer.classList.remove('md:col-span-1');
                ctiVitaeContainer.classList.add('md:col-span-2');
            }
        }

        function closeCreateModal() {
            document.getElementById('createModal').classList.add('hidden');
            document.getElementById('form').reset();
            removeImage();
            removeCV();
        }

        // ---------- FUNCIONES DE VISTA PREVIA (IMAGEN) ----------
        function mostrarVistaPrevia(event) {
            const input = event.target;
            const previewImage = document.getElementById("previewImage");
            const imagePlaceholder = document.getElementById("image-placeholder");
            const removeBtn = document.getElementById("remove-image");

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

        // ---------- FUNCIONES DE VISTA PREVIA (CV) ----------
        function mostrarCV(event) {
            const input = event.target;
            const cvPlaceholder = document.getElementById("cv-placeholder");
            const cvFileInfo = document.getElementById("cv-file-info");
            const removeBtn = document.getElementById("remove-cv");

            if (input.files && input.files[0]) {
                const file = input.files[0];
                if (file.type !== 'application/pdf') {
                    alert("Tipo de archivo no permitido. Solo se permite PDF.");
                    input.value = "";
                    return;
                }
                cvFileInfo.textContent = file.name;
                cvFileInfo.classList.remove('hidden');
                cvPlaceholder.classList.add('hidden');
                removeBtn.classList.remove('hidden');
            }
        }

        function removeCV(event) {
            if (event) event.stopPropagation();
            const cvInput = document.getElementById("cv");
            cvInput.value = "";
            document.getElementById("cv-file-info").textContent = "";
            document.getElementById("cv-file-info").classList.add('hidden');
            document.getElementById("cv-placeholder").classList.remove('hidden');
            document.getElementById("remove-cv").classList.add('hidden');
        }

        // ---------- DRAG & DROP ----------
        function handleDragOver(event) {
            event.preventDefault();
        }

        function handleDrop(event, inputId) {
            event.preventDefault();
            const inputElement = document.getElementById(inputId);
            if (event.dataTransfer.files && event.dataTransfer.files[0]) {
                inputElement.files = event.dataTransfer.files;
                if (inputId === 'imagen' || inputId === 'edit_imagen') {
                    if (inputId === 'imagen') {
                        mostrarVistaPrevia({
                            target: inputElement
                        });
                    } else {
                        mostrarVistaPreviaEdit({
                            target: inputElement
                        });
                    }
                } else if (inputId === 'cv' || inputId === 'edit_cv') {
                    if (inputId === 'cv') {
                        mostrarCV({
                            target: inputElement
                        });
                    } else {
                        mostrarCVEdit({
                            target: inputElement
                        });
                    }
                }
            }
        }


        // MODAL EDITAR

        // Abre el modal de editar y precarga los datos del registro
        function openEditModal(button) {
            let capital = JSON.parse(button.getAttribute('data-capital'));
            // Configura la acción del formulario (por ejemplo: /admin/capitales/ID)
            document.getElementById('editForm').action = `/admin/capitales/${capital.id}`;

            // Precargar datos en los campos
            document.getElementById('edit_nombre').value = capital.nombre;
            document.getElementById('edit_area_investigacion').value = capital.area_investigacion.id;
            document.getElementById('edit_correo').value = capital.correo;
            document.getElementById('edit_carrera').value = capital.carrera;
            // Si el rol es Tesistas, forzamos a "Tesistas" sin tipo adicional
            if (capital.rol.toLowerCase().includes('tesistas')) {
                document.getElementById('edit_rol').value = "Tesistas";
                // Asumimos que si existe, el tipo se puede obtener (por ejemplo, de capital.tesistas_type) o bien se extrae del rol
                let tesistasType = "Pregrado"; // valor por defecto
                let parts = capital.rol.split(' ');
                if (parts.length > 1) {
                    tesistasType = parts[1];
                }
                document.getElementById('edit_tesistas_type').value = tesistasType;
                document.getElementById('edit_tesistasTypeField').classList.remove('hidden');
                // Ajusta el layout: si es Tesistas, "Cti Vitae" ocupará 1 columna
                document.getElementById('edit_ctiVitaeContainer').classList.remove('md:col-span-2');
                document.getElementById('edit_ctiVitaeContainer').classList.add('md:col-span-1');
            } else {
                document.getElementById('edit_rol').value = capital.rol;
                document.getElementById('edit_tesistasTypeField').classList.add('hidden');
                document.getElementById('edit_ctiVitaeContainer').classList.remove('md:col-span-1');
                document.getElementById('edit_ctiVitaeContainer').classList.add('md:col-span-2');
            }
            document.getElementById('edit_linkedin').value = capital.linkedin;
            document.getElementById('edit_ctivitae').value = capital.ctivitae;

            // Imagen: cargar vista previa si existe
            const editPreviewImage = document.getElementById('edit_previewImage');
            const editImagePlaceholder = document.getElementById('edit-image-placeholder');
            const editRemoveBtn = document.getElementById('edit_remove_image');
            if (capital.foto) {
                editPreviewImage.src = `/user/template/images/${capital.foto}`;
                editPreviewImage.classList.remove('hidden');
                editImagePlaceholder.classList.add('hidden');
                editRemoveBtn.classList.remove('hidden');
            } else {
                editPreviewImage.src = "";
                editPreviewImage.classList.add('hidden');
                editImagePlaceholder.classList.remove('hidden');
                editRemoveBtn.classList.add('hidden');
            }

            // CV: si existe, mostrar información (o enlace, según prefieras)
            const editCVFileInfo = document.getElementById('edit-cv-file-info');
            const editCVPlaceholder = document.getElementById('edit-cv-placeholder');
            const editRemoveCVBtn = document.getElementById('edit_remove_cv');
            if (capital.cv) {
                editCVFileInfo.textContent = capital.cv;
                editCVFileInfo.classList.remove('hidden');
                editCVPlaceholder.classList.add('hidden');
                editRemoveCVBtn.classList.remove('hidden');
            } else {
                editCVFileInfo.textContent = "";
                editCVFileInfo.classList.add('hidden');
                editCVPlaceholder.classList.remove('hidden');
                editRemoveCVBtn.classList.add('hidden');
            }

            // Mostrar el modal
            document.getElementById('editModal').classList.remove('hidden');
        }

        // Cierra el modal de editar y reinicia los campos
        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('editForm').reset();
            removeImageEdit();
            removeCVEdit();
        }

        // ---------- FUNCIONES DE VISTA PREVIA (IMAGEN) para Editar ----------
        function mostrarVistaPreviaEdit(event) {
            const input = event.target;
            const previewImage = document.getElementById("edit_previewImage");
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
            const imageInput = document.getElementById("edit_imagen");
            imageInput.value = "";
            const previewImage = document.getElementById("edit_previewImage");
            previewImage.src = "";
            previewImage.classList.add('hidden');
            document.getElementById("edit-image-placeholder").classList.remove('hidden');
            document.getElementById("edit_remove_image").classList.add('hidden');
        }

        // ---------- FUNCIONES DE VISTA PREVIA (CV) para Editar ----------
        function mostrarCVEdit(event) {
            const input = event.target;
            const cvPlaceholder = document.getElementById("edit-cv-placeholder");
            const cvFileInfo = document.getElementById("edit-cv-file-info");
            const removeBtn = document.getElementById("edit_remove_cv");

            if (input.files && input.files[0]) {
                const file = input.files[0];
                if (file.type !== 'application/pdf') {
                    alert("Tipo de archivo no permitido. Solo se permite PDF.");
                    input.value = "";
                    return;
                }
                cvFileInfo.textContent = file.name;
                cvFileInfo.classList.remove('hidden');
                cvPlaceholder.classList.add('hidden');
                removeBtn.classList.remove('hidden');
            }
        }

        function removeCVEdit(event) {
            if (event) event.stopPropagation();
            const cvInput = document.getElementById("edit_cv");
            cvInput.value = "";
            document.getElementById("edit-cv-file-info").textContent = "";
            document.getElementById("edit-cv-file-info").classList.add('hidden');
            document.getElementById("edit-cv-placeholder").classList.remove('hidden');
            document.getElementById("edit_remove_cv").classList.add('hidden');
        }
    </script>
@endsection
