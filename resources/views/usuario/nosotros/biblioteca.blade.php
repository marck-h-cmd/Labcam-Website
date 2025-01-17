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
                                <li><a href="#" class="text-gray-300 hover:text-white">Biblioteca</a></li>
                                <li><button id="mega-menu-dropdown-button" data-dropdown-toggle="mega-menu-dropdown"
                                        class="text-white font-bold flex justify-between">Áreas de Investigación <span
                                            class="py-2"> <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
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
                                                            <a href="{{ route('biblioteca.area', $area->id) }}"
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
                <div class="blue-line w-1/5 h-1 bg-[#2371d4]"></div>
            </div>

            <div class="grid  grid-cols-10 gap-x-16 max-lg:grid-cols-1 justify-center">
                <form class=" w-[450px]  max-[1200px]:hidden h-auto mt-12 col-span-3 " id="sidebar" aria-label="Sidebar">
                    <div class="px-3 py-4 overflow-y-auto rounded bg-gray-50 ">
                        <ul class="space-y-2">
                            <li>
                                <button id="closeBtn" class="max-[1024px]:block hidden text-black text-2xl">X</button>

                            </li>
                            <li>
                                <div class="flex justify-start ">
                                    <label for="search-dropdown"
                                        class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
                                    <button id="dropdown-button" data-dropdown-toggle="dropdown"
                                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 "
                                        type="button">All<svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg></button>
                                    <div id="dropdown"
                                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-auto">
                                        <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdown-button">
                                            <li>
                                                <button type="button"
                                                    class="inline-flex w-full px-4 py-2 hover:bg-gray-100 ">Titulo</button>
                                            </li>
                                            <li>
                                                <button type="button"
                                                    class="inline-flex w-full px-4 py-2 hover:bg-gray-100 ">Topicos</button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="relative w-full ">
                                        <input type="search" id="search-dropdown"
                                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                            placeholder="Search Title..." />
                                        <button type="button"
                                            class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none  ">
                                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                            </svg>
                                            <span class="sr-only">Search</span>
                                        </button>
                                    </div>
                                </div>
                            </li>
                            <hr>
                            <li>
                                <button type="button"
                                    class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100  "
                                    aria-controls="dropdown-example-2" data-collapse-toggle="dropdown-example-2">
                                    <!--             <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 "
                                            fill="#000000" width="64px" height="64px" viewBox="-4 -2 24 24"
                                            xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMin"
                                            class="jam jam-document-f">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M3 0h10a3 3 0 0 1 3 3v14a3 3 0 0 1-3 3H3a3 3 0 0 1-3-3V3a3 3 0 0 1 3-3zm1 7a1 1 0 1 0 0 2h8a1 1 0 0 0 0-2H4zm0 8a1 1 0 0 0 0 2h5a1 1 0 0 0 0-2H4zM4 3a1 1 0 1 0 0 2h8a1 1 0 0 0 0-2H4zm0 8a1 1 0 0 0 0 2h8a1 1 0 0 0 0-2H4z">
                                                </path>
                                            </g>
                                        </svg>  -->
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
                                                <input class="mr-2" type="checkbox" value="{{ $topico->id }}"
                                                    class="checkbox-topico">
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
                                            <a href="{{ route('biblioteca.area', $area->id) }}"
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
                                    <span
                                        class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full ">3</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </form>


                <div class="pt-6 pb-12  col-span-7">
                    <div class=" w-auto mx-2 overflow-y-auto">
                        <div id="card" class="">
                            <!-- container para papers -->
                            <div id="papers-container"class="container w-100 lg:w-4/5  mx-auto flex flex-col">
                                <!-- paper -->
                                <div class="px-4 ">
                                    <div
                                        class="p-4 w-full bg-[#98c560] rounded-l-3xl rounded-r-3xl flex justify-between items-center">
                                        <p class="text-gray-50 ">Mostrando {{ count($papers) }} resultados</p>
                                        <button id="menuBtn"
                                            class="max-[1024px]:block hidden bg-[#28ddc5] text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg">
                                            ☰
                                        </button>
                                    </div>
                                </div>
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
                                                <a href="{{ route('papers.show', $paper->id) }}"
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
                                                        class="doi-link underline text-gray-500 text-xs">{{ $paper->doi }}</span>
                                                </p>
                                                <p class="text-base  mt-4">
                                                    <span class="text-gray-600  ">Publicado: </span>
                                                    <strong class="text-gray-700 uppercase font-semibold text-sm ">
                                                        {{ $paper->fecha_publicacion }} </strong>
                                                </p>
                                                <a href="{{ route('papers.show', $paper->id) }}"
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

            const button = document.getElementById('load-more');

            button.addEventListener('click', function() {
                fetch(`/nosotros/biblioteca/fetch-more?offset=${offset}&limit=${limit}`)
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
                                          <a href="/nosotros/biblioteca/papers/${paper.id}" class="cursor-pointer hover:underline max-md:text-center">
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
                                          <a href="/nosotros/biblioteca/papers/${paper.id}" class="mt-2 flex gap-2 cursor-pointer font-bold">
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

                        } else {
                            button.style.display = 'none';
                        }


                    })
                    .catch(error => console.error('Error fetching data:', error));
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-dropdown');
            const checkboxes = document.querySelectorAll('.checkbox-topico');
            const container = document.getElementById('papers-container');


            document.getElementById("menuBtn").addEventListener("click", function() {
                document.getElementById("sidebar").classList.add("-translate-x-full");
            });

            document.getElementById("closeBtn").addEventListener("click", function() {
                document.getElementById("sidebar").classList.toggle("-translate-x-full");
            });


            function performSearch() {
                const query = searchInput.value.trim();
                const selectedTopics = Array.from(checkboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => checkbox.value);
                const params = new URLSearchParams();
                if (query.length > 2) {
                    params.append('query', query);
                }
                if (selectedTopics.length > 0) {
                    params.append('topics', selectedTopics.join(
                        ','));
                }

                fetch(`/nosotros/biblioteca/search?${params.toString()}`)
                    .then(response => response.json())
                    .then(data => {
                        const {
                            papers
                        } = data;
                        container.innerHTML = '';

                        if (papers.length > 0) {
                            papers.forEach(paper => {
                                const card = `
                          <div class="flex flex-col md:flex-row overflow-hidden rounded-lg shadow-xl mt-4 mx-2 bg-[#f4f4f4] max-w-6xl h-auto">
                              <div class="max-h-96 md:w-1/2 p-4">
                                  <a href="/nosotros/biblioteca/papers/${paper.id}" class="cursor-pointer hover:underline max-md:text-center">
                                      <h3 class="font-semibold text-lg mt-4 text-blue-400">${paper.titulo}</h3>
                                  </a>
                                  <div class="mt-5">
                                      <p class="text-gray-600">Autores:</p>
                                      <p class="autores italic text-base mb-3">${paper.formatted_autores}</p>
                                  </div>
                                  <p class="doi text-sm mt-3"><span class="text-gray-600">DOI: </span>
                                      <span class="doi-link underline text-gray-500 text-xs">${paper.doi }</span>
                                  </p>
                                  <p class="text-base mt-4">
                                      <span class="text-gray-600">Publicado: </span>
                                      <strong class="text-gray-700 uppercase font-semibold text-sm">${paper.fecha_publicacion}</strong>
                                  </p>
                                  <a href="/nosotros/biblioteca/papers/${paper.id}" class="mt-2 flex gap-2 cursor-pointer font-bold">
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
                            container.innerHTML =
                                '<p class="text-center text-gray-500">No se encontraron resultados.</p>';
                        }
                    })
                    .catch(error => console.error('Error en la búsqueda:', error));
            }


            searchInput.addEventListener('input', performSearch);


            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', performSearch);
            });

        });
    </script>


@endsection
