<?php $__env->startSection('contenido'); ?>
    
    <section class="mt-0">
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div
                class="relative overflow-hidden transition-all duration-500 ease-in-out h-[400px] sm:h-[500px] md:h-[600px] lg:h-[700px]">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="/user/template/images/carrusel/<?php echo e($slider->img1); ?>"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="/user/template/images/carrusel/<?php echo e($slider->img2); ?>"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="...">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="/user/template/images/carrusel/<?php echo e($slider->img3); ?>"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="...">
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full bg-white" aria-current="true" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-white" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-white" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="2"></button>
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/90 group-hover:bg-white/70 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                    <svg class="w-4 h-4 text-black rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/90 group-hover:bg-white/70 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                    <svg class="w-4 h-4 text-black rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </section>

    
    <section class="py-12">
        <div class="flex flex-col items-center gap-3 mb-12">
            <h2 class="text-blue-800 font-semibold text-4xl mb-1">Noticias</h2>
            <div class="blue-line w-1/3 h-0.5 bg-[#64d423]"></div>
        </div>

        <div class="px-10 max-w-screen-2xl mx-auto grid grid-cols-1 lg:grid-cols-3 sm:grid-cols-2 gap-10 lg:gap-14">
            <?php $__currentLoopData = $noticias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div
                    class="relative w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl group overflow-hidden">
                    <a href="#" class="w-full h-full block">
                        <img src="/user/template/<?php echo e($noticia->imagen); ?>" alt="<?php echo e($noticia->titulo); ?>"
                            class="w-full h-[200px] object-cover rounded-t-xl" />
                        <div class="px-4 py-6 w-full min-h-[150px]">
                            <span class="text-gray-600 mr-3 uppercase text-base">
                                <?php echo e(\Carbon\Carbon::parse($noticia->fecha)->locale('es')->translatedFormat('d F, Y')); ?>

                            </span>
                            <p class="text-lg font-bold text-black truncate block capitalize mt-3 select-none">
                                <?php echo e($noticia->titulo); ?>

                            </p>
                            <p class="text-base font-normal text-black cursor-auto my-3 break-words select-none">
                                <?php echo e(Str::limit($noticia->contenido, 120, '...')); ?>

                            </p>
                        </div>
                    </a>
                    <!-- Texto de hover con animación desde abajo y fondo difuminado -->
                    <div
                        class="absolute inset-0 bg-[#1E5397] bg-opacity-35 flex items-center justify-center opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 ease-in-out rounded-xl backdrop-blur-md">
                        <a href="<?php echo e(route('noticias.show', $noticia->id)); ?>"
                            class="text-white text-base font-semibold select-none bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg cursor-pointer">
                            Leer más
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="mt-10 flex justify-center">
            <a href="<?php echo e(route('noticias')); ?>"
                class="bg-[#98C560] p-4 rounded-xl text-sm text-white hover:bg-[#a6d073] cursor-pointer">
                VER MÁS NOTICIAS
            </a>
        </div>
    </section>


    
    <section class="bg-blue-900 text-white py-20 relative overflow-hidden">
        <div class="mx-auto px-5 relative">
            <!-- Contenido principal -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center relative">
                <div class="ml-10">
                    <!-- Título -->
                    <div class="mb-7">
                        <h2 class="text-5xl font-bold border-b-4 border-blue-300 inline-block pb-2 px-12">
                            Proyectos
                        </h2>
                    </div>
                    <!-- Texto descriptivo -->
                    <div>
                        <div class="mb-7 text-lg">
                            <?php echo e(new \Illuminate\Support\HtmlString($topProyecto->descripcion)); ?>

                        </div>
                        <button
                            class="bg-[#98C560] text-blue-900 font-bold text-lg px-8 py-4 rounded-lg hover:bg-green-500 transition duration-300">
                            VER TODOS LOS PROYECTOS
                        </button>
                    </div>
                </div>

                <!-- Contenedor de imágenes -->
                <div class="relative w-full h-[600px] flex items-center justify-center">
                    <!-- Imagen inferior -->
                    <img class="w-[450px] h-[400px] shadow-[0_20px_40px_rgba(0,0,0,0.3)] absolute top-40 left-4 rounded-lg transition-all duration-500 ease-in-out hover:scale-110 hover:z-20 hover:translate-x-16 hover:translate-y-8"
                        src="/user/template/images/proyectos/<?php echo e($topProyecto->img2); ?>">

                    <!-- Imagen superior -->
                    <img class="w-[450px] h-[400px] shadow-[0_20px_40px_rgba(0,0,0,0.3)] absolute top-2 left-40 rounded-lg transition-all duration-500 ease-in-out hover:scale-110 hover:z-10 hover:-translate-x-16 hover:-translate-y-8"
                        src="/user/template/images/proyectos/<?php echo e($topProyecto->img1); ?>">
                </div>

            </div>
        </div>
    </section>

    
    <section class="py-12">
        <div class="flex flex-col items-center gap-3 mb-12">
            <h2 class="text-blue-800 font-semibold text-4xl mb-1">Eventos</h2>
            <div class="blue-line w-1/3 h-0.5 bg-[#64d423]"></div>
        </div>

        <div class="px-10 max-w-screen-2xl mx-auto grid grid-cols-1 lg:grid-cols-3 sm:grid-cols-2 gap-10 lg:gap-14">
            <?php $__currentLoopData = $eventos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div
                    class="relative w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl group overflow-hidden">
                    <a href="#" class="w-full h-full block">
                        <img src="/user/template/<?php echo e($evento->imagen); ?>" alt="<?php echo e($evento->titulo); ?>"
                            class="w-full h-[200px] object-cover rounded-t-xl" />
                        <div class="px-4 py-6 w-full min-h-[150px]">
                            <span class="text-gray-600 mr-3 uppercase text-base">
                                <?php echo e(\Carbon\Carbon::parse($evento->fecha)->locale('es')->translatedFormat('d F, Y')); ?>

                            </span>
                            <p class="text-lg font-bold text-black truncate block capitalize mt-3 select-none">
                                <?php echo e($evento->titulo); ?>

                            </p>
                            <p class="text-base font-normal text-black cursor-auto my-3 break-words select-none">
                                <?php echo e(Str::limit(strip_tags($evento->descripcion ?? ''), 120, '...')); ?>

                            </p>
                        </div>
                    </a>
                    <!-- Texto de hover con animación desde abajo y fondo difuminado -->
                    <div
                        class="absolute inset-0 bg-[#1E5397] bg-opacity-35 flex items-center justify-center opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 ease-in-out rounded-xl backdrop-blur-md">
                        <a href="<?php echo e(route('eventos.show', $evento->id)); ?>"
                            class="text-white text-base font-semibold select-none bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg cursor-pointer">
                            Leer más
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="mt-10 flex justify-center">
            <a href="<?php echo e(route('eventos')); ?>"
                class="bg-[#98C560] p-4 rounded-xl text-sm text-white hover:bg-[#a6d073] cursor-pointer">
                VER MÁS EVENTOS
            </a>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('usuario.layout.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CURSOS EXTRA ACADEMICOS\PAGINA LABCAM\PROYECTO\Labcam-Website\resources\views/usuario/index.blade.php ENDPATH**/ ?>