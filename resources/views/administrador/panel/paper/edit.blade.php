@extends('administrador.dashboard.plantilla')

@section('title', 'editar paper')

@section('contenido')
    <div class="paper-container">

        <div class="main-title flex flex-col items-center gap-3 mb-8">
            <div class="title text-2xl font-semibold text-[#2e5382]">Editar Papers</div>
            <div class="blue-line w-1/5 h-0.5 bg-[#64d423]"></div>
        </div>
        <form class="p-10" action="{{ route('papers.update', $paper->id) }}" method="POST" id="form"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid gap-6 mb-6 md:grid-cols-2 bg-slate-200 p-4 rounded-lg">
                <div>
                    <label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 align-baseline">Titulo</label>
                    <input type="text" value="{{ $paper->titulo }}" name="titulo" id="titulo"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Titulo del paper" required />
                </div>
                <div>
                    <label for="doi" class="block mb-2 text-sm font-medium text-gray-900 ">DOI</label>
                    <input type="text" value="{{ $paper->doi }}" name="doi" id="doi"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        placeholder="DOI" required />
                </div>
                <div>
                    <label for="autores" class="block mb-2 text-sm font-medium text-gray-900">Autores</label>

                    <div id="authors-container" class="space-y-2">
                        <input type="text" id="new-author"
                            class="author-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Nombre del autor" />
                        <input type="hidden" name="autores" id="autores-json" value="{{ $paper->autores }}" />
                    </div>
                    <div id="dropdownSearch" class="z-20 hidden bg-white rounded-lg shadow w-60 absolute mt-8">
                        <div class="p-3">

                            <ul id="authors-list" class="h-auto px-3 pb-3 overflow-y-auto text-sm text-gray-700"
                                aria-labelledby="dropdownSearchButton">
                                @foreach (json_decode($paper->autores, true) as $autor)
                                    <li>
                                        <div class="flex items-center ps-2 rounded hover:bg-gray-100 w-full">
                                            <input type="checkbox"
                                                class="author-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 "
                                                value="{{ $autor }}">
                                            <label
                                                class="w-full py-2 ms-2 text-sm font-medium text-gray-900 rounded ">{{ $autor }}</label>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                            <button id="remove-authors-btn" type="button"
                                class="flex items-center p-3 px-10 text-sm font-medium text-red-600 border-t border-gray-200 rounded-b-lg bg-gray-50  hover:bg-gray-100 ">
                                <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 18">
                                    <path
                                        d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Zm11-3h-6a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2Z" />
                                </svg>
                                Remover autor
                            </button>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <button type="button" id="add-author-btn"
                            class="mt-2 text-sm font-medium text-blue-500 hover:underline">+ Añadir autor</button>
                        <button type="button" id="show-authors-btn"
                            class="mt-2 px-4 text-sm font-medium text-green-500 hover:underline"> Mostrar Autores</button>
                    </div>
                </div>

                <div>
                    <label for="publisher" class="block mb-2 text-sm font-medium text-gray-900 ">Publisher</label>
                    <input type="text" value="{{ $paper->publisher }}" name="publisher" id="publisher"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        placeholder="Nombre publisher" required />
                </div>
                <div>
                    <label for="fecha_publicacion" class="block mb-2 text-sm font-medium text-gray-900 ">Fecha
                        Publicación</label>
                    <input type="date" value="{{ $paper->fecha_publicacion }}" name="fecha_publicacion"
                        id="fecha_publicacion"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        placeholder="    " required />
                </div>
                <div>
                    <label for="area_id" class="block mb-2 text-sm font-medium text-gray-900 ">Area</label>
                    <select name="area_id" id="area"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                        <option value="{{ $paper->area->id }}" selected>{{ $paper->area->nombre }}</option>

                        @forelse($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                        @empty
                            <option value="none">No Más hay areas Registradas</option>
                        @endforelse
                    </select>
                </div>
                <div>
                    <div class="relative">
                        <label for="topicos" class="block mb-2 text-sm font-medium text-gray-900">Tópicos</label>

                        <!-- Botón que activa el menú -->
                        <button type="button" id="toggle-menu"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-left">
                            Ver Topicos del Paper
                        </button>

                        <!-- Menú desplegable flotante -->
                        <div id="topicos-menu"
                            class="absolute z-10 w-full bg-white border border-gray-300 shadow-md rounded-lg hidden">
                            <div class="max-h-48 overflow-y-auto p-2">

                                @foreach ($topicos as $topico)
                                    <label class="flex items-center space-x-2 p-2 hover:bg-gray-100 rounded-md">
                                        <input type="checkbox" value="{{ $topico->id }}" class="checkbox-topico"
                                            {{ in_array($topico->id, $paper->topicos->pluck('id')->toArray()) ? 'checked' : '' }}>
                                        <span>{{ $topico->nombre }}</span>
                                    </label>
                                @endforeach

                            </div>
                        </div>
                        <!-- Input oculto para enviar los IDs de los tópicos seleccionados -->
                        <input type="hidden" name="topicos" id="topicos">

                    </div>
                    <div class="mt-4">
                        <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 ">Abstract</label>
                        <textarea
                            class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none "
                            id="descripcion" name="descripcion" rows="5" placeholder="Message">{{ $paper->descripcion }}</textarea>
                    </div>
                    <div class="my-4">
                        <label class="block mb-2 text-sm font-medium text-gray-900 " for="file_input">Imagen Paper</label>
                        <input value="{{ $paper->img_filename }}"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none"
                            id="file_input" type="file" name="img_filename" accept="image/jpeg,image/png,image/jpg">
                        <div id="img-container" class="mt-2">
                            <label
                                class="block w-full text-sm text-green-500 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none p-2"
                                id="img_display">Archivo Seleccionado: {{ $paper->img_filename }} </label>

                        </div>
                    </div>


                </div>
                <div>
                    <label for="pdf" class="block mb-2 text-sm font-medium text-gray-900">Archivo PDF</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 16" aria-hidden="true">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span>
                                    or drag and drop</p>
                                <p class="text-xs text-gray-500">PDF (MAX. 800x400px)</p>
                            </div>
                            <input id="dropzone-file" value="{{ $paper->pdf_filename }}" name="pdf_filename"
                                type="file" class="hidden" accept="application/pdf" />
                        </label>
                    </div>
                    <div id="info-container" class="mt-2">
                        <label
                            class="block w-full text-sm text-green-500 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none p-2"
                            id="pdf_display">Archivo Seleccionado: {{ $paper->pdf_filename }} </label>
                    </div>
                </div>

            </div>

            <div class="flex justify-center gap-2">
                <button type="submit"
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Guardar
                    Edicion</button>

                <a href="{{ route('papers.edit', $paper->id) }}"
                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 cursor-pointer ">Cancelar</a>

                <a href="{{ route('paper-panel') }}"
                    class="focus:outline-none text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 cursor-pointer ">
                    Volver</a>

            </div>

        </form>

    </div>

    @if (session('Success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Actualizado exitosamente!',
                text: 'El paper ha sido actualizado correctamente.',
                showConfirmButton: true,
                confirmButtonText: 'OK',
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
                text: 'Vuelve a intentar.',
                showConfirmButton: true,
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'bg-red-500 text-white hover:bg-red-600 focus:ring-2 focus:ring-red-300 rounded-lg py-2 px-4'
                }
            });
        </script>
    @endif

@endsection


@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const authorsContainer = document.getElementById("authors-container");
            const authorsList = document.getElementById("authors-list");
            const addAuthorBtn = document.getElementById("add-author-btn");
            const showAuthorsBtn = document.getElementById("show-authors-btn");
            const dropdownSearch = document.getElementById("dropdownSearch");
            const removeAuthorsBtn = document.getElementById("remove-authors-btn");
            const autoresJsonInput = document.getElementById("autores-json");
            const authorsForm = document.getElementById("form");
            const pdfInput = document.getElementById("dropzone-file");
            const imgInput = document.getElementById("file_input")
            const img_display = document.getElementById('img_display')
            const pdf_display = document.getElementById('pdf_display')

            const addedAuthors = new Set(JSON.parse(autoresJsonInput.value || "[]"));

            addAuthorBtn.addEventListener("click", () => {
                const authorInput = document.getElementById("new-author");
                const authorName = authorInput.value.trim();

                if (authorName && !addedAuthors.has(authorName)) {
                    addedAuthors.add(authorName);

                    const listItem = document.createElement("li");
                    listItem.innerHTML = `
        <div class="flex items-center ps-2 rounded hover:bg-gray-100 w-full">
          <input type="checkbox" class="author-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 " value="${authorName}">
          <label class="w-full py-2 ms-2 text-sm font-medium text-gray-900 rounded ">${authorName}</label>
        </div>`;
                    authorsList.appendChild(listItem);

                    authorInput.value = "";
                }
            });


            showAuthorsBtn.addEventListener("click", () => {
                dropdownSearch.classList.toggle("hidden");
            });

            document.addEventListener("click", function(event) {
                if (!showAuthorsBtn.contains(event.target) && !dropdownSearch.contains(event.target)) {
                    dropdownSearch.classList.add("hidden");
                }
            });


            removeAuthorsBtn.addEventListener("click", () => {
                const checkboxes = document.querySelectorAll(".author-checkbox:checked");

                checkboxes.forEach((checkbox) => {
                    const authorName = checkbox.value;
                    addedAuthors.delete(authorName);
                    checkbox.closest("li").remove();
                });

                if (Array.from(addedAuthors).length === 0)
                    dropdownSearch.classList.toggle("hidden");
            });

            function fileDisplay(event, element) {
                const file = event.target.files[0];
                if (file) {
                    element.textContent = file.name;
                }
            }

            // eventos de actualizar contenedor con información de los archivos
            pdfInput.addEventListener('change', (event) => {

                fileDisplay(event, pdf_display);
            });

            imgInput.addEventListener('change', (event) => {

                fileDisplay(event, img_display);
            });


               // transformar el formato de autores json a array de strings
            form.addEventListener("submit", (event) => {
                const authorsArray = Array.from(addedAuthors);
                autoresJsonInput.value = JSON.stringify(authorsArray);
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggleButton = document.getElementById("toggle-menu");
            const menu = document.getElementById("topicos-menu");
            const checkboxes = document.querySelectorAll(".checkbox-topico");
            const hiddenInput = document.getElementById("topicos");

            let selectedTopicos = [];

            // cargar valores iniciales de la base de datos
            checkboxes.forEach(checkbox => {
                const id = checkbox.value;
                if (checkbox.checked) {
                    selectedTopicos.push(id);
                }
                hiddenInput.value = selectedTopicos.join(",");
            })

            // Mostrar/ocultar el menú
            toggleButton.addEventListener("click", function() {
                menu.classList.toggle("hidden");
            });

            // Cerrar menú si se hace clic fuera
            document.addEventListener("click", function(event) {
                if (!toggleButton.contains(event.target) && !menu.contains(event.target)) {
                    menu.classList.add("hidden");
                }
            });

            // Manejar selección de tópicos
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener("change", function() {
                    const id = this.value;

                    if (this.checked) {
                        if (!selectedTopicos.includes(id)) {
                            selectedTopicos.push(id);
                        }
                    } else {
                        selectedTopicos = selectedTopicos.filter(t => t !== id);
                    }
                    // Actualizar el input oculto con los IDs seleccionados
                    hiddenInput.value = selectedTopicos.join(",");
                });
            });
        });
    </script>


@endsection
