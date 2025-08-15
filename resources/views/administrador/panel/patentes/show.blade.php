@extends('administrador.dashboard.plantilla')

@section('title', 'Vista Patentes')

@section('contenido')
    <div class="py-8">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow-xl sm:rounded-2xl border border-gray-100">
                <div class="px-6 py-8">
                    <!-- Header Section -->
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-8">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="p-2 bg-indigo-50 rounded-lg">
                                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                        </path>
                                    </svg>
                                </div>
                                <h1 class="text-xl font-bold text-gray-900">Gestión de Patentes</h1>
                            </div>
                            <p class="text-gray-600">Administra y visualiza todas las patentes registradas en el sistema.
                            </p>

                            <!-- Search Bar -->
                            <div class="mt-6 max-w-md">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>
                                     <input 
                                        class="block w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl bg-gray-50 focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm transition-all duration-200 hover:bg-white" 
                                        type="text" 
                                        oninput="buscarPatentes(this.value)"
                                        id="search" 
                                        placeholder="Buscar por título o autor..." 
                                    />
                                </div>
                            </div>
                        </div>

                        <!-- Create Button -->
                        <div class="flex-shrink-0">
                            <button onclick="openCreateModal()"
                                class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-indigo-600 to-indigo-700 text-white font-semibold rounded-xl shadow-lg hover:from-indigo-700 hover:to-indigo-800 focus:outline-none focus:ring-4 focus:ring-indigo-500/50 transition-all duration-200 transform hover:scale-105">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Nueva Patente
                            </button>
                        </div>
                    </div>

                    <!-- Table Section -->
                    <div class="bg-gray-50 rounded-xl border border-gray-100">
                        <div class="overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th scope="col"
                                                class="px-4 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Título
                                            </th>
                                            <th scope="col"
                                                class="px-4 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Área
                                            </th>
                                            <th scope="col"
                                                class="px-4 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Descripción
                                            </th>
                                            <th scope="col"
                                                class="px-4 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Autores
                                            </th>
                                            <th scope="col"
                                                class="px-4 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                DOI
                                            </th>
                                            <th scope="col"
                                                class="px-4 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Fecha
                                            </th>
                                            <th scope="col"
                                                class="px-4 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Archivos
                                            </th>
                                            <th scope="col"
                                                class="px-4 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-100">
                                        @foreach ($patentes as $patente)
                                            @php
                                                $truncateService = new \Urodoz\Truncate\TruncateService();
                                                $htmlSnippet = $truncateService->truncate(
                                                    $patente->descripcion,
                                                    100,
                                                    '...',
                                                );
                                            @endphp
                                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                                <td class="px-4 py-6 text-sm text-gray-900">
                                                    <div class="max-w-xs">
                                                        <p class="font-semibold truncate">{{ $patente->titulo }}</p>
                                                    </div>
                                                </td>

                                                <td class="px-4 py-6 whitespace-nowrap text-sm">
                                                    <span
                                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200">
                                                        {{ $patente->area ? $patente->area->nombre : 'Sin área' }}
                                                    </span>
                                                </td>

                                                <td class="px-4 py-6 text-sm text-gray-600">
                                                    <div class="max-w-sm">
                                                        <p class="line-clamp-2 description-text"
                                                            data-full-text="{{ $patente->descripcion }}">
                                                            {!! $htmlSnippet !!}</p>
                                                        @if (strlen($patente->descripcion) > 100)
                                                            <button onclick="toggleDescription(this)"
                                                                class="text-indigo-600 hover:text-indigo-800 text-xs font-medium mt-1 transition-colors duration-150">
                                                                Ver más
                                                            </button>
                                                        @endif
                                                    </div>
                                                </td>

                                                <td class="px-4 py-6 whitespace-nowrap text-sm text-gray-600">
                                                    <div class="max-w-xs truncate">
                                                        {{ $patente->formatted_autores }}
                                                    </div>
                                                </td>

                                                <td class="px-4 py-6 whitespace-nowrap text-sm text-gray-600 font-mono">
                                                    <div class="max-w-xs truncate">
                                                        {{ $patente->doi }}
                                                    </div>
                                                </td>

                                                <td class="px-4 py-6 whitespace-nowrap text-sm text-gray-600">
                                                    {{ $patente->fecha_publicacion }}
                                                </td>

                                                <td class="px-4 py-6 whitespace-nowrap text-sm">
                                                    <div class="flex items-center gap-3">
                                                        <!-- Image Preview -->
                                                        @if ($patente->img_filename)
                                                            <button type="button"
                                                                onclick="openModal('{{ Storage::url('uploads/paper_img/' . $patente->img_filename) }}', 'image')"
                                                                class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-medium text-green-700 bg-green-50 border border-green-200 rounded-lg hover:bg-green-100 transition-colors duration-150">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                                    </path>
                                                                </svg>
                                                                Imagen
                                                            </button>
                                                        @else
                                                            <span
                                                                class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-gray-500 bg-gray-50 border border-gray-200 rounded-lg">
                                                                Sin imagen
                                                            </span>
                                                        @endif

                                                        <!-- PDF Link -->
                                                        <a href="/storage/uploads/pdf/{{ $patente->pdf_filename }}"
                                                            target="_blank"
                                                            class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-medium text-red-700 bg-red-50 border border-red-200 rounded-lg hover:bg-red-100 transition-colors duration-150">
                                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                                <path
                                                                    d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                                                            </svg>
                                                            PDF
                                                        </a>
                                                    </div>
                                                </td>

                                                <td class="px-4 py-6 whitespace-nowrap text-center">
                                                    <div class="flex items-center justify-center gap-2">
                                                        <!-- Edit -->
                                                        <a href="{{ route('patentes.edit', $patente->id) }}"
                                                            class="p-2 text-gray-500 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-colors duration-150"
                                                            title="Editar">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                                </path>
                                                            </svg>
                                                        </a>

                                                        <!-- Delete -->
                                                        <form class="inline-block"
                                                            action="{{ route('patentes.destroy', $patente->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button"
                                                                onclick="event.preventDefault(); 
                                                                             Swal.fire({
                                                                                 title: '¿Estás seguro?',
                                                                                 text: 'No será posible revertir los cambios!',
                                                                                 icon: 'warning',
                                                                                 showCancelButton: true,
                                                                                 customClass: {
                                                                                    confirmButton: 'swal2-confirm-green',
                                                                                    cancelButton: 'swal2-cancel-red'
                                                                                },
                                                                                 confirmButtonText: 'Sí, eliminar'
                                                                             }).then((result) => {
                                                                                 if (result.isConfirmed) {
                                                                                     this.closest('form').submit();
                                                                                 }
                                                                             });"
                                                                class="p-2 text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors duration-150"
                                                                title="Eliminar">
                                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Pagination -->
                        <div class="bg-white px-6 py-4 border-t border-gray-200">
                            {{ $patentes->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Crear -->
    <div id="createModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 w-full h-full">
        <div class="flex items-center justify-center w-full h-full">
            <!-- Se aumentó el ancho máximo a max-w-5xl para que el modal sea más ancho -->
            <div class="bg-white px-8 py-6 rounded-lg shadow-xl max-w-6xl w-full relative max-h-screen overflow-y-auto">
                <!-- Título centrado -->
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-semibold text-blue-800">Crear Patente</h2>
                    <div class="mx-auto mt-2 w-1/5 h-1 bg-green-400"></div>
                </div>

                <!-- Formulario -->
                <form id="form" action="{{ route('patentes.store') }}" method="POST"
                    enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Contenedor principal con Grid (2 columnas en md+) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Columna Izquierda -->
                        <div class="flex flex-col gap-6">
                            <!-- TÍTULO -->
                            <div>
                                <label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 align-baseline">
                                    Titulo
                                </label>
                                <input type="text" name="titulo" id="titulo"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Titulo del paper" required />
                            </div>

                            <!-- AUTORES -->
                            <div>
                                <label for="autores" class="block mb-2 text-sm font-medium text-gray-900">Autores</label>
                                <div id="authors-container" class="space-y-2">
                                    <input type="text" id="new-author"
                                        class="author-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                       focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Nombre del autor" />
                                    <!-- Input oculto para enviar los autores ingresados -->
                                    <input type="hidden" name="autores" id="autores-json" />
                                </div>
                                <div id="dropdownSearch"
                                    class="z-20 hidden bg-white rounded-lg shadow w-60 absolute mt-8">
                                    <div class="p-3">
                                        <ul id="authors-list"
                                            class="h-auto px-3 pb-3 overflow-y-auto text-sm text-gray-700"
                                            aria-labelledby="dropdownSearchButton">
                                        </ul>
                                        <button id="remove-authors-btn"
                                            class="flex items-center p-3 px-10 text-sm font-medium text-red-600 border-t border-gray-200 rounded-b-lg bg-gray-50 hover:bg-gray-100">
                                            <svg class="w-4 h-4 me-2" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 18">
                                                <path
                                                    d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Zm11-3h-6a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2Z" />
                                            </svg>
                                            Remover autor
                                        </button>
                                    </div>
                                </div>
                                <div class="flex justify-between">
                                    <button type="button" id="add-author-btn"
                                        class="mt-2 text-sm font-medium text-blue-500 hover:underline">
                                        + Añadir autor
                                    </button>
                                    <button type="button" id="show-authors-btn"
                                        class="mt-2 px-4 text-sm font-medium text-green-500 hover:underline">
                                        Mostrar Autores
                                    </button>
                                </div>
                            </div>

                            <!-- FECHA DE PUBLICACIÓN -->
                            <div>
                                <label for="fecha_publicacion" class="block mb-2 text-sm font-medium text-gray-900">
                                    Fecha Publicación
                                </label>
                                <input type="date" name="fecha_publicacion" id="fecha_publicacion"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required />
                            </div>



                            <!-- ABSTRACT -->
                            <div>
                                <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900">
                                    Abstract
                                    (  <span class="text-xs text-green-600 bg-green-50 px-3 py-1 rounded-full" id="char-count">
                                            1000 caracteres restantes
                                        </span>)
                                </label>
                                <textarea
                                    class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding
                                   border border-solid border-gray-300 rounded transition ease-in-out m-0
                                   focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    id="descripcion" name="descripcion" rows="8" placeholder="Descripción" required></textarea>
                            </div>
                        </div>



                        <!-- COLUMNA DERECHA -->
                        <div class="flex flex-col gap-6">
                            <!-- DOI -->
                            <div>
                                <label for="doi" class="block mb-2 text-sm font-medium text-gray-900">DOI</label>
                                <input type="text" name="doi" id="doi"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="DOI" required />
                            </div>

                            <!-- ÁREA -->
                            <div>
                                <label for="area_id" class="block mb-2 text-sm font-medium text-gray-900">Área</label>
                                <select name="area_id" id="area"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                                    <option value="" disabled selected>Selecciona un Area de Investigación</option>
                                    @if (!$areas->isEmpty())
                                        @foreach ($areas as $area)
                                            <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                                        @endforeach
                                    @else
                                        <option value="none">No hay areas Registradas</option>
                                    @endif
                                </select>
                            </div>

                            <!-- IMAGEN PAPER -->
                            <div>
                                <label for="img_filename" class="block mb-2 text-sm font-medium text-gray-900">
                                    Imagen Paper
                                </label>
                                <div id="image-upload"
                                    class="border-2 border-dashed border-gray-300 bg-white w-full h-[233px] flex flex-col
                                   items-center justify-center cursor-pointer relative text-center rounded-md"
                                    onclick="document.getElementById('img_filename').click()"
                                    ondragover="handleDragOver(event)" ondrop="handleDrop(event, 'img_filename')">
                                    <!-- Placeholder (solo se ve si no hay img_filename) -->
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
                                        class="hidden w-full h-full object-cover rounded shadow mx-auto">
                                    <!-- Botón eliminar img_filename -->
                                    <button type="button" id="remove-image"
                                        class="hidden absolute top-2 right-2 bg-red-500 text-white p-1 rounded-full
                                       hover:bg-red-600 transition cursor-pointer"
                                        onclick="removeImage(event)">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0
                                                               0116.138 21H7.862a2 2 0
                                                               01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V5a2 2
                                                               0 00-2-2H9a2 2 0 00-2 2v2m3 0h4" />
                                        </svg>
                                    </button>
                                    <input type="file" id="img_filename" name="img_filename" class="hidden"
                                        accept="image/png, image/jpeg, image/jpg" onchange="mostrarVistaPrevia(event)">
                                </div>
                            </div>

                            <!-- ARCHIVO PDF -->
                            <div>
                                <label for="pdf_filename" class="block mb-2 text-sm font-medium text-gray-900">
                                    Archivo PDF
                                </label>
                                <div id="pdf_filename-upload"
                                    class="border-2 border-dashed border-gray-300 bg-white w-full h-11 flex flex-col
                                   items-center justify-center cursor-pointer relative text-center rounded-md"
                                    onclick="document.getElementById('pdf_filename').click()"
                                    ondragover="handleDragOver(event)" ondrop="handleDrop(event, 'pdf_filename')">
                                    <!-- Placeholder pdf_filename -->
                                    <span id="pdf_filename-placeholder" class="text-gray-500">
                                        Selecciona o arrastra un archivo PDF
                                    </span>
                                    <!-- Nombre de archivo pdf_filename -->
                                    <div id="pdf_filename-file-info" class="hidden text-sm"></div>
                                    <!-- Botón eliminar pdf_filename -->
                                    <button type="button" id="remove-pdf_filename"
                                        class="hidden absolute top-1 right-2 bg-red-500 text-white p-1 rounded-full
                                       hover:bg-red-600 transition cursor-pointer"
                                        onclick="removepdf_filename(event)">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0
                                                               0116.138 21H7.862a2 2 0
                                                               01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V5a2 2
                                                               0 00-2-2H9a2 2 0 00-2 2v2m3 0h4" />
                                        </svg>
                                    </button>
                                    <input type="file" id="pdf_filename" name="pdf_filename" class="hidden"
                                        accept="application/pdf" onchange="mostrarpdf_filename(event)">
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


    <!-- Modal para mostrar imágenes -->
    <div id="archivoModal"
        class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center hidden z-50">
        <div class="bg-white p-6 rounded-2xl shadow-2xl max-w-5xl w-full mx-4 relative">
            <button
                class="absolute -top-2 -right-2 bg-gray-800 text-white w-8 h-8 rounded-full flex items-center justify-center hover:bg-gray-700 transition-colors duration-150"
                onclick="closeModal()">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
            <div id="modalContent" class="max-h-[80vh] overflow-auto"></div>
        </div>
    </div>

    <!-- Scripts para TinyMCE -->
    <script>
        tinymce.init({
            selector: '#contenido',
            language: 'es_MX',
            branding: false,
            menubar: false,
            height: 240,
            relative_urls: false,
            remove_script_host: false,
            plugins: 'autolink lists link image charmap preview anchor code',
            toolbar: 'undo redo | formatselect | bold italic underline forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | removeformat | code',
            statusbar: false,
            link_title: false,
            link_target_list: [{
                    title: 'Misma ventana',
                    value: '_self'
                },
                {
                    title: 'Nueva ventana',
                    value: '_blank'
                }
            ]
        });

        tinymce.init({
            selector: '#edit_contenido',
            language: 'es_MX',
            branding: false,
            menubar: false,
            height: 240,
            relative_urls: false,
            remove_script_host: false,
            plugins: 'autolink lists link image charmap preview anchor code',
            toolbar: 'undo redo | formatselect | bold italic underline forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | removeformat | code',
            statusbar: false,
            link_title: false,
            link_target_list: [{
                    title: 'Misma ventana',
                    value: '_self'
                },
                {
                    title: 'Nueva ventana',
                    value: '_blank'
                }
            ]
        });
    </script>



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
        function toggleDescription(button) {
            const descriptionElement = button.previousElementSibling;
            const isExpanded = descriptionElement.classList.contains('line-clamp-none');

            if (isExpanded) {
                descriptionElement.classList.remove('line-clamp-none');
                descriptionElement.classList.add('line-clamp-2');
                button.textContent = 'Ver más';
                button.classList.remove('text-indigo-800');
                button.classList.add('text-indigo-600');
            } else {
                descriptionElement.classList.remove('line-clamp-2');
                descriptionElement.classList.add('line-clamp-none');
                button.textContent = 'Ver menos';
                button.classList.remove('text-indigo-600');
                button.classList.add('text-indigo-800');
            }
        }
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




        function buscarPatentes(query) {
            fetch(`/admin/patentes/index?search=${query}`, {
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

        document.getElementById('form').addEventListener('submit', function(e) {
            // Obtén el contenido de TinyMCE
            let content = tinymce.get('contenido').getContent({
                format: 'text'
            }).trim();
            if (content === '') {
                e.preventDefault();
                alert('El campo contenido es obligatorio.');
                tinymce.get('contenido').focus();
            }
        });


        // ---------- FUNCIONES DE VISTA PREVIA (img_filename) ----------
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
            const imageInput = document.getElementById("img_filename");
            imageInput.value = "";
            const previewImage = document.getElementById("previewImage");
            previewImage.src = "";
            previewImage.classList.add('hidden');
            document.getElementById("image-placeholder").classList.remove('hidden');
            document.getElementById("remove-image").classList.add('hidden');
        }

        // ---------- FUNCIONES DE VISTA PREVIA (pdf_filename) ----------
        function mostrarpdf_filename(event) {
            const input = event.target;
            const pdf_filenamePlaceholder = document.getElementById("pdf_filename-placeholder");
            const pdf_filenameFileInfo = document.getElementById("pdf_filename-file-info");
            const removeBtn = document.getElementById("remove-pdf_filename");

            if (input.files && input.files[0]) {
                const file = input.files[0];
                if (file.type !== 'application/pdf') {
                    alert("Tipo de archivo no permitido. Solo se permite PDF.");
                    input.value = "";
                    return;
                }
                pdf_filenameFileInfo.textContent = file.name;
                pdf_filenameFileInfo.classList.remove('hidden');
                pdf_filenamePlaceholder.classList.add('hidden');
                removeBtn.classList.remove('hidden');
            }
        }

        function removepdf_filename(event) {
            if (event) event.stopPropagation();
            const pdf_filenameInput = document.getElementById("pdf_filename");
            pdf_filenameInput.value = "";
            document.getElementById("pdf_filename-file-info").textContent = "";
            document.getElementById("pdf_filename-file-info").classList.add('hidden');
            document.getElementById("pdf_filename-placeholder").classList.remove('hidden');
            document.getElementById("remove-pdf_filename").classList.add('hidden');
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
                if (inputId === 'img_filename') {
                    mostrarVistaPrevia({
                        target: inputElement
                    });
                } else {
                    mostrarpdf_filename({
                        target: inputElement
                    });
                }
            }
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Lógica para Autores
            const authorsContainer = document.getElementById("authors-container");
            const authorsList = document.getElementById("authors-list");
            const addAuthorBtn = document.getElementById("add-author-btn");
            const showAuthorsBtn = document.getElementById("show-authors-btn");
            const dropdownSearch = document.getElementById("dropdownSearch");
            const removeAuthorsBtn = document.getElementById("remove-authors-btn");
            const autoresJsonInput = document.getElementById("autores-json");
            const form = document.getElementById("form");

            const addedAuthors = new Set();

            addAuthorBtn.addEventListener("click", () => {
                const authorInput = document.getElementById("new-author");
                const authorName = authorInput.value.trim();
                if (authorName && !addedAuthors.has(authorName)) {
                    addedAuthors.add(authorName);
                    const listItem = document.createElement("li");
                    listItem.innerHTML = `
                        <div class="flex items-center ps-2 rounded hover:bg-gray-100 w-full">
                          <input type="checkbox" class="author-checkbox w-4 h-4 text-blue-600 bg-gray-100
                                                     border-gray-300 rounded focus:ring-blue-500" value="${authorName}">
                          <label class="w-full py-2 ms-2 text-sm font-medium text-gray-900 rounded">
                            ${authorName}
                          </label>
                        </div>`;
                    authorsList.appendChild(listItem);
                    authorInput.value = "";
                }
            });

            document.addEventListener("click", function(event) {
                if (!dropdownSearch.contains(event.target) && !showAuthorsBtn.contains(event.target)) {
                    dropdownSearch.classList.add("hidden");
                }
            });

            showAuthorsBtn.addEventListener("click", () => {
                if (addedAuthors.size > 0) {
                    dropdownSearch.classList.toggle("hidden");
                }
            });

            removeAuthorsBtn.addEventListener("click", () => {
                const checkboxes = document.querySelectorAll(".author-checkbox:checked");
                checkboxes.forEach((checkbox) => {
                    const authorName = checkbox.value;
                    addedAuthors.delete(authorName);
                    checkbox.closest("li").remove();
                });
                if (addedAuthors.size === 0) {
                    dropdownSearch.classList.toggle("hidden");
                }
            });

            form.addEventListener("submit", (event) => {
                const authorsArray = Array.from(addedAuthors);
                autoresJsonInput.value = JSON.stringify(authorsArray);
            });

            // Contador de caracteres para Abstract
            const textarea = document.getElementById('descripcion');
            const charCount = document.getElementById('char-count');
            const maxChars = 1000;

            const updateCount = () => {
                const content = textarea.value;
                const remainingChars = maxChars - content.length;
                charCount.textContent = `${remainingChars} caracteres restantes`;
                if (remainingChars < 20) {
                    charCount.classList.add("text-red-500");
                } else {
                    charCount.classList.remove("text-red-500");
                }
            };

            textarea.addEventListener('input', updateCount);

            textarea.addEventListener('keydown', (event) => {
                const content = textarea.value;
                if (content.length >= maxChars &&
                    !['Backspace', 'Delete', 'ArrowLeft', 'ArrowRight', 'ArrowUp', 'ArrowDown'].includes(
                        event.key)) {
                    event.preventDefault();
                }
            });

            textarea.addEventListener('paste', (event) => {
                const content = textarea.value;
                const clipboardText = (event.clipboardData || window.clipboardData).getData('text');
                const remainingChars = maxChars - content.length;
                if (clipboardText.length > remainingChars) {
                    event.preventDefault();
                    const truncatedText = clipboardText.substring(0, remainingChars);
                    textarea.value += truncatedText;
                }
                updateCount();
            });

            updateCount();
        });
    </script>
@endsection
