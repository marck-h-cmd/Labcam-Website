@extends('administrador.dashboard.plantilla')

@section('title', 'Crear Slider historia')

@section('contenido')
    <div class="slider-container ">
        <div class="main-title flex flex-col items-center gap-3 mb-8">
            <div class="title text-2xl font-semibold text-[#2e5382]">
                Editar Slider de Momentos Importantes
            </div>
            <div class="blue-line w-1/5 h-0.5 bg-[#64d423]"></div>
        </div>
        <form class="md:px-20 px-40 py-10" action="{{ route('h-slider.update', $slider->id) }}" method="post" id="form"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid gap-6 mb-6 md:grid-cols-1 bg-slate-200 p-4 rounded-lg">
                <!-- Campo Descripción -->
                <div>
                    <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900">
                        Descripcion Momento
                    </label>
                    <textarea
                        class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="descripcion" name="descripcion" rows="6" placeholder="Descripción">{{ old('descripcion', isset($slider) ? $slider->descripcion : '') }}</textarea>
                    <p class="block w-full text-sm text-green-500 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none p-2 mt-2"
                        id="char-count">200 caracteres restantes</p>
                </div>
                <!-- Campo Imagen -->
                <div>
                    <label class="block text-gray-700 mb-1">Imagen Slider:</label>
                    <div id="image-upload"
                        class="border-2 border-dashed border-gray-300 w-full bg-white h-96 flex flex-col items-center justify-center cursor-pointer relative text-center rounded-md"
                        onclick="document.getElementById('historia_img').click()" ondragover="handleDragOver(event)"
                        ondrop="handleDrop(event, 'historia_img')">

                        <!-- Placeholder siempre renderizado y condicionado -->
                        <span id="image-placeholder"
                            class="text-gray-500 flex flex-col items-center {{ isset($slider) && $slider->historia_img ? 'hidden' : '' }}">
                            <svg class="w-8 h-8 mb-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 16" aria-hidden="true">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            Selecciona o arrastra una imagen (png, jpeg, jpg, gif)
                        </span>

                        <!-- Imagen de vista previa -->
                        <img id="previewImage"
                            src="{{ isset($slider) && $slider->historia_img ? Storage::url('uploads/imgs/' . $slider->historia_img) : '' }}"
                            alt="Vista previa"
                            class="w-full h-full object-cover rounded shadow mx-auto {{ isset($slider) && $slider->historia_img ? '' : 'hidden' }}">

                        <!-- Botón eliminar imagen: se muestra si existe una imagen precargada -->
                        <button type="button" id="remove-image"
                            class="absolute top-2 right-2 bg-red-500 text-white p-1 rounded-full hover:bg-red-600 transition cursor-pointer {{ isset($slider) && $slider->historia_img ? '' : 'hidden' }}"
                            onclick="removeImage(event)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V5a2 2 0 00-2-2H9a2 2 0 00-2 2v2m3 0h4" />
                            </svg>
                        </button>

                        <!-- Input de archivo oculto -->
                        <input type="file" id="historia_img" name="historia_img" class="hidden"
                            accept="image/png,image/jpeg,image/jpg,image/gif" onchange="mostrarVistaPrevia(event)">
                    </div>
                    <div id="info-container" class="mt-2"></div>
                </div>
            </div>
            <div class="flex justify-center gap-2">
                <button type="submit"
                    class="focus:outline-none text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                    Actualizar
                </button>
                <a href="{{ route('h-slider.create') }}"
                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 cursor-pointer">
                    Cancelar
                </a>
            </div>
        </form>
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Creado exitosamente!',
                text: 'Nuevo slider ha sido creado.',
                showConfirmButton: true,
                confirmButtonText: 'Aceptar',
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
                confirmButtonText: 'Aceptar',
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
            const charCount = document.getElementById('char-count');
            const maxChars = 200;

            const updateCount = () => {
                const content = tinymce.get('descripcion').getContent({
                    format: 'text'
                });
                const remainingChars = maxChars - content.length;

                if (remainingChars < 20) {
                    charCount.classList.add("text-red-500");
                } else {
                    charCount.classList.remove("text-red-500");
                }

                const formattedChars = remainingChars.toLocaleString('en-US').replace(/,/g, ' ');
                charCount.textContent = `${formattedChars} caracteres restantes`;
            };

            tinymce.init({
                selector: '#descripcion',
                language: 'es_MX',
                branding: false,
                menubar: false,
                toolbar: 'undo redo | forecolor | bold italic | alignleft aligncenter alignright alignjustify | outdent indent',
                statusbar: false,
                forced_root_block: 'p',
                forced_root_block_attrs: {
                    style: 'margin-bottom: 1em;'
                },
                height: 200,
                autoresize_max_width: 400,
                setup: (editor) => {
                    // Actualizar el contador al escribir
                    editor.on('input', updateCount);

                    editor.on('BeforeInput', (event) => {
                        const content = editor.getContent({
                            format: 'text'
                        });
                        if (content.length >= maxChars && event.inputType !==
                            "deleteContentBackward") {
                            event.preventDefault();
                        }
                    });

                    editor.on('Paste', (event) => {
                        event.preventDefault();
                        const content = editor.getContent({
                            format: 'text'
                        });
                        const clipboardText = (event.clipboardData || window.clipboardData)
                            .getData('text');
                        const remainingChars = maxChars - content.length;

                        if (remainingChars > 0) {
                            const newText = clipboardText.substring(0, remainingChars);
                            editor.insertContent(newText);
                            updateCount();
                        }
                    });
                },
                init_instance_callback: (editor) => {
                    // Llamar a updateCount() al inicializar para actualizar el contador con el contenido precargado
                    updateCount();
                }
            });
        });

        // Vista previa de imagen
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
            const imageInput = document.getElementById("historia_img");
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
                mostrarVistaPrevia({
                    target: inputElement
                });
            }
        }
    </script>
@endsection
