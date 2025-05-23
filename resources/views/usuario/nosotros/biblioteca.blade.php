@extends('usuario.layout.plantilla')

@section('title', 'paper')


@section('contenido')

    <section>

        <header class="home bg-cover mb-4 bg-center text-white"
            style="background-image: url('https://fondosmil.co/fondo/110721.jpg');">
            <div class="header-mask bg-[rgba(3,91,136,0.8)]">
                <div class="container mx-auto px-4">
                    <div class="jumbo text-center py-40">
                        <h1 class="text-6xl text-left">Publicaciones</h1>
                    </div>
                </div>
                    <!-- NAV DE Biblioteca -->
                <div class="nav">
                    <div class="container mx-auto px-4 flex items-center justify-between">


                        <nav role="navigation mt-4">
                            <ul class="hor--nav flex space-x-12">
                                <li><a href="{{ route('biblioteca.papers.index') }}"
                                        class="text-gray-300 hover:text-white">Publicaciones</a></li>               
                            </ul>

                        </nav>


                    </div>
                </div>
            </div>
        </header>


        <div class="Nosotros max-w-screen-2xl max w-full px-5 mx-auto mt-36">

            <div class="flex flex-col items-center gap-3 mb-12">
                <h2 class="text-blue-800 font-semibold text-4xl mb-1">Publicaciones-Papers</h2>
                <div class="blue-line w-1/3 h-0.5 bg-[#64d423]"></div>
            </div>
                  <!-- SIDEBAR PARA APLICAR FILTROS-->
            <div class="grid  grid-cols-10 gap-x-16 max-[1150px]:grid-cols-1 justify-center">

                <aside
                    class="w-[450px] max-[1150px]:bg-slate-50 max-[1150px]:w-[350px] max-[1150px]:z-50 max-[1150px]:fixed max-[1150px]:top-0 max-[1150px]:bottom-0 max-[1150px]:left-0 h-auto mt-12 max-[1150px]:mt-0 col-span-3 max-[1150px]:transform max-[1150px]:-translate-x-full max-[1150px]:transition-transform"
                    id="drawer-navigation">
                    <div class="px-3 py-4 overflow-y-auto rounded  ">
                        <ul class="space-y-2">
                            <li>
                                <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase ">
                                    Menu</h5>
                                <button type="button" data-drawer-hide="drawer-navigation"
                                    aria-controls="drawer-navigation"
                                    class="max-[1150px]:block hidden text-black text-2xl">X</button>

                            </li>
                            <div class=" space-y-2 max-md:overflow-y-visible">
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

                                            <input
                                                class="peer h-full w-full outline-none text-sm text-gray-700 pr-2 border-0"
                                                type="text" id="search-dropdown" placeholder="Buscar Titulo Paper..." />
                                        </div>
                                    </div>
                                </li>
                                <hr>
                                <li>
                                    <button type="button"
                                        class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 bg-gray-50 "
                                        aria-controls="dropdown-example-2" data-collapse-toggle="dropdown-example-2">
                                        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 "
                                            width="64px" height="64px" viewBox="0 0 32 32" id="i-options"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentcolor"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
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
                                    <ul id="dropdown-example-2" class=" hidden py-2 space-y-2 overflow-y-auto max-h-52">
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
                                      <!-- FILTRO AREAS DE INVESTIGACION -->
                                    <button type="button"
                                        class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 bg-gray-50 "
                                        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                                        <svg class="flex-shrink-0 w-6 h-6" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M2 7a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H3a1 1 0 0 1-1-1zm0 5a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2H3a1 1 0 0 1-1-1zm1 4a1 1 0 1 0 0 2h10a1 1 0 1 0 0-2H3z"
                                                    fill="#000000"></path>
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
                                    <ul id="dropdown-example" class=" py-2 space-y-2 overflow-y-auto max-h-52">
                                        @forelse($areas as $area)
                                            <li>
                                                <button type="button" value="{{ $area->id }}"
                                                    class="area-btn flex items-center w-full p-2 text-base font-normal text-gray-600 transition duration-75 rounded-lg group hover:bg-gray-100  ">{{ $area->nombre }}</button>
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
                                    <a href="{{ route('contacto') }}"
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
                                        <span class="flex-1 ml-3 whitespace-nowrap">Contactanos</span>
                                    </a>
                                </li>
                            </div>

                        </ul>
                    </div>
                </aside>



                <div class="pt-6 pb-12  col-span-7 ">
                    <div class=" w-auto mx-2 overflow-y-auto">
                        <div id="card" class="">
                             <!-- BARRA PARA MOSTRAR PAGINA -->
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
                                            id="paper-count">{{ count($papers) }}</span> resultados <span
                                            class=" ml-2 text-sm"> Pag. <span class=" text-white"
                                                id="current-page">{{ $papers->currentPage() }}</span>-<span
                                                class="text-white" id="pages">{{ $papers->lastPage() }}</span></span>
                                    </p>

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
                                    @include('usuario.nosotros.partials.papers', ['papers' => $papers])
                                @endif
                            </div>
                        </div>
                    </div>
                        <!-- BOTON DE VER MÁS PUBLICACIONES -->
                    <div class="flex justify-center mt-5 p-6 ">
                        <button id="load-more"
                            class="bg-[#98c560]  text-white text-lg font-bold py-3 px-6 rounded-lg hover:bg-[#66b308] transition-all duration-300">
                            VER MÁS PUBLICACIONES
                        </button>
                    </div>
                    <div class="mt-4 px-4" id="pagination-links">
                        {!! $papers->withQueryString()->links('vendor.pagination.simple-without-buttons') !!}
                    </div>



                </div>
            </div>
        </div>

    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const drawer = document.getElementById('drawer-navigation');
            // Función para actualizar el sidebar segun resizing
            function updateDrawerPosition() {
                if (window.innerWidth >= 1150) {
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

            document.addEventListener('click', (event) => {
                if (window.innerWidth >= 1150) return;

                const isClickInside = drawer.contains(event.target);
                const isMenuButton = event.target.closest('#menuBtn');

                if (!isClickInside && !isMenuButton) {
                    closeDrawer();
                }
            });


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

        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-dropdown');
            const checkboxes = document.querySelectorAll('.checkbox-topico');
            const areaBtns = document.querySelectorAll('.area-btn')
            const container = document.getElementById('papers-container');
            const paginationLinks = document.getElementById('pagination-links');
            const paperCount = document.getElementById('paper-count')
            const papersContainer = document.getElementById('papers-container');
            const loadMoreButton = document.getElementById('load-more');
            const pageInfo = document.getElementById('current-page');
            const pagesInfo = document.getElementById('pages');
            let currentSearchParams = new URLSearchParams();
            let generalPapersCount = 0;
            let isSearchActive = false;
            let selectedAreaId = null;
            const API_BASE = '/api/biblioteca/papers';
            const UI_BASE = '/biblioteca/papers';

            const urlParams = new URLSearchParams(window.location.search);

            // Initializar los parametros url
            if (urlParams.has('query') && searchInput) {
                searchInput.value = urlParams.get('query');
            }


            if (urlParams.has('topics')) {
                const selectedTopics = urlParams.get('topics').split(',');
                checkboxes.forEach(checkbox => {
                    if (selectedTopics.includes(checkbox.value)) {
                        checkbox.checked = true;
                    }
                });
            }

            // Initialize area buttons
            if (urlParams.has('area')) {
                selectedAreaId = urlParams.get('area');
                areaBtns.forEach(btn => {
                    if (btn.value === selectedAreaId) {
                        btn.classList.add('bg-gray-100', 'text-gray-700');
                    }
                });
            }

            // Fetch papers basado en los URL
            if (urlParams.toString()) {
                loadPage(urlParams);
            }
            // links de paginación
            if (paginationLinks) {
                paginationLinks.addEventListener('click', function(e) {
                    if (e.target.tagName === 'A') {
                        e.preventDefault();
                        const url = new URL(e.target.href);
                        currentSearchParams = url.searchParams;
                        loadPage(url.searchParams);
                    }
                });
            }

            if (loadMoreButton) {
                loadMoreButton.addEventListener('click', function() {
                    const page = currentSearchParams.get('page') ?
                        parseInt(currentSearchParams.get('page')) :
                        1;
                    console.log("page", page)
                    currentSearchParams.delete('query');
                    currentSearchParams.delete('topics');
                    currentSearchParams.delete('area');
                    currentSearchParams.set('page', page);
                    checkboxes.forEach(checkbox => (checkbox.checked = false));
                    areaBtns.forEach(btn => btn.classList.remove('bg-gray-100', 'text-gray-700'));

                    console.log(`${API_BASE}/fetch-more?${currentSearchParams}`)
                    fetch(`${API_BASE}/fetch-more?${currentSearchParams}`)
                        .then(handleResponse)
                        .then(data => {
                            // Agregar más papers
                            papersContainer.innerHTML = ' '
                            searchInput.value = ' '
                            papersContainer.innerHTML += data.html;

                            // ACTUALIZAR CONTEO
                            generalPapersCount += data.total;
                            updatePaperCount(generalPapersCount);


                            // ACTUALIZAR STADO DE LA INTERFAZ DE USUARIO
                            updateHistory(currentSearchParams);
                            toggleLoadMoreButton(data);
                        });
                });
            }

            function showNoResultsMessage() {
                papersContainer.innerHTML = ` <div class=" bg-slate-100 p-4 mt-6 rounded-md  max-w-6xl text-center flex justify-center flex-col items-center gap-y-4">
                                        <p class="text-gray-500 max-md:text-xl text-3xl font-semibold">No se encontraron papers.</p>
                                        <svg class="w-36 h-36 max-md:w-24 max-md:h-24"  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.999 511.999" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect x="113.732" y="333.561" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -200.477 216.8856)" style="fill:#DCDCDC;" width="95.668" height="33.757"></rect> <path style="fill:#42C8C6;" d="M455.969,326.571c-74.706,74.706-195.831,74.706-270.538,0l116.283-154.254L455.968,56.034 C530.676,130.74,530.676,251.863,455.969,326.571z"></path> <path style="fill:#81E3E2;" d="M455.969,56.033L185.432,326.571c-74.706-74.706-74.706-195.831,0-270.538 S381.262-18.674,455.969,56.033z"></path> <path style="fill:#D5F6F5;" d="M322.235,39.4v303.795c41.33-0.405,78.734-17.329,105.886-44.481 c27.49-27.49,44.492-65.467,44.492-107.416C472.613,107.917,405.425,40.222,322.235,39.4z"></path> <path style="fill:#FFFFFF;" d="M322.235,39.4c64.544,1.058,116.621,68.651,116.621,151.898s-52.077,150.84-116.621,151.897 c-0.506,0.011-1.024,0.011-1.53,0.011c-83.899,0-151.909-68.01-151.909-151.909c0-41.949,17.003-79.927,44.492-107.416 s65.467-44.492,107.416-44.492C321.211,39.389,321.729,39.389,322.235,39.4z"></path> <polygon style="fill:#737373;" points="166.494,393.243 142.624,417.113 94.883,401.2 150.58,377.33 "></polygon> <path style="fill:#FE834D;" d="M126.71,401.2L6.564,489.519l15.913,15.913c8.752,8.752,23.074,8.752,31.827,0l88.32-88.32 L126.71,401.2z"></path> <polygon style="fill:#969696;" points="150.58,377.33 126.71,401.2 94.883,401.2 94.883,369.373 118.754,345.502 "></polygon> <path style="fill:#FEA680;" d="M126.71,401.2l-88.32,88.32c-8.752,8.752-23.074,8.752-31.827,0c-8.752-8.752-8.752-23.074,0-31.827 l88.32-88.32L126.71,401.2z"></path> </g></svg>
                                        <small class="text-blue-400 max-md:text-sm ">Busca por más información</small>

                                    </div>`;
            }

            // Para mostrar más botones de carga
            function toggleLoadMoreButton(data) {
                if (loadMoreButton) {
                    const showButton = data.total === 0;
                    loadMoreButton.style.display = showButton ? 'block' : 'none';

                    if (paginationLinks) {
                        paginationLinks.style.display = showButton ? 'none' : 'block';
                    }
                }
            }
            // Handle search
            function performSearch() {
                isSearchActive = true;
                generalPapersCount = 0;
                const params = new URLSearchParams();
                const query = searchInput.value.trim();
                const topics = Array.from(checkboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => checkbox.value);
                console.log("area", selectedAreaId)

                if (query.length > 2) params.append('query', query);
                if (topics.length > 0) params.append('topics', topics.join(','));
                if (selectedAreaId) params.append('area', selectedAreaId);

                loadPage(params);
            }


            // Page Loader para la api
            async function loadPage(params) {
                try {
                    const response = await fetch(`${API_BASE}/search?${params}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    const data = await response.json();

                    console.log(data.total)
                    if (data.total === 0) {
                        paperCount.textContent = 0
                        showNoResultsMessage();
                    } else {
                        // Update UI
                        papersContainer.innerHTML = data.html;
                    }
                    updatePaperCount(data.total);
                    updateHistory(params);
                    togglePaginationElements(data);
                    updatePageInfo(data)

                } catch (error) {
                    console.error('Error:', error);
                    papersContainer.innerHTML =
                        `<div class="error">Error loading content: ${error.message}</div>`;
                }
            }

            // Update UI elements
            function togglePaginationElements(data) {
                if (paginationLinks) {
                    paginationLinks.innerHTML = data.links;
                    paginationLinks.style.display = data.total > 0 ? 'block' : 'none';
                }

                if (loadMoreButton) {
                    const showLoadMore = data.total === 0;
                    loadMoreButton.style.display = showLoadMore ? 'block' : 'none';
                    updatePaperCount(data.total);
                    updatePageInfo(data)
                }
            }

            function updatePaperCount(count) {
                if (paperCount)
                    paperCount.textContent = count
            }

            function updatePageInfo(data) {
                pageInfo.textContent = data.current_page
                pagesInfo.textContent = data.last_page;
            }

            function updateHistory(params) {
                const cleanURL = `${UI_BASE}?${params.toString()}`;
                window.history.pushState(null, '', cleanURL);
            }

            function handleResponse(response) {
                if (!response.ok) throw new Error(response.statusText);
                return response.json();
            }

            // Event listeners
            searchInput?.addEventListener('input', debounce(performSearch, 300));
            checkboxes.forEach(checkbox => checkbox.addEventListener('change', performSearch));
            areaBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    // Activar estado de selección
                    if (btn.classList.contains('bg-gray-100')) {
                        // Deseleccionar si ya estaba
                        btn.classList.remove('bg-gray-100', 'text-gray-700');
                        selectedAreaId = null;
                    } else {
                        // Quitar selección previa
                        areaBtns.forEach(b => b.classList.remove('bg-gray-100', 'text-gray-700'));
                        // Poner nueva selección
                        btn.classList.add('bg-gray-100', 'text-gray-700');
                        selectedAreaId = btn.value;
                    }
                    performSearch();
                });
            });

            // Ocultar boton al principio
            if (loadMoreButton) {
                loadMoreButton.style.display = 'none';
            }

            // Debounce helper
            function debounce(func, timeout = 100) {
                let timer;
                return (...args) => {
                    clearTimeout(timer);
                    timer = setTimeout(() => {
                        func.apply(this, args);
                    }, timeout);
                };
            }

            // Navegación del browser
            window.addEventListener('popstate', function() {
                const params = new URLSearchParams(window.location.search);
                loadPage(params);
            });

        });
    </script>

@endsection
