@extends('usuario.layout.plantilla')

@section('contenido')

<section class="pt-16 pb-2">
    <div class="text-center">
        <h2 class="text-blue-800 font-semibold text-5xl mt-20">Próximos Eventos</h2>
        <div class="w-[500px] h-[1.1px] bg-green-400 mx-auto mt-1"></div>
    </div>

    <!-- Mes, Año y Navegación -->
    <div class="flex items-center justify-center mt-6">
    <button class="text-gray-500 hover:text-gray-800 transition mr-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
    </button>
    <span class="text-lg font-semibold text-gray-700">Enero, 2025</span>
    <button class="text-gray-500 hover:text-gray-800 transition ml-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
        </svg>
    </button>
</div>



    <!-- Categorías -->
    <div class="flex justify-center mt-4 space-x-4">
        <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">Todo</button>
        <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition">Pasados</button>
        <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition">Futuros</button>
    </div>

    <div class="bb ye ki xn vq jb jo">
        <div class="wc qf pn xo zf iq">
            <!-- Blog Item 1 -->
            <!-- Blog Item -->
            <div class="animate_top sg vk rm xm">
                    <div class="c rc i z-1 pg">
                        <img class="w-full" src="/user/template/images/blog-01.png" alt="Blog" />

                        <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                            <a href="{{ route('detalle-eventos') }}" class="vc ek rg lk gh sl ml il gi hi">Leer más</a>
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
                        <p class="text-sm text-gray-600 mt-1">Categoría: <span class="text-green-500 font-medium">Futuro</span></p>
                    </div>
                </div>

            <!-- Blog Item 2 -->
             <!-- Blog Item -->
             <div class="animate_top sg vk rm xm">
                    <div class="c rc i z-1 pg">
                        <img class="w-full" src="/user/template/images/blog-02.png" alt="Blog" />

                        <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                            <a href="{{ route('detalle-eventos') }}" class="vc ek rg lk gh sl ml il gi hi">Leer más</a>
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
                        <p class="text-sm text-gray-600 mt-1">Categoría: <span class="text-red-500 font-medium">Pasado</span></p>
                    </div>
                </div>


            <!-- Blog Item 3-->
            <!-- Blog Item -->
            <div class="animate_top sg vk rm xm">
                    <div class="c rc i z-1 pg">
                        <img class="w-full" src="/user/template/images/blog-03.png" alt="Blog" />

                        <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                            <a href="{{ route('detalle-eventos') }}" class="vc ek rg lk gh sl ml il gi hi">Leer más</a>
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
                        <p class="text-sm text-gray-600 mt-1">Categoría: <span class="text-red-500 font-medium">Pasado</span></p>
                    </div>
                </div>

            <!-- Blog Item 4-->
            <div class="animate_top sg vk rm xm">
                    <div class="c rc i z-1 pg">
                        <img class="w-full" src="/user/template/images/blog-03.png" alt="Blog" />

                        <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                            <a href="{{ route('detalle-eventos') }}" class="vc ek rg lk gh sl ml il gi hi">Leer más</a>
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
                        <p class="text-sm text-gray-600 mt-1">Categoría: <span class="text-red-500 font-medium">Pasado</span></p>
                    </div>
                </div>


            <!-- Blog Item 5-->
            <div class="animate_top sg vk rm xm">
                    <div class="c rc i z-1 pg">
                        <img class="w-full" src="/user/template/images/blog-03.png" alt="Blog" />

                        <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                            <a href="{{ route('detalle-eventos') }}" class="vc ek rg lk gh sl ml il gi hi">Leer más</a>
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
                        <p class="text-sm text-gray-600 mt-1">Categoría: <span class="text-green-500 font-medium">Futuro</span></p>
                    </div>
                </div>

                <!-- Blog Item 6-->
            <div class="animate_top sg vk rm xm">
                    <div class="c rc i z-1 pg">
                        <img class="w-full" src="/user/template/images/blog-03.png" alt="Blog" />

                        <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                            <a href="{{ route('detalle-eventos') }}" class="vc ek rg lk gh sl ml il gi hi">Leer más</a>
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
                        <p class="text-sm text-gray-600 mt-1">Categoría: <span class="text-green-500 font-medium">Futuro</span></p>
                    </div>
                </div>
        </div>

        <!-- Paginación -->
    <div class="flex justify-center mt-8">
        <nav class="inline-flex shadow rounded-lg overflow-hidden" aria-label="Pagination">
        <!-- Botón "Anterior" -->
        <a href="#" class="px-4 py-2 bg-gray-100 text-gray-500 hover:bg-gray-200 hover:text-gray-700 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </a>

        <!-- Números de página -->
        <a href="#" class="px-4 py-2 bg-gray-100 text-gray-700 hover:bg-blue-500 hover:text-white transition font-medium">1</a>
        <a href="#" class="px-4 py-2 bg-gray-100 text-gray-700 hover:bg-blue-500 hover:text-white transition font-medium">2</a>
        <a href="#" class="px-4 py-2 bg-gray-100 text-gray-700 hover:bg-blue-500 hover:text-white transition font-medium">3</a>

        <!-- Botón "Siguiente" -->
        <a href="#" class="px-4 py-2 bg-gray-100 text-gray-500 hover:bg-gray-200 hover:text-gray-700 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </a>
        </nav>
    </div>

    </div>
</section>


@endsection
