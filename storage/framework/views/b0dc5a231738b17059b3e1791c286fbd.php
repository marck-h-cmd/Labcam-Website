<?php $__env->startSection('contenido'); ?>

<section class="pt-16 pb-2">
    <div class="text-center">
        <h2 class="text-blue-800 font-semibold text-5xl mt-20">Próximos Eventos</h2>
        <div class="w-[500px] h-[1.1px] bg-green-400 mx-auto mt-1"></div>
    </div>

     <!-- Mes, Año y Navegación -->
    <div class="flex items-center justify-center mt-6">
        <!-- Botón de mes anterior -->
        <a href="<?php echo e(route('eventos', ['month' => $month == 1 ? 12 : $month - 1, 'year' => $month == 1 ? $year - 1 : $year])); ?>" class="text-gray-500 hover:text-gray-800 transition mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </a>

        <!-- Mostrar mes y año actual -->
        <span class="text-lg font-semibold text-gray-700"><?php echo e(\Carbon\Carbon::createFromDate($year, $month, 1)->format('F, Y')); ?></span>

        <!-- Botón de mes siguiente -->
        <a href="<?php echo e(route('eventos', ['month' => $month == 12 ? 1 : $month + 1, 'year' => $month == 12 ? $year + 1 : $year])); ?>" class="text-gray-500 hover:text-gray-800 transition ml-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </a>
    </div>

    <!-- Botones de categoría -->
    <div class="flex justify-center mt-4 space-x-4">
        <!-- Botón de categoría "Todo" -->
        <a href="<?php echo e(route('eventos', ['category' => 'todo', 'month' => $month, 'year' => $year])); ?>" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-blue-500 hover:text-white transition">Todo</a>

        <!-- Botón de categoría "Pasados" -->
        <a href="<?php echo e(route('eventos', ['category' => 'pasado', 'month' => $month, 'year' => $year])); ?>" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-blue-500 hover:text-white transition">Pasados</a>

        <!-- Botón de categoría "Futuros" -->
        <a href="<?php echo e(route('eventos', ['category' => 'futuro', 'month' => $month, 'year' => $year])); ?>" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-blue-500 hover:text-white transition">Futuros</a>
    </div>


    <div class="bb ye ki xn vq jb jo">
        <div class="wc qf pn xo zf iq">
          <?php $__currentLoopData = $eventos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="animate_top sg vk rm xm">
                    <div class="c rc i z-1 pg">
                        <img class="w-full" src="<?php echo e(asset('storage/' . $evento->imagen)); ?>" alt="Blog" />

                        <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                            <a href="<?php echo e(route('eventos.show', $evento->id)); ?>" class="vc ek rg lk gh sl ml il gi hi">Leer más</a>
                        </div>
                    </div>

                    <div class="yh">
                        <div class="tc uf wf ag jq">
                            <div class="tc wf ag">
                                <img src="/user/template/images/icon-man.svg" alt="User" />
                                <p><?php echo e($evento->autor); ?></p>
                            </div>
                            <div class="tc wf ag">
                                <img src="/user/template/images/icon-calender.svg" alt="Calender" />
                                <p><?php echo e(\Carbon\Carbon::parse($evento->fecha)->format('d/m/Y')); ?>

                                </p>
                            </div>
                        </div>
                        <h4 class="ek tj ml il kk wm xl eq lb">
                            <a href="<?php echo e(route('eventos.show', $evento->id)); ?>"><?php echo e($evento->titulo); ?></a>
                        </h4>
                        <p class="text-sm text-gray-600 mt-1">
                           Categoría:
                            <?php if($evento->categoria === 'pasado'): ?>
                                <span class="text-red-500 font-medium"><?php echo e($evento->categoria); ?></span>
                            <?php elseif($evento->categoria === 'futuro'): ?>
                                <span class="text-green-500 font-medium"><?php echo e($evento->categoria); ?></span>
                             <?php endif; ?>
                        </p>
                   </div>
                </div>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <!-- Paginación -->
    <div class="flex justify-center mt-8">
            <?php echo e($eventos->links()); ?>

     </div>
</section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('usuario.layout.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CURSOS EXTRA ACADEMICOS\PAGINA LABCAM\PROYECTO\Labcam-Website\resources\views/usuario/Investigacion/eventos.blade.php ENDPATH**/ ?>