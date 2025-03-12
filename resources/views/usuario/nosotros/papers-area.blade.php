@extends('usuario.layout.plantilla')

@section('contenido')
    <header class="home bg-cover mb-4 bg-center text-white"
        style="background-image: url('https://fondosmil.co/fondo/110721.jpg');">
        <div class="header-mask bg-[rgba(3,91,136,0.8)]">
            <div class="container mx-auto px-4">
                <div class="jumbo text-center py-40">
                    <h1 class="text-6xl text-left">Area:<span class=" text-5xl  text-blue-400"> {{ $area ? $area->nombre : 'No existe' }}</span></h1>
                </div>
            </div>

            <div class="nav">
                <div class="container mx-auto px-4 flex items-center justify-between">


                    <nav role="navigation mt-4">
                        <ul class="hor--nav flex space-x-12">
                            <li><a href="{{ route('biblioteca.papers.index') }}"
                                    class="text-gray-300 hover:text-white">Biblioteca</a></li>
                            <li><button id="mega-menu-dropdown-button" data-dropdown-toggle="mega-menu-dropdown"
                                    class="text-white font-bold flex justify-between">Áreas de Investigación <span
                                        class="py-2"> <svg class="w-2.5 h-2.5 ms-3" aria-hidden="false"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg></span></button>
                                <div id="mega-menu-dropdown"
                                    class="absolute z-20  hidden w-auto grid grid-cols-2  text-sm bg-white border border-gray-100 rounded-md shadow-md  ">
                                    @foreach ($areas->chunk(4) as $chunk)
                                        <div class="p-4 pb-0 text-gray-900 md:pb-4">
                                            <ul class="space-y-4">
                                                @foreach ($chunk as $area)
                                                    <li>
                                                        <a  href="{{ route('biblioteca.papers.area', $area->id )}}" 
                                                            class="area-btn text-gray-500 hover:text-blue-600 p-2 rounded-lg ">
                                                            {{ $area->nombre }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach

                                </div>
                            </li>

                        </ul>

                    </nav>


                </div>
            </div>
        </div>
    </header>

    <section class="py-12">
        <div class="flex flex-col items-center gap-3 mb-12">
            <h2 class="text-blue-800 font-semibold text-4xl mb-1">Papers</h2>
            <div class="blue-line w-1/3 h-0.5 bg-[#64d423]"></div>
        </div>

        <div class="px-10 max-w-screen-2xl mx-auto grid grid-cols-1 lg:grid-cols-3 sm:grid-cols-2 gap-10 lg:gap-14">
            @foreach ($papers as $paper)
                <!-- Tarjeta como un div normal -->
                <div
                    class="relative w-full bg-white shadow-md rounded-xl duration-500
                            hover:scale-105 hover:shadow-xl group overflow-hidden">

                    <!-- Imagen -->
                    <img src="{{ Storage::url('uploads/paper_img/' . $paper->img_filename) }}" alt="{{ $paper->titulo }}"
                        class="w-full h-[200px] object-cover rounded-t-xl" />

                    <!-- Texto -->
                    <div class="px-4 py-6 w-full min-h-[150px]">
                        <span class="text-gray-600 mr-3 uppercase text-sm">
                        Año Publicación:  <span>  {{ $paper->fecha_publicacion }}</span>
                        </span>
                        <p class="text-lg font-bold text-blue-500 truncate block capitalize mt-3 select-none">
                            {{ $paper->titulo }}
                        </p>
                        <!-- Mostrar HTML de la descripción -->
                        @php
                            // Instancia la clase TruncateService usando el namespace completo
                            $truncateService = new \Urodoz\Truncate\TruncateService();
                            // Trunca la descripción a 120 caracteres y agrega '...'
                            $htmlSnippet = $truncateService->truncate($paper->descripcion, 200, '...');
                        @endphp

                        <div class="text-base font-normal text-black cursor-auto my-3 break-words select-none">
                            {!! $htmlSnippet !!}
                        </div>
                        <span class="text-gray-600 mr-3 uppercase text-sm">
                            Autores: <span>   {{ $paper->formatted_autores }} </span>
                            </span>
                    </div>

                    <!-- Overlay con enlace “Leer más” -->
                    <div
                        class="absolute inset-0 bg-[#1E5397] bg-opacity-35 flex items-center justify-center
                                opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0
                                transition-all duration-500 ease-in-out rounded-xl backdrop-blur-md">
                        <a href="{{ route('biblioteca.papers.show', $paper->id) }}"
                            class="text-white text-base font-semibold select-none bg-[#98C560]
                                  hover:bg-[#a6d073] px-3 py-2 rounded-lg cursor-pointer">
                            Ver Contenido
                        </a>
                    </div>         
                </div>
            @endforeach
        </div>

        <!-- Paginación -->
        <div class="flex justify-center mt-8">
            {{ $papers->links() }}
        </div>
    </section>
@endsection
