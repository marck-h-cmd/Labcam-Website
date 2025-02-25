@extends('administrador.dashboard.plantilla')

@section('contenido')
    <div class="main-title flex flex-col items-center gap-3 mb-8">
        <div class="title text-2xl font-semibold text-[#2e5382]">Home Slider</div>
        <div class="blue-line w-1/5 h-0.5 bg-[#64d423]"></div>
    </div>

    <form class="p-8" action="{{ route('admin-homeSliderUpdate') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center p-10 bg-slate-200 rounded-lg">
            <!-- Primera Imagen -->
            <div class="flex flex-col gap-3">
                <label class="text-base font-medium">Primera imagen</label>
                <div id="image1-upload"
                    class="border-2 border-dashed border-gray-300 w-full aspect-[16/9] flex items-center justify-center relative rounded-md overflow-hidden"
                    ondragover="handleDragOver(event)" ondrop="handleDrop(event, 'image1')">
                    <img id="image1-preview" src="/user/template/images/carrusel/{{ $sliderAdmin->img1 }}" alt="Foto 1"
                        class="w-full h-full object-cover" />
                    <input type="file" name="img1" id="image1" class="hidden" accept="image/*"
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
                    class="border-2 border-dashed border-gray-300 w-full aspect-[16/9] flex items-center justify-center relative rounded-md overflow-hidden"
                    ondragover="handleDragOver(event)" ondrop="handleDrop(event, 'image2')">
                    <img id="image2-preview" src="/user/template/images/carrusel/{{ $sliderAdmin->img2 }}" alt="Foto 2"
                        class="w-full h-full object-cover" />
                    <input type="file" name="img2" id="image2" class="hidden" accept="image/*"
                        onchange="previewImage(event, 'image2-preview')" />
                    <label for="image2"
                        class="absolute top-2 right-2 p-2 bg-gray-700 bg-opacity-50 text-white rounded-full cursor-pointer">
                        ✏️
                    </label>
                </div>
            </div>

            <!-- Tercera Imagen -->
            <div class="flex flex-col gap-3 relative md:left-1/2 md:-translate-x-1/2">
                <label class="text-base font-medium">Tercera imagen</label>
                <div id="image3-upload"
                    class="border-2 border-dashed border-gray-300 w-full aspect-[16/9] flex items-center justify-center relative rounded-md overflow-hidden"
                    ondragover="handleDragOver(event)" ondrop="handleDrop(event, 'image3')">
                    <img id="image3-preview" src="/user/template/images/carrusel/{{ $sliderAdmin->img3 }}" alt="Foto 3"
                        class="w-full h-full object-cover" />
                    <input type="file" name="img3" id="image3" class="hidden" accept="image/*"
                        onchange="previewImage(event, 'image3-preview')" />
                    <label for="image3"
                        class="absolute top-2 right-2 p-2 bg-gray-700 bg-opacity-50 text-white rounded-full cursor-pointer">
                        ✏️
                    </label>
                </div>
            </div>
        </div>

        <!-- Botones Guardar y Cancelar -->
        <div class="flex justify-center mt-6 gap-2">
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
                title: '¡Imágenes actualizadas correctamente!',
                text: 'Tus imágenes han sido actualizadas correctamente en el sistema.',
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
        // Previsualiza la imagen seleccionada
        function previewImage(event, previewId) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById(previewId);
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }

        // Drag & Drop
        function handleDragOver(event) {
            event.preventDefault();
        }

        function handleDrop(event, inputId) {
            event.preventDefault();
            const inputElement = document.getElementById(inputId);
            if (event.dataTransfer.files && event.dataTransfer.files[0]) {
                // Asigna el archivo arrastrado al input
                inputElement.files = event.dataTransfer.files;
                // Llama a la función de vista previa
                previewImage({
                    target: inputElement
                }, inputId + '-preview');
            }
        }
    </script>
@endsection
