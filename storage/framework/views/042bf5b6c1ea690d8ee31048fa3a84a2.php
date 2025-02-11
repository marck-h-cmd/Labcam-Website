<?php if($paginator->hasPages()): ?>
    <!-- Paginación -->
    <div class="flex justify-center mt-8">
        <nav class="inline-flex shadow rounded-lg overflow-hidden" aria-label="Pagination">
            <!-- Botón "Anterior" -->
            <?php if($paginator->onFirstPage()): ?>
                <span class="px-4 py-2 bg-gray-100 text-gray-500 cursor-not-allowed">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </span>
            <?php else: ?>
                <a href="<?php echo e($paginator->previousPageUrl()); ?>" class="px-4 py-2 bg-gray-100 text-gray-500 hover:bg-gray-200 hover:text-gray-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
            <?php endif; ?>

            <!-- Números de página -->
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(is_string($element)): ?>
                    <span class="px-4 py-2 bg-gray-100 text-gray-700"><?php echo e($element); ?></span>
                <?php endif; ?>

                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $paginator->currentPage()): ?>
                            <span class="px-4 py-2 bg-blue-500 text-white font-medium"><?php echo e($page); ?></span>
                        <?php else: ?>
                            <a href="<?php echo e($url); ?>" class="px-4 py-2 bg-gray-100 text-gray-700 hover:bg-blue-500 hover:text-white transition font-medium"><?php echo e($page); ?></a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <!-- Botón "Siguiente" -->
            <?php if($paginator->hasMorePages()): ?>
                <a href="<?php echo e($paginator->nextPageUrl()); ?>" class="px-4 py-2 bg-gray-100 text-gray-500 hover:bg-gray-200 hover:text-gray-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            <?php else: ?>
                <span class="px-4 py-2 bg-gray-100 text-gray-500 cursor-not-allowed">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </span>
            <?php endif; ?>
        </nav>
    </div>
<?php endif; ?>
<?php /**PATH D:\CURSOS EXTRA ACADEMICOS\PAGINA LABCAM\PROYECTO\Labcam-Website\resources\views/vendor/pagination/tailwind.blade.php ENDPATH**/ ?>