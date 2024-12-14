@extends('usuario.layout.plantilla')

@section('contenido')
    <section>
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden md:h-[700px]">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="/user/template/images/carrusel/carrusel_01.png"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="/user/template/images/carrusel/carrusel_02.jpg"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="...">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="/user/template/images/carrusel/carrusel_03.jpg"
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
        <div class="text-center">
            <h2 class="text-blue-800 font-semibold text-5xl">Noticias</h2>
            <div class="w-72 h-[1.1px] bg-green-400 mx-auto mt-1"></div>
        </div>

        {{-- <div class="ji gp uq"> --}}
        <div class="bb ye ki xn vq jb jo">
            <div class="wc qf pn xo zf iq">
                <!-- Blog Item -->
                <div class="animate_top sg vk rm xm">
                    <div class="c rc i z-1 pg">
                        <img class="w-full" src="/user/template/images/blog-01.png" alt="Blog" />

                        <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                            <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Leer más</a>
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
                            <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Leer más</a>
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
                            <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Leer más</a>
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
            <a class=" bg-[#98C560] p-4 rounded-xl text-white cursor-pointer">VER MÁS NOTICIAS</a>
        </div>
    </section>

    {{-- Seccion de proyectos --}}
    <section class="bg-blue-900 text-white py-20 relative overflow-hidden">
        <div class="mx-auto px-5 relative">
            <!-- Contenido principal -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center relative">
                <div class="ml-10">
                    <!-- Título -->
                    <div class="mb-12">
                        <h2 class="text-5xl font-bold border-b-4 border-blue-300 inline-block pb-2 px-12">
                            Proyectos
                        </h2>
                    </div>
                    <!-- Texto descriptivo -->
                    <div>
                        <p class="text-lg leading-relaxed mb-6">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed iaculis orci orci, sed convallis
                            ligula
                            ornare vel.
                        </p>
                        <p class="text-lg leading-relaxed mb-8">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed iaculis orci orci, sed convallis
                            ligula
                            ornare vel.
                        </p>
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
                        src="/user/template/images/proyectos/proyecto_01.jpg">

                    <!-- Imagen superior -->
                    <img class="w-[450px] h-[400px] shadow-[0_20px_40px_rgba(0,0,0,0.3)] absolute top-2 left-40 rounded-lg transition-all duration-500 ease-in-out hover:scale-110 hover:z-10 hover:-translate-x-16 hover:-translate-y-8"
                        src="/user/template/images/proyectos/proyecto_02.jpg">
                </div>

            </div>
        </div>
    </section>


    {{-- Sección eventos --}}
    <section class="py-16">
        <div class="text-center">
            <h2 class="text-blue-800 font-semibold text-5xl">Próximos Eventos</h2>
            <div class="w-[420px] h-[1.1px] bg-green-400 mx-auto mt-1"></div>
        </div>

        {{-- <div class="ji gp uq"> --}}
        <div class="bb ye ki xn vq jb jo">
            <div class="wc qf pn xo zf iq">
                <!-- Blog Item -->
                <div class="animate_top sg vk rm xm">
                    <div class="c rc i z-1 pg">
                        <img class="w-full" src="/user/template/images/blog-01.png" alt="Blog" />

                        <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                            <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Más detalles</a>
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
                            <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Más detalles</a>
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
                            <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Más detalles</a>
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
            <a class=" bg-[#98C560] p-4 rounded-xl text-white cursor-pointer">VER MÁS EVENTOS</a>
        </div>
    </section>
@endsection
