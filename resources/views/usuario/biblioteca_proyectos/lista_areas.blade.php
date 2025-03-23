@extends('usuario.layout.plantilla')

@section('contenido')
    <section class="bg-white py-14 relative overflow-hidden">
        <!-- Fondos decorativos en tonos neutros -->
        <div class="absolute inset-0 z-0 pointer-events-none">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(220,220,220,0.25),_transparent)]"></div>
            <div class="absolute top-0 left-0 w-40 h-40 bg-gray-300 rounded-full opacity-30"></div>
            <div class="absolute top-8 right-10 w-24 h-24 bg-gray-200 rounded-full opacity-30"></div>
            <div class="absolute top-1/2 left-4 w-16 h-16 bg-gray-100 rounded-full opacity-30 -translate-y-1/2"></div>
            <div class="absolute bottom-10 left-16 w-28 h-28 bg-gray-300 rounded-full opacity-30"></div>
            <div class="absolute bottom-0 right-0 w-36 h-36 bg-gray-200 rounded-full opacity-30"></div>
            <div class="absolute top-[10%] right-0 w-32 h-32 bg-gray-300 rounded-full opacity-30"></div>
            <div class="absolute top-[35%] right-10 w-20 h-20 bg-gray-200 rounded-full opacity-30"></div>
            <div class="absolute top-[60%] right-4 w-24 h-24 bg-gray-100 rounded-full opacity-30"></div>
            <div class="absolute bottom-10 right-16 w-28 h-28 bg-gray-300 rounded-full opacity-30"></div>
            <div class="absolute top-0 right-0 w-48 h-48 bg-gradient-to-br from-gray-300 to-transparent rounded-full opacity-40 blur-2xl"></div>
            <div class="absolute bottom-[-50px] left-[-50px] w-64 h-64 bg-gray-300 rounded-full opacity-30 blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-32 h-32 bg-gray-200 opacity-20 blur-xl transform rotate-45"></div>
        </div>

        <div class="relative z-10 max-w-[85rem] mx-auto px-4 sm:px-6 md:px-8 lg:px-10 xl:px-12">
            <!-- Título centrado -->
            <div class="flex flex-col items-center gap-3 mb-16">
                <h2 class="text-blue-800 font-semibold text-4xl mb-1">Áreas Proyectos</h2>
                <div class="blue-line w-1/3 h-0.5 bg-[#64d423]"></div>
            </div>

            <!-- Contenedor externo que permite overflow visible para las flechas -->
            <div class="relative">
                <!-- Contenedor del slider con overflow-hidden -->
                <div class="relative w-full overflow-hidden">
                    <div id="slider" class="flex transition-transform duration-300">
                        <!-- Se generará dinámicamente en JS -->
                    </div>
                </div>

                <!-- Botón de flecha izquierda, posicionado fuera del slider -->
                <button id="prev"
                    class="hidden absolute z-10 -left-2 sm:-left-3 md:-left-5 lg:-left-6 xl:-left-8 top-1/2 -translate-y-1/2 bg-[#1E5397] rounded-full p-2 shadow hover:bg-[#1E5397]/95">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <!-- Botón de flecha derecha, posicionado fuera del slider -->
                <button id="next"
                    class="hidden absolute z-10 -right-2 sm:-right-3 md:-right-5 lg:-right-6 xl:-right-8 top-1/2 -translate-y-1/2 bg-[#1E5397] rounded-full p-2 shadow hover:bg-[#1E5397]/95">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
    </section>

    <script>
        // Datos de Blade a JS
        const areasProyecto = @json($areasProyecto);

        // Determina cuántos ítems por slide según el ancho de pantalla:
        // - Para pantallas menores a 640px (sm hacia abajo) se muestra 1 elemento
        // - Para pantallas de 640px hasta 1280px se muestran 4 elementos
        // - Para pantallas mayores o iguales a 1280px se muestran 6 elementos
        function getChunkSize() {
            const width = window.innerWidth;
            if (width < 640) {
                return 1;
            } else if (width < 1280) {
                return 4;
            } else {
                return 6;
            }
        }

        // Partir array en chunks
        function chunkArray(array, chunkSize) {
            const result = [];
            for (let i = 0; i < array.length; i += chunkSize) {
                result.push(array.slice(i, i + chunkSize));
            }
            return result;
        }

        // Construye el HTML de cada slide
        // Se agregan gaps y paddings dinámicos en el eje X con las mismas medidas.
        // Si chunkSize es 1 (pantallas sm hacia abajo), se aumenta el padding horizontal.
        function buildSlideHTML(chunk, chunkSize) {
            let gridClass;
            if (chunkSize === 6) {
                gridClass =
                    'grid grid-cols-3 grid-rows-2 gap-6 sm:gap-8 md:gap-10 xl:gap-x-16 px-6 sm:px-8 md:px-10 items-stretch justify-items-stretch';
            } else if (chunkSize === 4) {
                gridClass =
                    'grid grid-cols-2 grid-rows-2 gap-6 sm:gap-8 md:gap-10 px-6 sm:px-8 md:px-10 items-stretch justify-items-stretch';
            } else {
                gridClass =
                    'grid grid-cols-1 grid-rows-1 gap-6 sm:gap-8 md:gap-10 px-12 items-stretch justify-items-stretch';
            }

            let slideHTML = `<div class="w-full flex-none ${gridClass}">`;
            chunk.forEach(area => {
                // Formatea el nombre: minúsculas y reemplaza espacios por "_"
                let formattedName = area.nombreArea.toLowerCase().replace(/\s+/g, '_');
                slideHTML += `
                <a href="/areas_proyectos/${formattedName}" class="block">
                    <div class="
                        relative
                        aspect-[4/3]
                        rounded-lg overflow-hidden
                        bg-white/20 backdrop-blur-md
                        border border-gray-300 shadow-md hover:shadow-xl
                        cursor-pointer transform hover:scale-105
                        transition-transform duration-300
                    ">
                        <img src="/user/template/images/${area.imagen}"
                             alt="${area.nombreArea}"
                             class="w-full h-full object-cover" />
                        <div class="absolute bottom-0 left-0 right-0 bg-[#98C560]/95 p-3">
                            <h3 class="text-center text-lg sm:text-xl font-semibold text-white">
                                ${area.nombreArea}
                            </h3>
                        </div>
                    </div>
                </a>
            `;
            });
            slideHTML += `</div>`;
            return slideHTML;
        }

        // Variables del slider
        let currentSlide = 0;
        let totalSlides = 0;
        let chunkSize = getChunkSize();
        let chunks = [];

        const slider = document.getElementById('slider');
        const prevBtn = document.getElementById('prev');
        const nextBtn = document.getElementById('next');

        // Construye y dibuja los slides
        function buildSlider() {
            chunkSize = getChunkSize();
            chunks = chunkArray(areasProyecto, chunkSize);

            currentSlide = 0;
            totalSlides = chunks.length;
            slider.innerHTML = '';

            chunks.forEach(chunk => {
                slider.innerHTML += buildSlideHTML(chunk, chunkSize);
            });

            slider.style.transform = 'translateX(0)';
            updateArrows();
        }

        // Actualiza la visibilidad de las flechas
        function updateArrows() {
            if (totalSlides <= 1) {
                prevBtn.classList.add('hidden');
                nextBtn.classList.add('hidden');
                return;
            }
            prevBtn.classList.remove('hidden');
            nextBtn.classList.remove('hidden');

            if (currentSlide === 0) {
                prevBtn.classList.add('hidden');
            }
            if (currentSlide === totalSlides - 1) {
                nextBtn.classList.add('hidden');
            }
        }

        function goPrev() {
            if (currentSlide > 0) {
                currentSlide--;
                slider.style.transform = `translateX(-${currentSlide * 100}%)`;
                updateArrows();
            }
        }

        function goNext() {
            if (currentSlide < totalSlides - 1) {
                currentSlide++;
                slider.style.transform = `translateX(-${currentSlide * 100}%)`;
                updateArrows();
            }
        }

        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                const newChunkSize = getChunkSize();
                if (newChunkSize !== chunkSize) {
                    buildSlider();
                }
            }, 200);
        });

        document.addEventListener('DOMContentLoaded', () => {
            buildSlider();
            prevBtn.addEventListener('click', goPrev);
            nextBtn.addEventListener('click', goNext);
        });
    </script>
@endsection