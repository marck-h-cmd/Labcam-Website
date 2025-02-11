<?php $__env->startSection('contenido'); ?>
    <!-- Menú -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 bg-gray-200 mx-4 sm:mx-6 md:mx-8 lg:mx-14 mb-6 gap-4">
        <div class="cursor-pointer <?php echo e(request()->routeIs(['', 'capital_index']) ? 'active' : ''); ?>">
            <a
                class="flex justify-center py-4 px-4 w-full h-full text-gray-700 font-medium hover:bg-blue-600 hover:text-white rounded-md">
                <span class="text-sm">Investigadores</span>
            </a>
        </div>
        <div class="cursor-pointer <?php echo e(request()->routeIs(['', 'capital_index']) ? 'active' : ''); ?>">
            <a
                class="flex justify-center py-4 px-4 w-full h-full text-gray-700 font-medium hover:bg-blue-600 hover:text-white rounded-md">
                <span class="text-sm">Egresados</span>
            </a>
        </div>
        <div class="cursor-pointer <?php echo e(request()->routeIs(['', 'capital_index']) ? 'active' : ''); ?>">
            <a
                class="flex justify-center py-4 px-4 w-full h-full text-gray-700 font-medium hover:bg-blue-600 hover:text-white rounded-md">
                <span class="text-sm">Tesistas</span>
            </a>
        </div>
        <div class="cursor-pointer <?php echo e(request()->routeIs(['', 'capital_index']) ? 'active' : ''); ?>">
            <a
                class="flex justify-center py-4 px-4 w-full h-full text-gray-700 font-medium hover:bg-blue-600 hover:text-white rounded-md">
                <span class="text-sm">Pasantes</span>
            </a>
        </div>
        <div class="cursor-pointer <?php echo e(request()->routeIs(['', 'capital_index']) ? 'active' : ''); ?>">
            <a
                class="flex justify-center py-4 px-4 w-full h-full text-gray-700 font-medium hover:bg-blue-600 hover:text-white rounded-md">
                <span class="text-sm">Aliados</span>
            </a>
        </div>
    </div>
    

    <div>
        <?php echo $__env->yieldContent('sub_contenido'); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrador.dashboard.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CURSOS EXTRA ACADEMICOS\PAGINA LABCAM\PROYECTO\Labcam-Website\resources\views/administrador/organizacion/capital_humano/plantilla_capital.blade.php ENDPATH**/ ?>