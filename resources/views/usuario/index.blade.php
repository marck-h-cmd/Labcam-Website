@extends('usuario.layout.plantilla')

@section('contenido')
    {{-- Sección slider --}}
    <section class="mt-0">
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div
                class="relative overflow-hidden transition-all duration-500 ease-in-out h-[400px] sm:h-[500px] md:h-[600px] lg:h-[700px]">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="/user/template/images/carrusel/{{ $slider->img1 }}"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="/user/template/images/carrusel/{{ $slider->img2 }}"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="...">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="/user/template/images/carrusel/{{ $slider->img3 }}"
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

    {{-- Sección noticias --}}
    <section class="py-12">
        <div class="flex flex-col items-center gap-3 mb-12">
            <h2 class="text-blue-800 font-semibold text-4xl mb-1">Noticias</h2>
            <div class="blue-line w-1/3 h-0.5 bg-[#64d423]"></div>
        </div>

        <div class="px-10 max-w-screen-2xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 lg:gap-14">
            @foreach ($noticias as $noticia)
                <!-- Tarjeta como un div normal -->
                <div
                    class="relative w-full bg-white shadow-md rounded-xl duration-500
                            hover:scale-105 hover:shadow-xl group overflow-hidden">

                    <!-- Imagen -->
                    <img src="{{ url('storage/' . $noticia->imagen) }}" alt="{{ $noticia->titulo }}"
                        class="w-full h-[200px] object-cover rounded-t-xl" />

                    <!-- Texto -->
                    <div class="px-4 py-6 w-full min-h-[150px]">
                        <span class="text-gray-600 mr-3 uppercase text-base">
                            {{ \Carbon\Carbon::parse($noticia->fecha)->locale('es')->translatedFormat('d F, Y') }}
                        </span>
                        <p class="text-lg font-bold text-black truncate block capitalize mt-3 select-none">
                            {{ $noticia->titulo }}
                        </p>
                        <!-- Mostrar HTML de la descripción -->
                        @php
                            // Instancia la clase TruncateService usando el namespace completo
                            $truncateService = new \Urodoz\Truncate\TruncateService();
                            // Trunca la descripción a 120 caracteres y agrega '...'
                            $htmlSnippet = $truncateService->truncate($noticia->contenido, 200, '...');
                        @endphp

                        <div class="text-base font-normal text-black cursor-auto my-3 break-words select-none">
                            {!! $htmlSnippet !!}
                        </div>
                    </div>

                    <!-- Overlay con enlace “Leer más” -->
                    <div
                        class="absolute inset-0 bg-[#1E5397] bg-opacity-35 flex items-center justify-center
                                opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0
                                transition-all duration-500 ease-in-out rounded-xl backdrop-blur-md">
                        <a href="{{ route('noticias.show', $noticia->id) }}"
                            class="text-white text-base font-semibold select-none bg-[#98C560]
                                  hover:bg-[#a6d073] px-3 py-2 rounded-lg cursor-pointer">
                            Leer más
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-10 flex justify-center">
            <a href="{{ route('noticias') }}"
                class="bg-[#98C560] p-4 rounded-xl text-lg text-white hover:bg-[#a6d073] cursor-pointer">
                VER MÁS NOTICIAS
            </a>
        </div>
    </section>

    {{-- Sección de Proyectos --}}
    <section class="bg-blue-900 text-white py-20 relative overflow-hidden">
        <!-- Fondo decorativo (puedes ajustar o simplificar) -->
        <div class="absolute inset-0 z-0 pointer-events-none">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(29,78,216,0.25),_transparent)]"></div>
            <div class="absolute top-0 left-0 w-40 h-40 bg-blue-700 rounded-full opacity-30"></div>
            <div class="absolute top-8 right-10 w-24 h-24 bg-blue-500 rounded-full opacity-30"></div>
            <div class="absolute top-1/2 left-4 w-16 h-16 bg-blue-400 rounded-full opacity-30 -translate-y-1/2"></div>
            <div class="absolute bottom-10 left-16 w-28 h-28 bg-blue-600 rounded-full opacity-30"></div>
            <div class="absolute bottom-0 right-0 w-36 h-36 bg-blue-500 rounded-full opacity-30"></div>
            <div class="absolute top-[10%] right-0 w-32 h-32 bg-blue-700 rounded-full opacity-30"></div>
            <div class="absolute top-[35%] right-10 w-20 h-20 bg-blue-500 rounded-full opacity-30"></div>
            <div class="absolute top-[60%] right-4 w-24 h-24 bg-blue-300 rounded-full opacity-30"></div>
            <div class="absolute bottom-10 right-16 w-28 h-28 bg-blue-600 rounded-full opacity-30"></div>
            <div
                class="absolute top-0 right-0 w-48 h-48 bg-gradient-to-br from-blue-500 to-transparent rounded-full opacity-40 blur-2xl">
            </div>
            <div class="absolute bottom-[-50px] left-[-50px] w-64 h-64 bg-blue-600 rounded-full opacity-30 blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-32 h-32 bg-blue-500 opacity-20 blur-xl transform rotate-45"></div>
        </div>

        <div class="relative z-10 max-w-full mx-auto px-6 sm:px-12">
            <!-- Título centrado -->
            <div class="text-center mb-16">
                <h2
                    class="text-3xl sm:text-4xl lg:text-5xl font-bold border-b-4 border-blue-300 inline-block pb-2 px-6 sm:px-12">
                    Proyectos
                </h2>
            </div>

            @php
                // Mostrar solo 5 áreas
                $areasToShow = $areaProyectos->take(5);
            @endphp

            <!-- Grid: 1 col en mobile, 2 en tablet, 3 en desktop -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-11">
                @foreach ($areasToShow as $area)
                    <div
                        class="relative rounded-lg overflow-hidden bg-white/20 backdrop-blur-md hover:shadow-xl cursor-pointer aspect-[4/3] transform hover:scale-105 transition-transform duration-300">
                        <!-- Imagen (rellena el contenedor conservando 4:3) -->
                        <img src="{{ $area->imagen }}" alt="{{ $area->nombreArea }}" class="w-full h-full object-cover" />
                        <!-- Nombre del área en una franja semi-transparente, si deseas -->
                        <div class="absolute bottom-0 left-0 right-0 bg-black/40 p-3">
                            <h3 class="text-center text-lg sm:text-xl font-semibold">
                                {{ $area->nombreArea }}
                            </h3>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Botón "Ver más proyectos" si hay más de 5 áreas -->
            @if ($areaProyectos->count() > 5)
                <div class="mt-8 text-center">
                    <a href="{{ route('proyectos.index') }}"
                        class="inline-block px-6 py-3 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 transition-colors">
                        Ver más proyectos
                    </a>
                </div>
            @endif
        </div>
    </section>

    {{-- Sección eventos --}}
    <section class="py-12">
        <div class="flex flex-col items-center gap-3 mb-12">
            <h2 class="text-blue-800 font-semibold text-4xl mb-1">Próximos Eventos</h2>
            <div class="blue-line w-1/3 h-0.5 bg-[#64d423]"></div>
        </div>

        <div class="px-10 max-w-screen-2xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 lg:gap-14">
            @foreach ($eventos as $evento)
                <!-- Tarjeta como un div normal -->
                <div
                    class="relative w-full bg-white shadow-md rounded-xl duration-500
                            hover:scale-105 hover:shadow-xl group overflow-hidden">

                    <!-- Imagen -->
                    <img src="{{ url('storage/' . $evento->imagen) }}" alt="{{ $evento->titulo }}"
                        class="w-full h-[200px] object-cover rounded-t-xl" />

                    <!-- Texto -->
                    <div class="px-4 py-6 w-full min-h-[150px]">
                        <span class="text-gray-600 mr-3 uppercase text-base">
                            {{ \Carbon\Carbon::parse($evento->fecha)->locale('es')->translatedFormat('d F, Y') }}
                        </span>
                        <p class="text-lg font-bold text-black truncate block capitalize mt-3 select-none">
                            {{ $evento->titulo }}
                        </p>
                        <!-- Mostrar HTML de la descripción -->
                        @php
                            // Instancia la clase TruncateService usando el namespace completo
                            $truncateService = new \Urodoz\Truncate\TruncateService();
                            // Trunca la descripción a 120 caracteres y agrega '...'
                            $htmlSnippet = $truncateService->truncate($evento->descripcion, 200, '...');
                        @endphp

                        <div class="text-base font-normal text-black cursor-auto my-3 break-words select-none">
                            {!! $htmlSnippet !!}
                        </div>
                    </div>

                    <!-- Overlay con enlace “Leer más” -->
                    <div
                        class="absolute inset-0 bg-[#1E5397] bg-opacity-35 flex items-center justify-center
                                opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0
                                transition-all duration-500 ease-in-out rounded-xl backdrop-blur-md">
                        <a href="{{ route('eventos.show', $evento->id) }}"
                            class="text-white text-base font-semibold select-none bg-[#98C560]
                                  hover:bg-[#a6d073] px-3 py-2 rounded-lg cursor-pointer">
                            Leer más
                        </a>
                    </div>
                </div>
            @endforeach
        </div>


        <div class="mt-10 flex justify-center">
            <a href="{{ route('eventos') }}"
                class="bg-[#98C560] p-4 rounded-xl text-lg text-white hover:bg-[#a6d073] cursor-pointer">
                VER MÁS EVENTOS
            </a>
        </div>
    </section>
@endsection
