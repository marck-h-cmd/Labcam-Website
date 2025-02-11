<?php $__env->startSection('contenido'); ?>
    <div class="text-center">
        <h2 class="text-blue-800 font-semibold text-4xl">Slider</h2>
        <div class="w-72 h-[1.1px] bg-green-400 mx-auto mt-1"></div>
    </div>

    <div class="grid grid-cols-2 gap-8 items-center justify-center py-7">
        <!-- Primera Imagen -->
        <div class="flex flex-col items-center">
            <label class="block pb-2">Primera imagen</label>
            <div class="relative">
                <!-- Imagen con tamaño fijo -->
                <img id="image1-preview" src="<?php echo e(asset('/user/template/images/carrusel/carrusel_01.png')); ?>" alt="Foto 1"
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
                <img id="image2-preview" src="<?php echo e(asset('/user/template/images/carrusel/carrusel_02.jpg')); ?>" alt="Foto 2"
                    class="w-[500px] h-80 object-cover rounded-md" />
                <input type="file" id="image2" class="absolute top-0 right-0 opacity-0 cursor-pointer"
                    accept="image/*" onchange="previewImage(event, 'image2-preview')" />
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
                    <img id="image3-preview" src="<?php echo e(asset('/user/template/images/carrusel/carrusel_03.jpg')); ?>"
                        alt="Foto 3" class="w-[500px] h-80 object-cover rounded-md" />
                    <input type="file" id="image3" class="absolute top-0 right-0 opacity-0 cursor-pointer"
                        accept="image/*" onchange="previewImage(event, 'image3-preview')" />
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
        <button class="py-2 px-4 bg-green-500 text-white rounded-lg hover:bg-green-600"
            onclick="saveImages()">Guardar</button>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
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

        // Función para guardar las imágenes (puedes agregar lógica para enviar las imágenes al backend)
        function saveImages() {
            // Aquí puedes manejar el envío de datos, por ejemplo con AJAX o un formulario
            alert("¡Imágenes guardadas!");
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrador.dashboard.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CURSOS EXTRAS\PAGINA LABCAM\PROYECTO COMPARTIDO\Labcam-Website\resources\views/administrador/home.blade.php ENDPATH**/ ?>