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
        <!-- Fondo decorativo -->
        <div class="absolute inset-0 z-0 pointer-events-none">
            <!-- Degradado radial sutil -->
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
            <!-- Formas difuminadas -->
            <div
                class="absolute top-0 right-0 w-48 h-48 bg-gradient-to-br from-blue-500 to-transparent rounded-full opacity-40 blur-2xl">
            </div>
            <div class="absolute bottom-[-50px] left-[-50px] w-64 h-64 bg-blue-600 rounded-full opacity-30 blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-32 h-32 bg-blue-500 opacity-20 blur-xl transform rotate-45"></div>
        </div>

        <div class="relative z-10 mx-auto px-10">
            <!-- Título centrado -->
            <div class="text-center mb-16">
                <h2
                    class="text-3xl sm:text-4xl lg:text-5xl font-bold border-b-4 border-blue-300 inline-block pb-2 px-6 sm:px-12">
                    Proyectos
                </h2>
            </div>

            <!-- Layout para pantallas grandes (lg en adelante) -->
            <div class="hidden lg:block">
                @php
                    // Se asume que $areaProyectos es una colección con N registros
                    $chunks = $areaProyectos->chunk(3);
                @endphp

                @foreach ($chunks as $chunk)
                    @if ($chunk->count() === 3)
                        <!-- Fila completa de 3 proyectos -->
                        <div class="grid grid-cols-3 gap-6 w-full mt-10">
                            @foreach ($chunk as $area)
                                <div
                                    class="relative bg-white/10 hover:bg-white/20 rounded-lg p-6 
                                       flex flex-col items-center justify-center transition-colors cursor-pointer 
                                       overflow-hidden aspect-[4/3]">
                                    {{-- Ícono según $area->nombreArea --}}
                                    @switch($area->nombreArea)
                                        @case('Ciencias de Materiales')
                                            <div class="absolute -bottom-4 -right-4 w-16 h-16 bg-green-500 rounded-full opacity-30">
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-white mb-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9.75 3h4.5M9.75 3v4.036c0 .75-.3 1.47-.835 2.005l-4.621 4.621A1.5 1.5 0 006 16.129v3.621A1.5 1.5 0 007.5 21h9a1.5 1.5 0 001.5-1.5v-3.621a1.5 1.5 0 00-.44-1.06l-4.621-4.621A2.828 2.828 0 0114.25 7.036V3" />
                                            </svg>
                                        @break

                                        @case('Cerámica')
                                            <div class="absolute -top-4 -left-4 w-16 h-16 bg-purple-500 rounded-full opacity-30">
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-white mb-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 9l-9-4-9 4m18 0l-9 4-9-4m18 0v6.75l-9 4.5m-9-4.5V9m9 4.5v6.75m0-6.75l-9-4.5" />
                                            </svg>
                                        @break

                                        @case('Mecatrónica')
                                            <div class="absolute top-0 right-0 w-16 h-16 bg-pink-500 rounded-bl-full opacity-30">
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-white mb-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 3v2.25M15 3v2.25M9 18.75V21M15 18.75V21M3 9h2.25M3 15h2.25M18.75 9H21M18.75 15H21M8.25 8.25h7.5v7.5h-7.5z" />
                                            </svg>
                                        @break

                                        @case('Proyecto de la Industria')
                                            <div
                                                class="absolute -bottom-4 -left-4 w-16 h-16 bg-yellow-500 rounded-full opacity-30">
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-white mb-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3.75 21h16.5M4.5 3.75h15a.75.75 0 01.75.75v16.5h-3.75v-15H4.5V4.5a.75.75 0 01.75-.75z" />
                                            </svg>
                                        @break

                                        @case('Proyectos Concursables')
                                            <div class="absolute top-0 left-0 w-16 h-16 bg-red-500 rounded-br-full opacity-30">
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-white mb-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11.48 3.499a.75.75 0 011.04 0l2.197 2.232 3.089.45c.8.116 1.117 1.129.539 1.71l-2.236 2.227.528 3.076c.137.797-.705 1.405-1.42.993L12 12.347l-2.777 1.44c-.715.412-1.557-.196-1.42-.993l.528-3.076-2.236-2.227c-.579-.58-.261-1.593.539-1.71l3.089-.45 2.197-2.232z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5" />
                                            </svg>
                                        @break

                                        @default
                                            <div class="absolute -bottom-4 -right-4 w-16 h-16 bg-gray-500 rounded-full opacity-30">
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-white mb-3">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                            </svg>
                                    @endswitch
                                    <span class="text-xl lg:text-2xl font-semibold text-center">
                                        {{ $area->nombreArea }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <!-- Si el chunk NO tiene 3 (o sea, 1 o 2 proyectos), los centramos en la misma fila -->
                        <div class="grid grid-cols-3 gap-6 w-full mt-10">
                            <div class="col-span-3 flex justify-center gap-6">
                                @foreach ($chunk as $area)
                                    <!-- IMPORTANTE: w-1/3 para que no se extienda y queden centrados -->
                                    <div
                                        class="relative bg-white/10 hover:bg-white/20 rounded-lg p-6 
                                           flex flex-col items-center justify-center transition-colors cursor-pointer 
                                           overflow-hidden aspect-[4/3] w-1/3">
                                        @switch($area->nombreArea)
                                            @case('Proyecto de la Industria')
                                                <div
                                                    class="absolute -bottom-4 -left-4 w-16 h-16 bg-yellow-500 rounded-full opacity-30">
                                                </div>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-white mb-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M3.75 21h16.5M4.5 3.75h15a.75.75 0 01.75.75v16.5h-3.75v-15H4.5V4.5a.75.75 0 01.75-.75z" />
                                                </svg>
                                            @break

                                            @case('Proyectos Concursables')
                                                <div class="absolute top-0 left-0 w-16 h-16 bg-red-500 rounded-br-full opacity-30">
                                                </div>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-white mb-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11.48 3.499a.75.75 0 011.04 0l2.197 2.232 3.089.45c.8.116 1.117 1.129.539 1.71l-2.236 2.227.528 3.076c.137.797-.705 1.405-1.42.993L12 12.347l-2.777 1.44c-.715.412-1.557-.196-1.42-.993l.528-3.076-2.236-2.227c-.579-.58-.261-1.593.539-1.71l3.089-.45 2.197-2.232z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5" />
                                                </svg>
                                            @break

                                            @case('Ciencias de Materiales')
                                                <div
                                                    class="absolute -bottom-4 -right-4 w-16 h-16 bg-green-500 rounded-full opacity-30">
                                                </div>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-white mb-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9.75 3h4.5M9.75 3v4.036c0 .75-.3 1.47-.835 2.005l-4.621 4.621A1.5 1.5 0 006 16.129v3.621A1.5 1.5 0 007.5 21h9a1.5 1.5 0 001.5-1.5v-3.621a1.5 1.5 0 00-.44-1.06l-4.621-4.621A2.828 2.828 0 0114.25 7.036V3" />
                                                </svg>
                                            @break

                                            @case('Cerámica')
                                                <div
                                                    class="absolute -top-4 -left-4 w-16 h-16 bg-purple-500 rounded-full opacity-30">
                                                </div>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-white mb-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M21 9l-9-4-9 4m18 0l-9 4-9-4m18 0v6.75l-9 4.5m-9-4.5V9m9 4.5v6.75m0-6.75l-9-4.5" />
                                                </svg>
                                            @break

                                            @case('Mecatrónica')
                                                <div
                                                    class="absolute top-0 right-0 w-16 h-16 bg-pink-500 rounded-bl-full opacity-30">
                                                </div>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-white mb-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 3v2.25M15 3v2.25M9 18.75V21M15 18.75V21M3 9h2.25M3 15h2.25M18.75 9H21M18.75 15H21M8.25 8.25h7.5v7.5h-7.5z" />
                                                </svg>
                                            @break

                                            @default
                                                <div
                                                    class="absolute -bottom-4 -right-4 w-16 h-16 bg-gray-500 rounded-full opacity-30">
                                                </div>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-white mb-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                                </svg>
                                        @endswitch
                                        <span class="text-xl lg:text-2xl font-semibold text-center">
                                            {{ $area->nombreArea }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Layout para pantallas menores (mobile/tablet) -->
            <div class="block lg:hidden mt-10">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @foreach ($areaProyectos as $area)
                        <div
                            class="relative bg-white/10 hover:bg-white/20 rounded-lg p-4 
                               flex flex-col items-center justify-center transition-colors cursor-pointer 
                               overflow-hidden aspect-[4/3]">
                            @switch($area->nombreArea)
                                @case('Ciencias de Materiales')
                                    <div class="absolute -bottom-3 -right-3 w-12 h-12 bg-green-500 rounded-full opacity-30"></div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-10 h-10 sm:w-12 sm:h-12 text-white mb-2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.75 3h4.5M9.75 3v4.036c0 .75-.3 1.47-.835 2.005l-4.621 4.621A1.5 1.5 0 006 16.129v3.621A1.5 1.5 0 007.5 21h9a1.5 1.5 0 001.5-1.5v-3.621a1.5 1.5 0 00-.44-1.06l-4.621-4.621A2.828 2.828 0 0114.25 7.036V3" />
                                    </svg>
                                @break

                                @case('Cerámica')
                                    <div class="absolute -top-3 -left-3 w-12 h-12 bg-purple-500 rounded-full opacity-30"></div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-10 h-10 sm:w-12 sm:h-12 text-white mb-2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 9l-9-4-9 4m18 0l-9 4-9-4m18 0v6.75l-9 4.5m-9-4.5V9m9 4.5v6.75m0-6.75l-9-4.5" />
                                    </svg>
                                @break

                                @case('Mecatrónica')
                                    <div class="absolute top-0 right-0 w-12 h-12 bg-pink-500 rounded-bl-full opacity-30"></div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-10 h-10 sm:w-12 sm:h-12 text-white mb-2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 3v2.25M15 3v2.25M9 18.75V21M15 18.75V21M3 9h2.25M3 15h2.25M18.75 9H21M18.75 15H21M8.25 8.25h7.5v7.5h-7.5z" />
                                    </svg>
                                @break

                                @case('Proyecto de la Industria')
                                    <div class="absolute -bottom-3 -left-3 w-12 h-12 bg-yellow-500 rounded-full opacity-30"></div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-10 h-10 sm:w-12 sm:h-12 text-white mb-2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 21h16.5M4.5 3.75h15a.75.75 0 01.75.75v16.5h-3.75v-15H4.5V4.5a.75.75 0 01.75-.75z" />
                                    </svg>
                                @break

                                @case('Proyectos Concursables')
                                    <div class="absolute top-0 left-0 w-12 h-12 bg-red-500 rounded-br-full opacity-30"></div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-10 h-10 sm:w-12 sm:h-12 text-white mb-2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.48 3.499a.75.75 0 011.04 0l2.197 2.232 3.089.45c.8.116 1.117 1.129.539 1.71l-2.236 2.227.528 3.076c.137.797-.705 1.405-1.42.993L12 12.347l-2.777 1.44c-.715.412-1.557-.196-1.42-.993l.528-3.076-2.236-2.227c-.579-.58-.261-1.593.539-1.71l3.089-.45 2.197-2.232z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5" />
                                    </svg>
                                @break

                                @default
                                    <div class="absolute -bottom-3 -right-3 w-12 h-12 bg-gray-500 rounded-full opacity-30"></div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-10 h-10 sm:w-12 sm:h-12 text-white mb-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                    </svg>
                            @endswitch
                            <span class="text-lg sm:text-xl font-semibold text-center">
                                {{ $area->nombreArea }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
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
