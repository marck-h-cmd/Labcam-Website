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
    <section class="pt-16 pb-2">
        <div class="flex flex-col items-center gap-3 mb-4">
            <h2 class="text-blue-800 font-semibold text-4xl mb-1">Noticias</h2>
            <div class="blue-line w-1/5 h-0.5 bg-[#64d423]"></div>
        </div>
        {{-- <div class="ji gp uq"> --}}
        <div class="bb ye ki xn vq jb jo">
            <div class="wc qf pn xo zf iq">
                <!-- Blog Item -->
                <div class="animate_top sg vk rm xm">
                    <div class="c rc i z-1 pg">
                        <img class="w-full" src="/user/template/images/blog-01.png" alt="Blog" />

                        <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                            <a href="{{ route('detalle-noticias') }}"class="vc ek rg lk gh sl ml il gi hi">Leer más</a>
                        </div>
                    </div>

                    <div class="yh">
                        <div class="tc uf wf ag jq">
                            <div class="tc wf ag">
                                <img src="/user/template/images/icon-man.svg" alt="User" />
                                <p>Musharof Chy</p>
                            </div>
                            <div class="tc wf ag">
                                <img src="/user/template/images/icon-calender.svg" alt="Calender" />
                                <p>25 Dec, 2025</p>
                            </div>
                        </div>
                        <h4 class="ek tj ml il kk wm xl eq lb">
                            <a href="blog-single.html">Free advertising for your online business</a>
                        </h4>
                    </div>
                </div>

                <!-- Blog Item -->
                <div class="animate_top sg vk rm xm">
                    <div class="c rc i z-1 pg">
                        <img class="w-full" src="/user/template/images/blog-02.png" alt="Blog" />

                        <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                            <a href="{{ route('detalle-noticias') }}" class="vc ek rg lk gh sl ml il gi hi">Leer más</a>
                        </div>
                    </div>

                    <div class="yh">
                        <div class="tc uf wf ag jq">
                            <div class="tc wf ag">
                                <img src="/user/template/images/icon-man.svg" alt="User" />
                                <p>Musharof Chy</p>
                            </div>
                            <div class="tc wf ag">
                                <img src="/user/template/images/icon-calender.svg" alt="Calender" />
                                <p>25 Dec, 2025</p>
                            </div>
                        </div>
                        <h4 class="ek tj ml il kk wm xl eq lb">
                            <a href="blog-single.html">9 simple ways to improve your design skills</a>
                        </h4>
                    </div>
                </div>

                <!-- Blog Item -->
                <div class="animate_top sg vk rm xm">
                    <div class="c rc i z-1 pg">
                        <img class="w-full" src="/user/template/images/blog-03.png" alt="Blog" />

                        <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                            <a href="{{ route('detalle-noticias') }}" class="vc ek rg lk gh sl ml il gi hi">Leer más</a>
                        </div>
                    </div>

                    <div class="yh">
                        <div class="tc uf wf ag jq">
                            <div class="tc wf ag">
                                <img src="/user/template/images/icon-man.svg" alt="User" />
                                <p>Musharof Chy</p>
                            </div>
                            <div class="tc wf ag">
                                <img src="/user/template/images/icon-calender.svg" alt="Calender" />
                                <p>25 Dec, 2025</p>
                            </div>
                        </div>
                        <h4 class="ek tj ml il kk wm xl eq lb">
                            <a href="blog-single.html">Tips to quickly improve your coding speed.</a>
                        </h4>
                    </div>
                </div>
            </div>
            {{-- </div> --}}
        </div>

        <div class="my-10 flex justify-center">
            <a href="{{ route('noticias') }}" class="bg-[#98C560] p-4 rounded-xl text-white cursor-pointer">
                VER MÁS NOTICIAS
            </a>
        </div>

    </section>

    {{-- Seccion de proyectos --}}
    <section class="bg-blue-900 text-white py-20 relative overflow-hidden">
        <div class="container-fluid mx-auto px-9 md:px-16">
            <!-- Contenido principal -->
            <div
                class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center relative transition-all duration-500 ease-in-out">
                <!-- Texto -->
                <div class="flex flex-col items-center lg:items-start text-center lg:text-left">
                    <!-- Título -->
                    <div class="mb-6">
                        <h2 class="font-semibold text-4xl mb-1">Proyectos</h2>
                        <div class="blue-line w-full h-0.5 bg-blue-300"></div>
                    </div>
                    <!-- Texto descriptivo -->
                    <div class="mb-6">
                        <div class="my-6 flex flex-col space-y-4">
                             {!! $topProyecto->descripcion !!}
                        </div>
                        <a href="{{ route('proyectos') }}">
                            <button
                                class="bg-[#98C560] text-blue-900 font-bold text-lg px-8 py-4 rounded-lg hover:bg-green-500 transition duration-300">
                                VER TODOS LOS PROYECTOS
                            </button>
                        </a>
                    </div>
                </div>
                <!-- Contenedor de imágenes -->
                <div class="h-[450px] flex items-center justify-center relative w-full mt-5 sm:mt-16 lg:mt-28">
                    <!-- Imagen inferior -->

                    <img class="w-[calc(100%-130px)] md:w-[500px] h-auto shadow-[0_20px_40px_rgba(0,0,0,0.3)] 
        absolute top-1/2 left-[calc(50%-70px)] lg:left-[calc(50%-10px)] xl:left-[calc(50%-30px)] transform -translate-x-1/2 -translate-y-1/2 
        rounded-lg transition-all duration-500 ease-in-out hover:scale-110 hover:z-20 
        hover:translate-x-6 hover:translate-y-8"
                        src="/user/template/images/proyectos/{{ $topProyecto->img1 }}" alt="Imagen 1">

                    <!-- Imagen superior -->
                    <img class="w-[calc(100%-130px)] md:w-[500px] h-auto shadow-[0_20px_40px_rgba(0,0,0,0.3)] 
        absolute top-1/4 left-[calc(50%+70px)] lg:left-[calc(50%+45px)] xl:left-[calc(50%+60px)] transform -translate-x-1/2 -translate-y-1/2 
        rounded-lg transition-all duration-500 ease-in-out hover:scale-110 hover:z-10 
        hover:-translate-x-6 hover:-translate-y-8"
                        src="/user/template/images/proyectos/{{ $topProyecto->img2 }}" alt="Imagen 2">

                </div>
            </div>
        </div>
    </section>

    {{-- Sección eventos --}}
    <section class="py-16">
        <div class="flex flex-col items-center gap-3 mb-4">
            <h2 class="text-blue-800 font-semibold text-4xl mb-1">Próximos Eventos</h2>
            <div class="blue-line w-1/3 h-0.5 bg-[#64d423]"></div>
        </div>

        {{-- <div class="ji gp uq"> --}}
        <div class="bb ye ki xn vq jb jo">
            <div class="wc qf pn xo zf iq">
                <!-- Blog Item -->
                <div class="animate_top sg vk rm xm">
                    <div class="c rc i z-1 pg">
                        <img class="w-full" src="/user/template/images/blog-01.png" alt="Blog" />

                        <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                            <a href="{{ route('detalle-eventos') }}" class="vc ek rg lk gh sl ml il gi hi">Más
                                detalles</a>
                        </div>
                    </div>

                    <div class="yh">
                        <div class="tc uf wf ag jq">
                            <div class="tc wf ag">
                                <img src="/user/template/images/icon-man.svg" alt="User" />
                                <p>Musharof Chy</p>
                            </div>
                            <div class="tc wf ag">
                                <img src="/user/template/images/icon-calender.svg" alt="Calender" />
                                <p>25 Dec, 2025</p>
                            </div>
                        </div>
                        <h4 class="ek tj ml il kk wm xl eq lb">
                            <a href="blog-single.html">Free advertising for your online business</a>
                        </h4>
                    </div>
                </div>

                <!-- Blog Item -->
                <div class="animate_top sg vk rm xm">
                    <div class="c rc i z-1 pg">
                        <img class="w-full" src="/user/template/images/blog-02.png" alt="Blog" />

                        <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                            <a href="{{ route('detalle-eventos') }}" class="vc ek rg lk gh sl ml il gi hi">Más
                                detalles</a>
                        </div>
                    </div>

                    <div class="yh">
                        <div class="tc uf wf ag jq">
                            <div class="tc wf ag">
                                <img src="/user/template/images/icon-man.svg" alt="User" />
                                <p>Musharof Chy</p>
                            </div>
                            <div class="tc wf ag">
                                <img src="/user/template/images/icon-calender.svg" alt="Calender" />
                                <p>25 Dec, 2025</p>
                            </div>
                        </div>
                        <h4 class="ek tj ml il kk wm xl eq lb">
                            <a href="blog-single.html">9 simple ways to improve your design skills</a>
                        </h4>
                    </div>
                </div>

                <!-- Blog Item -->
                <div class="animate_top sg vk rm xm">
                    <div class="c rc i z-1 pg">
                        <img class="w-full" src="/user/template/images/blog-03.png" alt="Blog" />

                        <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                            <a href="{{ route('detalle-eventos') }}" class="vc ek rg lk gh sl ml il gi hi">Más
                                detalles</a>
                        </div>
                    </div>

                    <div class="yh">
                        <div class="tc uf wf ag jq">
                            <div class="tc wf ag">
                                <img src="/user/template/images/icon-man.svg" alt="User" />
                                <p>Musharof Chy</p>
                            </div>
                            <div class="tc wf ag">
                                <img src="/user/template/images/icon-calender.svg" alt="Calender" />
                                <p>25 Dec, 2025</p>
                            </div>
                        </div>
                        <h4 class="ek tj ml il kk wm xl eq lb">
                            <a href="blog-single.html">Tips to quickly improve your coding speed.</a>
                        </h4>
                    </div>
                </div>
            </div>
            {{-- </div> --}}
        </div>

        <div class="my-10 flex justify-center">
            <a href="{{ route('eventos') }}" class="bg-[#98C560] p-4 rounded-xl text-white cursor-pointer">
                VER MÁS EVENTOS
            </a>
        </div>

    </section>
@endsection
