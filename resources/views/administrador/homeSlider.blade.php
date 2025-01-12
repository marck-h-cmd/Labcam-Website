@extends('administrador.dashboard.plantilla')

@section('contenido')
    <div class="text-center">
        <h2 class="text-blue-800 font-semibold text-4xl">Slider</h2>
        <div class="w-72 h-[1.1px] bg-green-400 mx-auto mt-1"></div>
    </div>

    <form action="{{ route('admin-homeSliderUpdate') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-2 gap-8 items-center justify-center py-7">
            <!-- Primera Imagen -->
            <div class="flex flex-col items-center">
                <label class="block pb-2">Primera imagen</label>
                <div class="relative">
                    <!-- Imagen con tamaño fijo -->
                    <img id="image1-preview" src="/user/template/images/carrusel/{{ $sliderAdmin->img1 }}" alt="Foto 1"
                        class="w-[500px] h-80 object-cover rounded-md" />
                    <!-- Icono de lápiz para editar -->
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
            <div class="flex flex-col items-center">
                <label class="block pb-2">Segunda imagen</label>
                <div class="relative">
                    <img id="image2-preview" src="/user/template/images/carrusel/{{ $sliderAdmin->img2 }}" alt="Foto 2"
                        class="w-[500px] h-80 object-cover rounded-md" />
                    <input type="file" name="img2" id="image2"
                        class="absolute top-0 right-0 opacity-0 cursor-pointer" accept="image/*"
                        onchange="previewImage(event, 'image2-preview')" />
                    <label for="image2"
                        class="absolute top-2 right-2 p-2 bg-gray-700 bg-opacity-50 text-white rounded-full cursor-pointer">
                        ✏️
                    </label>
                </div>
            </div>

            <!-- Tercera Imagen (centrada en la segunda fila) -->
            <div class="col-span-2 flex justify-center pt-2">
                <div class="flex flex-col items-center">
                    <label class="block pb-2">Tercera imagen</label>
                    <div class="relative">
                        <img id="image3-preview" src="/user/template/images/carrusel/{{ $sliderAdmin->img3 }}"
                            alt="Foto 3" class="w-[500px] h-80 object-cover rounded-md" />
                        <input type="file" name="img3" id="image3"
                            class="absolute top-0 right-0 opacity-0 cursor-pointer" accept="image/*"
                            onchange="previewImage(event, 'image3-preview')" />
                        <label for="image3"
                            class="absolute top-2 right-2 p-2 bg-gray-700 bg-opacity-50 text-white rounded-full cursor-pointer">
                            ✏️
                        </label>
                    </div>
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
                title: '¡Imágenes actualizadas correctamente!',
                text: 'Tus imágenes han sido actualizadas correctamente en el sistema.',
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
