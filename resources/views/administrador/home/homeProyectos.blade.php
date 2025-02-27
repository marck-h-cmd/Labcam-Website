@extends('administrador.dashboard.plantilla')

@section('contenido')
    <div class="main-title flex flex-col items-center gap-3 mb-8">
        <div class="title text-2xl font-semibold text-[#2e5382]">Home Proyectos</div>
        <div class="blue-line w-1/5 h-0.5 bg-[#64d423]"></div>
    </div>

    <form class="p-8" action="{{ route('admin-homeProyectosUpdate') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center p-10 bg-slate-200 rounded-lg">
            <!-- Primera Imagen -->
            <div class="flex flex-col gap-3">
                <label class="text-base font-medium">Primera imagen</label>
                <div id="image1-upload"
                    class="relative border-2 border-dashed border-gray-300 w-full aspect-[16/9] flex items-center justify-center rounded-md overflow-hidden"
                    ondragover="handleDragOver(event)" ondrop="handleDrop(event, 'image1')">
                    <img id="image1-preview" src="/user/template/images/proyectos/{{ $topProyAdmin->img1 }}" alt="Foto 1"
                        class="w-full h-full object-cover" />
                    <input type="file" name="img1" id="image1"
                        class="absolute top-0 right-0 opacity-0 cursor-pointer" accept="image/*"
                        onchange="previewImage(event, 'image1-preview')" />
                    <label for="image1"
                        class="absolute top-2 right-2 p-2 bg-gray-700 bg-opacity-50 text-white rounded-full cursor-pointer">
                        ✏️
                    </label>
                </div>
            </div>

            <!-- Segunda Imagen -->
            <div class="flex flex-col gap-3">
                <label class="text-base font-medium">Segunda imagen</label>
                <div id="image2-upload"
                    class="relative border-2 border-dashed border-gray-300 w-full aspect-[16/9] flex items-center justify-center rounded-md overflow-hidden"
                    ondragover="handleDragOver(event)" ondrop="handleDrop(event, 'image2')">
                    <img id="image2-preview" src="/user/template/images/proyectos/{{ $topProyAdmin->img2 }}" alt="Foto 2"
                        class="w-full h-full object-cover" />
                    <input type="file" name="img2" id="image2"
                        class="absolute top-0 right-0 opacity-0 cursor-pointer" accept="image/*"
                        onchange="previewImage(event, 'image2-preview')" />
                    <label for="image2"
                        class="absolute top-2 right-2 p-2 bg-gray-700 bg-opacity-50 text-white rounded-full cursor-pointer">
                        ✏️
                    </label>
                </div>
            </div>

            <!-- Descripción -->
            <div class="flex md:col-span-2 justify-center pt-2">
                <div class="w-full max-w-[800px]">
                    <label for="description" class="block pb-2">Descripción</label>
                    <textarea id="description" name="description" rows="6" maxlength="65535"
                        class="w-full p-2 h-[200px] border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Escribe una descripción de los proyectos...">{!! $topProyAdmin->descripcion !!}</textarea>
                    <p class="text-sm text-gray-500 mt-1" id="char-count">65 535 caracteres restantes</p>
                </div>
            </div>
        </div>

        <!-- Botones Guardar y Cancelar -->
        <div class="flex justify-center mt-4 gap-2">
            <button type="submit" class="py-2 px-4 bg-green-500 text-white rounded-lg hover:bg-green-600">
                Guardar
            </button>
            <a href="{{ route('admin-principal') }}" class="py-2 px-4 bg-red-500 text-white rounded-lg hover:bg-red-600">
                Cancelar
            </a>
        </div>
    </form>

    @if (session('message'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Actualización exitosa',
                text: 'Los datos han sido actualizados correctamente en el sistema',
                showConfirmButton: true,
                confirmButtonText: 'Aceptar',
                customClass: {
                    confirmButton: 'bg-green-500 text-white hover:bg-green-600 focus:ring-2 focus:ring-green-300 rounded-lg py-2 px-4'
                }
            });
        </script>
    @endif
@endsection

@section('script')
    <script>
        // Función para previsualizar la imagen seleccionada
        function previewImage(event, previewId) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById(previewId).src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }

        // Funciones de Drag & Drop
        function handleDragOver(event) {
            event.preventDefault();
        }

        function handleDrop(event, inputId) {
            event.preventDefault();
            const inputElement = document.getElementById(inputId);
            if (event.dataTransfer.files && event.dataTransfer.files[0]) {
                inputElement.files = event.dataTransfer.files;
                previewImage({
                    target: inputElement
                }, inputId + '-preview');
            }
        }

        // Actualización del contador de caracteres con TinyMCE (si es que usas TinyMCE)
        document.addEventListener('DOMContentLoaded', () => {
            const charCount = document.getElementById('char-count');

            const updateCharCount = () => {
                // Obtener el contenido del editor de TinyMCE (solo texto)
                const content = tinymce.get('description').getContent({
                    format: 'text'
                });
                const remainingChars = 65535 - content.length;
                const formattedChars = remainingChars.toLocaleString('en-US').replace(/,/g, ' ');
                charCount.textContent = `${formattedChars} caracteres restantes`;
            };

            tinymce.init({
                selector: '#description',
                language: 'es_MX',
                branding: false,
                menubar: false,
                relative_urls: false,
                remove_script_host: false,
                plugins: 'autolink lists link image charmap preview anchor code',
                toolbar: 'undo redo | formatselect | bold italic underline forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | removeformat | code',
                statusbar: false,
                link_title: false, // No se mostrará el campo de título en el diálogo de enlace
                link_target_list: [{
                        title: 'Misma ventana',
                        value: '_self'
                    },
                    {
                        title: 'Nueva ventana',
                        value: '_blank'
                    }
                ],
                forced_root_block: 'p',
                forced_root_block_attrs: {
                    style: 'margin-bottom: 1em;'
                },
                setup: (editor) => {
                    editor.on('init', () => {
                        updateCharCount();
                    });
                    editor.on('input', updateCharCount);
                }
            });
        });
    </script>
@endsection
