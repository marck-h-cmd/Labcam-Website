@extends('usuario.layout.plantilla')

@section('title', 'paper')


@section('contenido')

    <section>

        <header class="home bg-cover mb-4 bg-center text-white"
            style="background-image: url('https://fondosmil.co/fondo/110721.jpg');">
            <div class="header-mask bg-[rgba(3,91,136,0.8)]">
                <div class="container mx-auto px-4">
                    <div class="jumbo text-center py-40">
                        <h1 class="text-6xl text-left">Biblioteca</h1>
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
                                        class="absolute z-20  hidden w-auto grid  text-sm bg-white border border-gray-100 rounded-md shadow-md  ">
                                        @foreach ($areas->chunk(4) as $chunk)
                                            <div class="p-4 pb-0 text-gray-900 md:pb-4">
                                                <ul class="space-y-4">
                                                    @foreach ($chunk as $area)
                                                        <li>
                                                            <a href="{{ route('biblioteca.papers.area', $area->id) }}"
                                                                class="text-gray-500 hover:text-blue-600">
                                                                {{ $area->nombre }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endforeach

                                    </div>
                                </li>
                                <!--
                                                                    <li><a href="#" class="text-gray-300 hover:text-white">Topicos</a></li>  -->

                            </ul>
                        </nav>


                    </div>
                </div>
            </div>
        </header>


        <div class="Nosotros max-w-screen-2xl max w-full px-5 mx-auto mt-36">

            <div class="main-title flex flex-col items-center gap-3 mb-8">
                <div class="title text-2xl font-semibold text-[#2e5382]">Publicaciones-papers</div>
                <div class="blue-line w-1/5 h-0.5 bg-[#2371d4]"></div>
            </div>

            <div class="grid  grid-cols-10 gap-x-16 max-[1150px]:grid-cols-1 justify-center">
                <aside
                    class=" w-[450px] max-[1150px]:bg-slate-50  max-[1150px]:w-[350px]   max-[1150px]:z-50  transition-transform  max-[1150px]:fixed max-[1150px]:top-0 max-[1150px]:bottom-0 max-[1150px]:left-0  h-auto mt-12 max-[1150px]:mt-0 col-span-3 "
                    id="drawer-navigation" tabindex="-1" aria-labelledby="drawer-navigation-label">
                    <div class="px-3 py-4 overflow-y-auto rounded  ">
                        <ul class="space-y-2">
                            <li>
                                <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase ">
                                    Menu</h5>
                                <button type="button" data-drawer-hide="drawer-navigation"
                                    aria-controls="drawer-navigation"
                                    class="max-[1150px]:block hidden text-black text-2xl">X</button>

                            </li>
                            <li>

                                <div class='max-w-md mx-auto'>
                                    <div
                                        class="relative flex items-center border-2 w-full h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden">
                                        <div class="grid place-items-center h-full w-12 text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </div>

                                        <input class="peer h-full w-full outline-none text-sm text-gray-700 pr-2 border-0"
                                            type="text" id="search-dropdown" placeholder="Buscar Titulo Paper..." />
                                    </div>
                                </div>   
                            </li>
                            <hr>
                            <li>
                                <button type="button"
                                    class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100  "
                                    aria-controls="dropdown-example-2" data-collapse-toggle="dropdown-example-2">
                                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 "
                                        width="64px" height="64px" viewBox="0 0 32 32" id="i-options"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentcolor"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M28 6 L4 6 M28 16 L4 16 M28 26 L4 26 M24 3 L24 9 M8 13 L8 19 M20 23 L20 29">
                                            </path>
                                        </g>
                                    </svg>
                                    <span class="flex-1 ml-3 text-left whitespace-nowrap"
                                        sidebar-toggle-item>Topicos</span>
                                    <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <ul id="dropdown-example-2" class=" py-2 space-y-2 overflow-y-auto max-h-52">
                                    @forelse($topicos as $topico)
                                        <li>

                                            <span
                                                class="flex items-center w-full p-2 text-base font-normal text-gray-600 transition duration-75 rounded-lg group hover:bg-gray-100  ">
                                                <input class="mr-2 checkbox-topico" type="checkbox" name="topics"
                                                    value="{{ $topico->id }}">
                                                {{ $topico->nombre }} <span
                                                    class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full">{{ count($topico->papers) }}</span></span>
                                        </li>
                                    @empty
                                        <li>
                                            <a href="#"
                                                class="flex items-center w-full p-2 text-base font-normal text-gray-600 transition duration-75 rounded-lg group hover:bg-gray-100  ">No
                                                hay más topicos</a>
                                        </li>
                                    @endforelse

                                </ul>
                            </li>
                            <hr>
                            <li>
                                <button type="button"
                                    class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 "
                                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 "
                                        width="64px" height="64px" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M10 10C10 10.5523 10.4477 11 11 11V17C10.4477 17 10 17.4477 10 18C10 18.5523 10.4477 19 11 19H13C13.5523 19 14 18.5523 14 18C14 17.4477 13.5523 17 13 17V9H11C10.4477 9 10 9.44772 10 10Z"
                                                fill="#0F0F0F"></path>
                                            <path
                                                d="M12 8C12.8284 8 13.5 7.32843 13.5 6.5C13.5 5.67157 12.8284 5 12 5C11.1716 5 10.5 5.67157 10.5 6.5C10.5 7.32843 11.1716 8 12 8Z"
                                                fill="#0F0F0F"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M23 4C23 2.34315 21.6569 1 20 1H4C2.34315 1 1 2.34315 1 4V20C1 21.6569 2.34315 23 4 23H20C21.6569 23 23 21.6569 23 20V4ZM21 4C21 3.44772 20.5523 3 20 3H4C3.44772 3 3 3.44772 3 4V20C3 20.5523 3.44772 21 4 21H20C20.5523 21 21 20.5523 21 20V4Z"
                                                fill="#0F0F0F"></path>
                                        </g>
                                    </svg>
                                    <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Areas
                                        Investigación</span>
                                    <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <ul id="dropdown-example" class=" py-2 space-y-2 overflow-y-auto max-h-36">
                                    @forelse($areas as $area)
                                        <li>
                                            <a href="{{ route('biblioteca.papers.area', $area->id) }}"
                                                class="flex items-center w-full p-2 text-base font-normal text-gray-600 transition duration-75 rounded-lg group hover:bg-gray-100  ">{{ $area->nombre }}</a>
                                        </li>
                                    @empty
                                        <li>
                                            <a href="#"
                                                class="flex items-center w-full p-2 text-base font-normal text-gray-600 transition duration-75 rounded-lg group hover:bg-gray-100  ">No
                                                hay más areas</a>
                                        </li>
                                    @endforelse

                                </ul>
                            </li>
                            <hr>
                            <li>
                                <a href="{{ route('noticias') }}"
                                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg  hover:bg-gray-100 ">
                                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75  group-hover:text-gray-900 "
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                                        </path>
                                        <path
                                            d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                                        </path>
                                    </svg>
                                    <span class="flex-1 ml-3 whitespace-nowrap">Noticias</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </aside>



                <div class="pt-6 pb-12  col-span-7 ">
                    <div class=" w-auto mx-2 overflow-y-auto">
                        <div id="card" class="">
                            <div class=" px-24 max-lg:px-2 ">
                                <div
                                    class="p-4 w-full bg-[#98c560] rounded-l-3xl rounded-r-3xl flex justify-between items-center">
                                    <button id="menuBtn" data-drawer-target="drawer-navigation"
                                        data-drawer-show="drawer-navigation" aria-controls="drawer-navigation"
                                        class="max-[1150px]:block hidden bg-[#28ddc5] text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg">
                                        <svg class="ml-3 w-6 h-6 text-gray-50 transition duration-75 group-hover:text-gray-900 "
                                            viewBox="0 0 32 32" id="i-options" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" stroke="currentcolor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M28 6 L4 6 M28 16 L4 16 M28 26 L4 26 M24 3 L24 9 M8 13 L8 19 M20 23 L20 29">
                                                </path>
                                            </g>
                                        </svg>
                                    </button>
                                    <p class="text-gray-50 ">Mostrando <span class="text-gray-100"
                                            id="paper-count">{{ count($papers) }}</span> resultados</p>

                                </div>
                            </div>
                            <!-- container para papers -->
                            <div id="papers-container"
                                class="container w-100 lg:w-4/5  mx-auto flex flex-col overflow-y-visible">
                                <!-- paper -->

                                @if ($papers->isEmpty())
                                    <div class=" bg-slate-100 p-4 mt-6 rounded-md  max-w-6xl text-center">
                                        <p class="text-gray-500 text-3xl font-semibold">No se encontraron papers.</p>
                                        <small class="text-blue-400 ">Busca por más información</small>

                                    </div>
                                @else
                                    @foreach ($papers as $paper)
                                        <div
                                            class="flex flex-col md:flex-row overflow-hidden
                                             rounded-lg shadow-xl   mt-4  mx-2  bg-[#f4f4f4] max-w-6xl py-2 h-auto">
                                            <!-- información del paper -->
                                            <div class="max-h-96  md:w-1/2 p-4">
                                                <a href="{{ route('biblioteca.papers.show', $paper->id) }}"
                                                    class=" cursor-pointer hover:underline max-md:text-center ">
                                                    <h3 class="font-semibold text-lg mt-4 text-blue-400 text-justify ">
                                                        {{ $paper->titulo }}</h3>
                                                </a>
                                                <div class="mt-5">
                                                    <p class="text-gray-600 ">Autores:</p>
                                                    <p class="autores italic text-base mb-3">
                                                        {{ $paper->formatted_autores }}</p>
                                                </div>
                                                <p class="doi text-sm mt-3"><span class="text-gray-600">
                                                        DOI: </span><span
                                                        class="doi-link underline text-gray-500 text-base">{{ $paper->doi }}</span>
                                                </p>
                                                <p class="text-base  mt-4">
                                                    <span class="text-gray-600  ">Publicado: </span>
                                                    <strong class="text-gray-700 uppercase font-semibold text-sm ">
                                                        {{ $paper->fecha_publicacion }} </strong>
                                                </p>
                                                <a href="{{ route('biblioteca.papers.show', $paper->id) }}"
                                                    class="mt-2 flex gap-2 cursor-pointer font-bold">
                                                    <svg width="24px" height="24px" viewBox="0 0 16 16"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                            stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path fill="#98c560" fill-rule="evenodd"
                                                                d="M8 3.517a1 1 0 011.62-.784l5.348 4.233a1 1 0 010 1.568l-5.347 4.233A1 1 0 018 11.983v-1.545c-.76-.043-1.484.003-2.254.218-.994.279-2.118.857-3.506 1.99a.993.993 0 01-1.129.096.962.962 0 01-.445-1.099c.415-1.5 1.425-3.141 2.808-4.412C4.69 6.114 6.244 5.241 8 5.042V3.517zm1.5 1.034v1.2a.75.75 0 01-.75.75c-1.586 0-3.066.738-4.261 1.835a8.996 8.996 0 00-1.635 2.014c.878-.552 1.695-.916 2.488-1.138 1.247-.35 2.377-.33 3.49-.207a.75.75 0 01.668.745v1.2l4.042-3.2L9.5 4.55z"
                                                                clip-rule="evenodd"></path>
                                                        </g>
                                                    </svg>
                                                    <p class=" text-[#98c560] text-base">Redirigir</p>
                                                </a>
                                            </div>
                                            <div class="w-full p-6 text-gray-800 flex flex-col justify-between  ">
                                                <p class="mt-2 text-justify text-gray-500 text-sm ">
                                                    {{ $paper->descripcion }}
                                                </p>
                                            </div>

                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    @if (count($papers) > 3 && count($papers) != 3)
                        <div class="flex justify-center mt-5 p-6 ">
                            <button id="load-more"
                                class="bg-[#98c560] text-white text-lg font-bold py-3 px-6 rounded-lg hover:bg-[#66b308] transition-all duration-300">
                                VER MÁS PUBLICACIONES
                            </button>
                        </div>
                    @endif


                </div>
            </div>
        </div>

    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let offset = {{ $papers->count() }};
            //  console.log(offset)
            const limit = 3;
            const paperCount = document.getElementById('paper-count')
            const button = document.getElementById('load-more');

            if (button != undefined) {
                button.addEventListener('click', function() {
                    fetch(`/api/biblioteca/papers/fetch-more?offset=${offset}&limit=${limit}`)
                        .then(response => response.json())
                        .then(data => {
                            const {
                                papers,
                                total,
                                remaining
                            } = data;

                            if (papers.length > 0) {
                                const container = document.getElementById('papers-container');
                                papers.forEach(paper => {
                                    const card = `
                                  <div class="flex flex-col md:flex-row overflow-hidden rounded-lg shadow-xl mt-4  mx-2 bg-[#f4f4f4] max-w-6xl h-auto">
                                      <div class="max-h-96  md:w-1/2 p-4">
                                          <a href="/biblioteca/papers/${paper.id}" class="cursor-pointer hover:underline max-md:text-center">
                                              <h3 class="font-semibold text-lg mt-4 text-blue-400">${paper.titulo}</h3>
                                          </a>
                                          <div class="mt-5">
                                              <p class="text-gray-600">Autores:</p>
                                              <p class="autores italic text-base mb-3">${paper.formatted_autores}</p>
                                          </div>
                                          <p class="doi text-sm mt-3"><span class="text-gray-600">
                                           DOI: </span><span class="doi-link underline text-gray-500 text-xs">${paper.doi }</span>
                                          </p>
                                          <p class="text-base mt-4">
                                              <span class="text-gray-600">Publicado: </span>
                                              <strong class="text-gray-700 uppercase font-semibold text-sm">${paper.fecha_publicacion}</strong>
                                          </p>
                                          <a href="/biblioteca/papers/${paper.id}" class="mt-2 flex gap-2 cursor-pointer font-bold">
                                          <svg width="24px" height="24px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="none"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#98c560" fill-rule="evenodd" d="M8 3.517a1 1 0 011.62-.784l5.348 4.233a1 1 0 010 1.568l-5.347 4.233A1 1 0 018 11.983v-1.545c-.76-.043-1.484.003-2.254.218-.994.279-2.118.857-3.506 1.99a.993.993 0 01-1.129.096.962.962 0 01-.445-1.099c.415-1.5 1.425-3.141 2.808-4.412C4.69 6.114 6.244 5.241 8 5.042V3.517zm1.5 1.034v1.2a.75.75 0 01-.75.75c-1.586 0-3.066.738-4.261 1.835a8.996 8.996 0 00-1.635 2.014c.878-.552 1.695-.916 2.488-1.138 1.247-.35 2.377-.33 3.49-.207a.75.75 0 01.668.745v1.2l4.042-3.2L9.5 4.55z" clip-rule="evenodd"></path></g></svg>
                                          <p class=" text-[#98c560] text-base">Redirigir</p>
                                           </a>    
                                      </div>
                                      <div class="w-full p-6 text-gray-800 flex flex-col justify-between">
                                          <p class="mt-2 text-justify text-gray-500 text-sm">${paper.descripcion}</p>
                                      </div>
                                  </div>`;
                                    container.insertAdjacentHTML('beforeend', card);
                                });

                               

                                offset += papers.length;

                               
                                if (remaining > 0) {
                                    button.textContent = ` VER ${remaining} MÁS PUBLICACIONES`;                      

                                } else {
                                    button.style.display = 'none';
                                }

                                
                            console.log("remain: ",remaining)
                            paperCount.textContent = parseInt(paperCount.textContent) + calCount(remaining);
                            console.log("count ",paperCount.textContent)

                            } else {
                                button.style.display = 'none';
                            }


                        })
                        .catch(error => console.error('Error fetching data:', error));
                });
            }
        });

        function calCount(remaining){
            if(remaining%3==0)
             return 3;
            else
              return remaining;
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-dropdown');
            const checkboxes = document.querySelectorAll('.checkbox-topico');
            const container = document.getElementById('papers-container');

            const drawer = document.getElementById('drawer-navigation');
            const paperCount = document.getElementById('paper-count')

            // Función para actualizar el sidebar segun resizing
            function updateDrawerPosition() {
                if (window.innerWidth >= 1024) {
                    // Vista de escritorio
                    drawer.style.transform = 'translateX(0)';
                    drawer.style.transition = 'none';
                } else {

                    if (drawer.style.transform !== 'translateX(0)') {
                        drawer.style.transition = 'transform 0.3s ease-in-out';
                    }
                }
            }

            // Cerrar
            function closeDrawer() {
                drawer.style.transform = 'translateX(-100%)';
            }

            // Mostrar
            function showDrawer() {
                drawer.style.transform = 'translateX(0)';
            }


            window.addEventListener('resize', updateDrawerPosition);

            // inicializar una llamada al principio
            updateDrawerPosition();


            document.querySelector('[data-drawer-show="drawer-navigation"]').addEventListener('click', showDrawer);
            document.querySelector('[data-drawer-hide="drawer-navigation"]').addEventListener('click', closeDrawer);

            // Guardar en localStorage
            function saveToLocalStorage(key, value) {
                localStorage.setItem(key, JSON.stringify(value));
            }

            // Cargar  de localStorage
            function loadFromLocalStorage(key) {
                const value = localStorage.getItem(key);
                return value ? JSON.parse(value) : null;
            }


            function getSearchParams() {
                const query = searchInput.value.trim();
                const selectedTopics = Array.from(checkboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => checkbox.value);

                const params = new URLSearchParams();
                if (query.length > 2) params.append('query', query);
                if (selectedTopics.length > 0) params.append('topics', selectedTopics.join(','));

                const newUrl = `/biblioteca/papers/search?${params.toString()}`;
                window.history.pushState(null, '', newUrl);
                console.log('[DEBUG] Params:', params.toString());
                return params;
            }

            // Renderización de resultados
            function renderPapers(papers) {
                container.innerHTML = '';
                if (papers.length > 0) {
                    papers.forEach(paper => {
                        const card = `
                    <div class="flex flex-col md:flex-row overflow-hidden rounded-lg shadow-xl mt-4 mx-2 bg-[#f4f4f4] max-w-6xl h-auto">
                        <div class="max-h-96 md:w-1/2 p-4">
                            <a href="/biblioteca/papers/${paper.id}" class="cursor-pointer hover:underline max-md:text-center">
                                <h3 class="font-semibold text-lg mt-4 text-blue-400">${paper.titulo}</h3>
                            </a>
                            <div class="mt-5">
                                <p class="text-gray-600">Autores:</p>
                                <p class="autores italic text-base mb-3">${paper.formatted_autores}</p>
                            </div>
                            <p class="doi text-sm mt-3"><span class="text-gray-600">DOI: </span>
                                <span class="doi-link underline text-gray-500 text-xs">${paper.doi}</span>
                            </p>
                            <p class="text-base mt-4">
                                <span class="text-gray-600">Publicado: </span>
                                <strong class="text-gray-700 uppercase font-semibold text-sm">${paper.fecha_publicacion}</strong>
                            </p>
                            <a href="/biblioteca/papers/${paper.id}" class="mt-2 flex gap-2 cursor-pointer font-bold">
                                <svg width="24px" height="24px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="none">
                                    <path fill="#98c560" fill-rule="evenodd" d="M8 3.517a1 1 0 011.62-.784l5.348 4.233a1 1 0 010 1.568l-5.347 4.233A1 1 0 018 11.983v-1.545c-.76-.043-1.484.003-2.254.218-.994.279-2.118.857-3.506 1.99a.993.993 0 01-1.129.096.962.962 0 01-.445-1.099c.415-1.5 1.425-3.141 2.808-4.412C4.69 6.114 6.244 5.241 8 5.042V3.517zm1.5 1.034v1.2a.75.75 0 01-.75.75c-1.586 0-3.066.738-4.261 1.835a8.996 8.996 0 00-1.635 2.014c.878-.552 1.695-.916 2.488-1.138 1.247-.35 2.377-.33 3.49-.207a.75.75 0 01.668.745v1.2l4.042-3.2L9.5 4.55z" clip-rule="evenodd"></path>
                                </svg>
                                <p class="text-[#98c560] text-base">Redirigir</p>
                            </a>    
                        </div>
                        <div class="w-full p-6 text-gray-800 flex flex-col justify-between">
                            <p class="mt-2 text-justify text-gray-500 text-sm">${paper.descripcion}</p>
                        </div>
                    </div>`;
                        container.insertAdjacentHTML('beforeend', card);
                    });
                } else {
                    container.innerHTML = ` <div class=" bg-slate-100 p-4 mt-6 rounded-md  max-w-6xl text-center flex justify-center flex-col items-center gap-y-4">
                                        <p class="text-gray-500 max-md:text-xl text-3xl font-semibold">No se encontraron papers.</p>
                                        <svg class="w-36 h-36 max-md:w-24 max-md:h-24"  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.999 511.999" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect x="113.732" y="333.561" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -200.477 216.8856)" style="fill:#DCDCDC;" width="95.668" height="33.757"></rect> <path style="fill:#42C8C6;" d="M455.969,326.571c-74.706,74.706-195.831,74.706-270.538,0l116.283-154.254L455.968,56.034 C530.676,130.74,530.676,251.863,455.969,326.571z"></path> <path style="fill:#81E3E2;" d="M455.969,56.033L185.432,326.571c-74.706-74.706-74.706-195.831,0-270.538 S381.262-18.674,455.969,56.033z"></path> <path style="fill:#D5F6F5;" d="M322.235,39.4v303.795c41.33-0.405,78.734-17.329,105.886-44.481 c27.49-27.49,44.492-65.467,44.492-107.416C472.613,107.917,405.425,40.222,322.235,39.4z"></path> <path style="fill:#FFFFFF;" d="M322.235,39.4c64.544,1.058,116.621,68.651,116.621,151.898s-52.077,150.84-116.621,151.897 c-0.506,0.011-1.024,0.011-1.53,0.011c-83.899,0-151.909-68.01-151.909-151.909c0-41.949,17.003-79.927,44.492-107.416 s65.467-44.492,107.416-44.492C321.211,39.389,321.729,39.389,322.235,39.4z"></path> <polygon style="fill:#737373;" points="166.494,393.243 142.624,417.113 94.883,401.2 150.58,377.33 "></polygon> <path style="fill:#FE834D;" d="M126.71,401.2L6.564,489.519l15.913,15.913c8.752,8.752,23.074,8.752,31.827,0l88.32-88.32 L126.71,401.2z"></path> <polygon style="fill:#969696;" points="150.58,377.33 126.71,401.2 94.883,401.2 94.883,369.373 118.754,345.502 "></polygon> <path style="fill:#FEA680;" d="M126.71,401.2l-88.32,88.32c-8.752,8.752-23.074,8.752-31.827,0c-8.752-8.752-8.752-23.074,0-31.827 l88.32-88.32L126.71,401.2z"></path> </g></svg>
                                        <small class="text-blue-400 max-md:text-sm ">Busca por más información</small>

                                    </div>`;
                }
            }

            // Realizar la búsqueda
            function performSearch() {
                const params = getSearchParams();
                fetch(`/api/biblioteca/papers/search?${params.toString()}`)
                    .then(response => {
                        if (!response.ok) throw new Error(`[HTTP ${response.status}] ${response.statusText}`);
                        return response.json();
                    })
                    .then(data => {
                        console.log('Server response:', data);
                        const {
                            papers,
                            total,
                            remaining
                        } = data;
                        renderPapers(papers || []);
                        paperCount.textContent = total;

                    //    saveToLocalStorage('papers', papers);
                        saveToLocalStorage('searchInput', searchInput.value);
                        saveToLocalStorage('checkboxStates', Array.from(checkboxes).map(cb => cb.checked));


                    })
                    .catch(error => console.error('Error durante búsqueda:', error));
            }

            function restoreState() {
              //  const savedPapers = loadFromLocalStorage('papers');
                const savedInput = loadFromLocalStorage('searchInput');
                const savedCheckboxStates = loadFromLocalStorage('checkboxStates');

               // if (savedPapers) renderPapers(savedPapers);
                if (savedInput) searchInput.value = savedInput;
                if (savedCheckboxStates) {
                    checkboxes.forEach((checkbox, index) => {
                        checkbox.checked = savedCheckboxStates[index] || false;
                    });
                }
            }

          
            restoreState();
            searchInput.addEventListener('input', performSearch);
            checkboxes.forEach(checkbox => checkbox.addEventListener('change', performSearch));



        });
    </script>


@endsection
