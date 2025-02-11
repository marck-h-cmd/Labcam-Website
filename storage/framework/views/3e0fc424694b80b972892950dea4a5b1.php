<?php $__env->startSection('contenido'); ?>
    <div class="main-title flex flex-col items-center gap-3 mb-8">
        <div class="title text-2xl font-semibold text-[#2e5382]">Home Slider</div>
        <div class="blue-line w-1/5 h-0.5 bg-[#64d423]"></div>
    </div>

    <form class=" p-8" action="<?php echo e(route('admin-homeSliderUpdate')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center p-10 bg-slate-200 rounded-lg">
            <!-- Primera Imagen -->
            <div class="flex flex-col gap-3">
                <label class="text-base font-medium">Primera imagen</label>
                <div class="relative">
                    <img id="image1-preview" src="/user/template/images/carrusel/<?php echo e($sliderAdmin->img1); ?>" alt="Foto 1"
                        class="w-full h-auto aspect-[16/9] object-cover rounded-md border border-gray-300" />
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
                <div class="relative">
                    <img id="image2-preview" src="/user/template/images/carrusel/<?php echo e($sliderAdmin->img2); ?>" alt="Foto 2"
                        class="w-full h-auto aspect-[16/9] object-cover rounded-md border border-gray-300" />
                    <input type="file" name="img2" id="image2"
                        class="absolute top-0 right-0 opacity-0 cursor-pointer" accept="image/*"
                        onchange="previewImage(event, 'image2-preview')" />
                    <label for="image2"
                        class="absolute top-2 right-2 p-2 bg-gray-700 bg-opacity-50 text-white rounded-full cursor-pointer">
                        ✏️
                    </label>
                </div>
            </div>

            <!-- Tercera Imagen -->
            <div class="flex flex-col gap-3 relative md:left-1/2">
                <label class="text-base font-medium">Tercera imagen</label>
                <div class="relative">
                    <img id="image3-preview" src="/user/template/images/carrusel/<?php echo e($sliderAdmin->img3); ?>" alt="Foto 3"
                        class="w-full h-auto aspect-[16/9] object-cover rounded-md border border-gray-300" />
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

        <!-- Botón Guardar -->
        <div class="flex justify-center mt-6">
            <button type="submit" class="py-2 px-4 bg-green-500 text-white rounded-lg hover:bg-green-600">Guardar</button>
        </div>
    </form>

    <?php if(session('message')): ?>
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
    <?php endif; ?>
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
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrador.dashboard.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CURSOS EXTRA ACADEMICOS\PAGINA LABCAM\PROYECTO\Labcam-Website\resources\views/administrador/homeSlider.blade.php ENDPATH**/ ?>