<?php $__env->startSection('contenido'); ?>
<section class="pt-16 pb-2">
    <div class="text-center">
        <h2 class="text-blue-800 font-semibold text-5xl mt-20">Proyectos</h2>
        <div class="w-72 h-[1.1px] bg-green-400 mx-auto mt-1"></div>
    </div>

    <div class="bb ye ki xn vq jb jo">
        <div class="wc qf pn xo zf iq">
            <?php $__currentLoopData = $proyectos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proyecto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="animate_top sg vk rm xm">
                <div class="c rc i z-1 pg">
                    <img class="w-full" src="<?php echo e(asset('storage/' . $proyecto->imagen)); ?>" alt="Blog" />

                    <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                       <a href="<?php echo e(route('proyectos.show', $proyecto->id)); ?>" class="vc ek rg lk gh sl ml il gi hi">Leer más</a>
                    </div>
                </div>

                <div class="yh">
                    <div class="tc uf wf ag jq">
                            <div class="tc wf ag">
                                <img src="/user/template/images/icon-man.svg" alt="User" />
                                <p><?php echo e($proyecto->autor); ?></p>
                            </div>
                        <div class="tc wf ag">
                            <img src="/user/template/images/icon-calender.svg" alt="Calender" />
                            <p><?php echo e(\Carbon\Carbon::parse($proyecto->fecha_publicacion)->format('d/m/Y')); ?>

                            </p>
                        </div>
                    </div>
                    <h4 class="ek tj ml il kk wm xl eq lb">
                        <a href="<?php echo e(route('proyectos.show', $proyecto->id)); ?>"><?php echo e($proyecto->titulo); ?></a>
                    </h4>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-- Paginación -->
        <div class="flex justify-center mt-8">
            <?php echo e($proyectos->links()); ?>

        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('usuario.layout.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CURSOS EXTRA ACADEMICOS\PAGINA LABCAM\PROYECTO\Labcam-Website\resources\views/usuario/Investigacion/proyectos.blade.php ENDPATH**/ ?>