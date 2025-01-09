@extends('administrador.dashboard.plantilla')

@section('contenido')
    <div class="text-center">
        <h2 class="text-blue-800 font-semibold text-4xl">Proyectos</h2>
        <div class="w-72 h-[1.1px] bg-green-400 mx-auto mt-1"></div>
    </div>

    <form action="{{ route('admin-homeProyectosUpdate') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-2 gap-8 items-center justify-center py-7">
            <!-- Primera Imagen -->
            <div class="flex flex-col items-center">
                <label class="block pb-2">Primera imagen</label>
                <div class="relative">
                    <!-- Imagen con tamaño fijo -->
                    <img id="image1-preview" src="/user/template/images/proyectos/{{ $topProyAdmin->img1 }}" alt="Foto 1"
                        class="w-[500px] h-80 object-cover rounded-md" />
                    <!-- Icono de lápiz para editar -->
                    <input type="file" id="image1" class="absolute top-0 right-0 opacity-0 cursor-pointer"
                        accept="image/*" onchange="previewImage(event, 'image1-preview')" />
                    <label for="image1"
                        class="absolute top-2 right-2 p-2 bg-gray-700 bg-opacity-50 text-white rounded-full cursor-pointer">
                        ✏️
                    </label>
                </div>
            </div>

            <!-- Segunda Imagen -->
            <div class="flex flex-col items-center">
                <label class="block pb-2">Segunda imagen</label>
                <div class="relative">
                    <img id="image2-preview" src="/user/template/images/proyectos/{{ $topProyAdmin->img2 }}" alt="Foto 2"
                        class="w-[500px] h-80 object-cover rounded-md" />
                    <input type="file" id="image2" class="absolute top-0 right-0 opacity-0 cursor-pointer"
                        accept="image/*" onchange="previewImage(event, 'image2-preview')" />
                    <label for="image2"
                        class="absolute top-2 right-2 p-2 bg-gray-700 bg-opacity-50 text-white rounded-full cursor-pointer">
                        ✏️
                    </label>
                </div>
            </div>

            <!-- Descripción -->
            <div class="col-span-2 flex justify-center pt-2">
                <div class="w-full max-w-[800px]"> <!-- Se ajustó el ancho máximo a 800px -->
                    <label for="description" class="block pb-2">Descripción</label>
                    <textarea id="description" name="description" rows="6" maxlength="65535"
                        class="w-full p-2 h-[200px] border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Escribe una descripción de los proyectos...">{!! $topProyAdmin->descripcion !!}</textarea>
                    <p class="text-sm text-gray-500 mt-1" id="char-count">65 535 caracteres restantes</p>
                </div>
            </div>
        </div>
        <!-- Botón Guardar -->
        <div class="flex justify-center mt-4">
            <button type="submit" class="py-2 px-4 bg-green-500 text-white rounded-lg hover:bg-green-600">Guardar</button>
        </div>
    </form>

    @if (session('message'))
        <script>
            Swal.fire({
                icon: 'success', // 'success', 'error', 'warning', 'info', 'question'
                title: '¡Datos actualizados correctamente!',
                text: 'Los datos han sido actualizados correctamente en el sistema.',
                showConfirmButton: true, // Mostrar el botón de confirmación
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
        document.addEventListener('DOMContentLoaded', () => {
            const charCount = document.getElementById('char-count');

            const updateCharCount = () => {
                // Obtener el contenido del editor usando la API de TinyMCE
                const content = tinymce.get('description').getContent({
                    format: 'text'
                }); // Solo texto
                const remainingChars = 65535 - content.length;

                // Formatear número con espacio como separador de miles
                const formattedChars = remainingChars.toLocaleString('en-US').replace(/,/g, ' ');
                charCount.textContent = `${formattedChars} caracteres restantes`;
            };

            // Actualizar el contador al cargar la página
            tinymce.init({
                selector: '#description',
                language: 'es_MX',
                branding: false,
                menubar: false,
                toolbar: 'undo redo | forecolor | bold italic | alignleft aligncenter alignright alignjustify | outdent indent',
                statusbar: false,
                forced_root_block: 'p', // Asegura que cada bloque sea un párrafo
                forced_root_block_attrs: {
                    style: 'margin-bottom: 1em;'
                }, // Espaciado inline entre párrafos
                setup: (editor) => {
                    // Actualizar contador al inicializar
                    editor.on('init', () => {
                        editor.setContent(
                            `{!! $topProyAdmin->descripcion !!}`); // Cargar contenido al editor
                        updateCharCount(); // Actualizar contador al cargar
                    });

                    // Actualizar el contador al escribir
                    editor.on('input', updateCharCount);
                }
            });
        });

        // Función para previsualizar la imagen seleccionada
        function previewImage(event, imageId) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById(imageId).src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
