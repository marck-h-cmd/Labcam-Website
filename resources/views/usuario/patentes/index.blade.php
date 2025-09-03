@extends('usuario.layout.plantilla')

@section('title', 'patente')


@section('contenido')

    <section>

        <header class="home bg-cover mb-4 bg-center text-white"
            style="background-image: url('https://psicologosprincesa.com/wp-content/uploads/2025/03/Frame-15838-1.png');">
            <div class="header-mask bg-[rgba(3,91,136,0.8)]">
                <div class="container mx-auto px-4">
                    <div class="jumbo text-center py-20 md:py-40">
                        <h1 class="text-4xl md:text-5xl lg:text-6xl text-left">Patentes</h1>
                    </div>
                </div>

                <!-- NAV DE Biblioteca responsive -->
                <div class="nav">
                    <di|v class="container mx-auto px-4 flex items-center justify-between">
                        <nav role="navigation mt-4">
                            <ul class="hor--nav flex flex-wrap gap-4 md:gap-12 justify-center md:justify-start">
                                <li><a href="{{ route('biblioteca.patentes.index') }}"
                                        class="text-blue-300 hover:text-blue-500 text-sm md:text-base">Patentes</a></li>
                                <li><a href="{{ route('biblioteca.papers.index') }}"
                                        class="text-gray-300 hover:text-white text-sm md:text-base">Publicaciones</a></li>
                              
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>


        <div class="Nosotros max-w-screen-2xl max w-full px-5 mx-auto mt-36">

            <div class="flex flex-col items-center gap-2 md:gap-3 mb-8 md:mb-12">
                <h2 class="text-blue-800 font-semibold text-2xl sm:text-3xl md:text-4xl mb-1">Patentes</h2>
                <div class="blue-line w-2/3 sm:w-1/2 md:w-1/3 h-0.5 bg-[#64d423]"></div>
            </div>
            <!-- SIDEBAR PARA APLICAR FILTROS-->
            <div class="grid  grid-cols-10 gap-x-16 max-[1150px]:grid-cols-1 justify-center">

                <aside
                    class="w-[450px] max-[1150px]:bg-slate-50 max-[1150px]:w-[350px] max-[1150px]:z-50 max-[1150px]:fixed max-[1150px]:top-0 max-[1150px]:bottom-0 max-[1150px]:left-0 h-auto mt-12 max-[1150px]:mt-0 col-span-3 max-[1150px]:transform max-[1150px]:-translate-x-full max-[1150px]:transition-transform"
                    id="drawer-navigation">
                    <div class="px-3 py-4 overflow-y-auto rounded  ">
                        <ul class="space-y-2">
                            <li class="flex justify-between items-center">
                                <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase">
                                    Menu
                                </h5>
                                <div class="flex items-center space-x-2">
                                    <!-- Botón para limpiar filtros (inicialmente oculto) -->
                                    <button id="clear-filters-btn" onclick="patentesSystem.clearAllFilters()"
                                        class="clear-btn hover:bg-gray-100 px-3 py-1.5 rounded-md text-sm hidden flex items-center "
                                        title="Limpiar todos los filtros">
                                        <i class="fas fa-times-circle mr-1.5"></i> Limpiar
                                    </button>
                                    <button type="button" data-drawer-hide="drawer-navigation"
                                        aria-controls="drawer-navigation"
                                        class="max-[1150px]:block hidden text-black text-2xl">X</button>
                                </div>
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
                                                type="text" id="search-dropdown" placeholder="Buscar Titulo patente..." />
                                        </div>
                                    </div>
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
                                    class="p-2 md:p-4 w-full bg-[#98c560] rounded-l-3xl rounded-r-3xl flex justify-between items-center">
                                    <button id="menuBtn" data-drawer-target="drawer-navigation"
                                        data-drawer-show="drawer-navigation" aria-controls="drawer-navigation"
                                        class="max-[1150px]:block hidden bg-[#28ddc5] text-white w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center shadow-lg">
                                        <svg class="ml-3 w-5 h-5 md:w-6 md:h-6 text-gray-50 transition duration-75 group-hover:text-gray-900"
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
                                    <p class="text-gray-50 text-sm md:text-base">Cargando <span class="text-gray-100"
                                            id="patente-count">#</span> resultados <span
                                            class="ml-1 md:ml-2 text-xs md:text-sm" id="page-container"> Pag. <span
                                                class="text-white" id="current-page">#</span>-<span class="text-white"
                                                id="pages">#</span></span>
                                    </p>
                                </div>
                            </div>
                            <!-- container para patentes -->
                            <div id="patentes-container"
                                class="container w-100 lg:w-4/5  mx-auto flex flex-col overflow-y-visible">
                                <!-- patente -->


                            </div>
                        </div>
                    </div>

                    <div class="mt-4 px-4" id="pagination-links">

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
        class PatentesFilterSystem {
            constructor() {
                this.allpatentes = [];
                this.filteredpatentes = [];
                this.areas = [];

                // Configuración de paginación
                this.itemsPerPage = 8;
                this.currentPage = 1;

                // Estado de filtros
                this.filters = {
                    query: '',
                    areaId: null
                };

                // Elementos del DOM
                this.searchInput = document.getElementById('search-dropdown');
                this.areaBtns = document.querySelectorAll('.area-btn');
                this.patentesContainer = document.getElementById('patentes-container');
                this.patenteCount = document.getElementById('patente-count');
                this.pageInfo = document.getElementById('current-page');
                this.pagesInfo = document.getElementById('pages');
                this.paginationContainer = document.getElementById('pagination-links');
                this.pageContainer = document.getElementById('page-container');
                this.clearFiltersBtn = document.getElementById('clear-filters-btn');

                this.init();
            }

            async init() {
                try {
                    // Cargar todos los datos una sola vez
                    await this.loadAllData();

                    // Configurar event listeners
                    this.setupEventListeners();

                    // Aplicar filtros iniciales desde URL
                    this.applyUrlParams();

                    // Renderizar patentes iniciales
                    this.applyFiltersAndRender();

                    // Mostrar contenido principal
                    if (window.showMainContent) {
                        window.showMainContent();
                    }

                } catch (error) {
                    console.error('Error initializing patentes system:', error);
                    if (window.showLoadingError) {
                        window.showLoadingError('Error cargando las Patentes. Por favor, recarga la página.');
                    } else {
                        this.showError('Error cargando las Patentes');
                    }
                }
            }

            async loadAllData() {
                const response = await fetch('/api/biblioteca/patentes/all', {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                if (!response.ok) {
                    throw new Error('Error cargando datos');
                }

                const data = await response.json();

                this.allpatentes = data.patentes;
                this.areas = data.areas;
                this.filteredpatentes = [...this.allpatentes];
            }

            setupEventListeners() {
                // Búsqueda con debounce
                if (this.searchInput) {
                    this.searchInput.addEventListener('input', this.debounce(() => {
                        this.updateFilter('query', this.searchInput.value.trim());
                    }, 300));
                }


                // Botones de áreas
                this.areaBtns.forEach(btn => {
                    btn.addEventListener('click', () => {
                        const areaId = parseInt(btn.value);

                        // Toggle selección
                        if (this.filters.areaId === areaId) {
                            this.filters.areaId = null;
                            btn.classList.remove('bg-gray-100', 'text-gray-700');
                        } else {
                            // Remover selección anterior
                            this.areaBtns.forEach(b => b.classList.remove('bg-gray-100',
                                'text-gray-700'));

                            // Aplicar nueva selección
                            this.filters.areaId = areaId;
                            btn.classList.add('bg-gray-100', 'text-gray-700');
                        }

                        this.updateFilter('areaId', this.filters.areaId);
                    });
                });
            }

            updateFilter(filterType, value) {
                this.filters[filterType] = value;
                this.currentPage = 1; // Reset a la primera página
                this.applyFiltersAndRender();
                this.updateUrl();
            }

            applyFiltersAndRender() {
                // Aplicar todos los filtros
                this.filteredpatentes = this.allpatentes.filter(patente => {
                    return (this.matchesSearch(patente) &&
                        this.matchesArea(patente));
                });

                // Renderizar resultados
                this.renderpatentes();
                this.renderPagination();
                this.updateCounts();
                this.updateClearFiltersButton();
            }

            matchesSearch(patente) {
                if (!this.filters.query || this.filters.query.length < 3) return true;

                const searchTerm = this.filters.query.toLowerCase();
                const searchIn = [
                    patente.titulo
                ].join(' ').toLowerCase();

                return searchIn.includes(searchTerm);
            }

        
            matchesArea(patente) {
                if (!this.filters.areaId) return true;

                return patente.area_id === this.filters.areaId;
            }

            renderpatentes() {
                const startIndex = (this.currentPage - 1) * this.itemsPerPage;
                const endIndex = startIndex + this.itemsPerPage;
                const currentPagepatentes = this.filteredpatentes.slice(startIndex, endIndex);

                if (currentPagepatentes.length === 0) {
                    this.showNoResults();
                    return;
                }
                this.pageContainer.classList.remove('hidden');
                this.patentesContainer.innerHTML = currentPagepatentes.map(patente =>
                    this.renderpatenteCard(patente)
                ).join('');
            }

            renderpatenteCard(patente) {


                // Truncar título y descripción
                const truncatedTitle = this.truncateText(patente.titulo, 50);
                const truncatedDescription = this.truncateText(patente.descripcion , 500);

                return `
            <div class="flex flex-col md:flex-row overflow-hidden relative rounded-lg shadow-xl mt-4 mx-2 bg-[#f4f4f4] max-w-6xl py-2 h-auto">
                <p class="absolute right-6 px-2 md:top-2 font-semibold bg-gray-200 p-1 text-gray-600 rounded-lg text-sm">
                    ${patente.area_nombre || 'N.A'}
                </p>
                
                <!-- información del patente -->
                <div class="max-h-96 max-w-[400px] md:w-1/2 p-4">
                    <a href="/biblioteca/patentes/patente/${patente.id}"
                        class="cursor-pointer hover:underline max-md:text-center relative group">
                        <h3 class="font-semibold text-lg mt-4 text-blue-400 text-justify">
                            ${truncatedTitle}${patente.titulo.length > 50 ? '...' : ''}
                        </h3>
                        <!-- Titulo flotante completo -->
                        <div class="absolute z-30 left-0 mb-3 w-max max-w-xs bg-white text-black text-xs rounded-md px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300 shadow-lg">
                            ${patente.titulo}
                        </div>
                    </a>
                    
                    <div class="mt-5">
                        <p class="text-gray-600">Autores:</p>
                        <p class="autores italic text-base mb-3">
                            ${patente.formatted_autores}
                        </p>
                    </div>
                    

                    <p class="text-base mt-3">
                        <span class="text-gray-600">Publicado: </span>
                        <strong class="text-gray-700 uppercase font-semibold text-sm">
                            ${patente.fecha_publicacion }
                        </strong>
                    </p>
                    
                    <a href="/biblioteca/patentes/patente/${patente.id}"
                        class="mt-2 flex gap-2 cursor-pointer font-bold">
                        <svg width="24px" height="24px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill="#98c560" fill-rule="evenodd"
                                    d="M8 3.517a1 1 0 011.62-.784l5.348 4.233a1 1 0 010 1.568l-5.347 4.233A1 1 0 018 11.983v-1.545c-.76-.043-1.484.003-2.254.218-.994.279-2.118.857-3.506 1.99a.993.993 0 01-1.129.096.962.962 0 01-.445-1.099c.415-1.5 1.425-3.141 2.808-4.412C4.69 6.114 6.244 5.241 8 5.042V3.517zm1.5 1.034v1.2a.75.75 0 01-.75.75c-1.586 0-3.066.738-4.261 1.835a8.996 8.996 0 00-1.635 2.014c.878-.552 1.695-.916 2.488-1.138 1.247-.35 2.377-.33 3.49-.207a.75.75 0 01.668.745v1.2l4.042-3.2L9.5 4.55z"
                                    clip-rule="evenodd"></path>
                            </g>
                        </svg>
                        <p class="text-[#98c560] text-base">Redirigir</p>
                    </a>
                </div>
                
                <div class="w-full p-6 max-md:py-2 text-gray-800 flex flex-col justify-between">
                    <p class="mt-4 text-justify text-gray-500 text-sm">
                        ${truncatedDescription}${(patente.descripcion  || '').length > 500 ? '...' : ''}
                    </p>
                </div>
            </div>
        `;
            }

            // Función para truncar texto (similar a TruncateService de PHP)
            truncateText(text, maxLength) {
                if (!text) return '';
                if (text.length <= maxLength) return text;

                // Truncar por palabras completas
                const truncated = text.substr(0, maxLength);
                const lastSpace = truncated.lastIndexOf(' ');

                if (lastSpace > 0) {
                    return truncated.substr(0, lastSpace);
                }

                return truncated;
            }

            renderPagination() {
                const totalPages = Math.ceil(this.filteredpatentes.length / this.itemsPerPage);

                if (totalPages <= 1) {
                    this.paginationContainer.innerHTML = '';
                    return;
                }

                let paginationHTML = '<div class="flex justify-center items-center space-x-2">';

                // Botón anterior
                if (this.currentPage > 1) {
                    paginationHTML += `
                <button onclick="patentesSystem.goToPage(${this.currentPage - 1})" 
                    class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                    Anterior
                </button>
            `;
                }

                // Números de página
                const maxVisible = 5;
                let startPage = Math.max(1, this.currentPage - Math.floor(maxVisible / 2));
                let endPage = Math.min(totalPages, startPage + maxVisible - 1);

                if (endPage - startPage + 1 < maxVisible) {
                    startPage = Math.max(1, endPage - maxVisible + 1);
                }

                for (let i = startPage; i <= endPage; i++) {
                    const isActive = i === this.currentPage;
                    paginationHTML += `
                <button onclick="patentesSystem.goToPage(${i})" 
                    class="px-3 py-2 text-sm font-medium ${
                        isActive 
                            ? 'text-white bg-blue-600 border-blue-600' 
                            : 'text-gray-500 bg-white border-gray-300 hover:bg-gray-50'
                    } border rounded-md">
                    ${i}
                </button>
            `;
                }

                // Botón siguiente
                if (this.currentPage < totalPages) {
                    paginationHTML += `
                <button onclick="patentesSystem.goToPage(${this.currentPage + 1})" 
                    class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                    Siguiente
                </button>
            `;
                }

                paginationHTML += '</div>';
                this.paginationContainer.innerHTML = paginationHTML;
            }

            goToPage(page) {
                this.currentPage = page;
                this.renderpatentes();
                this.renderPagination();
                this.updateCounts();
                this.updateUrl();
                this.updateClearFiltersButton();

                // Scroll al inicio de los patentes
                this.patentesContainer.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }

            updateCounts() {
                if (this.patenteCount) {
                    this.patenteCount.textContent = this.filteredpatentes.length;
                }

                if (this.pageInfo) {
                    this.pageInfo.textContent = this.currentPage;
                }

                if (this.pagesInfo) {
                    const totalPages = Math.ceil(this.filteredpatentes.length / this.itemsPerPage);
                    this.pagesInfo.textContent = totalPages;
                }
            }

            showNoResults() {
                this.patentesContainer.innerHTML = `
            <div class="bg-slate-100 p-8 mt-6 rounded-md text-center">
                <div class="flex justify-center mb-4">
                   <svg class="w-36 h-36 max-md:w-24 max-md:h-24"  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.999 511.999" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect x="113.732" y="333.561" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -200.477 216.8856)" style="fill:#DCDCDC;" width="95.668" height="33.757"></rect> <path style="fill:#42C8C6;" d="M455.969,326.571c-74.706,74.706-195.831,74.706-270.538,0l116.283-154.254L455.968,56.034 C530.676,130.74,530.676,251.863,455.969,326.571z"></path> <path style="fill:#81E3E2;" d="M455.969,56.033L185.432,326.571c-74.706-74.706-74.706-195.831,0-270.538 S381.262-18.674,455.969,56.033z"></path> <path style="fill:#D5F6F5;" d="M322.235,39.4v303.795c41.33-0.405,78.734-17.329,105.886-44.481 c27.49-27.49,44.492-65.467,44.492-107.416C472.613,107.917,405.425,40.222,322.235,39.4z"></path> <path style="fill:#FFFFFF;" d="M322.235,39.4c64.544,1.058,116.621,68.651,116.621,151.898s-52.077,150.84-116.621,151.897 c-0.506,0.011-1.024,0.011-1.53,0.011c-83.899,0-151.909-68.01-151.909-151.909c0-41.949,17.003-79.927,44.492-107.416 s65.467-44.492,107.416-44.492C321.211,39.389,321.729,39.389,322.235,39.4z"></path> <polygon style="fill:#737373;" points="166.494,393.243 142.624,417.113 94.883,401.2 150.58,377.33 "></polygon> <path style="fill:#FE834D;" d="M126.71,401.2L6.564,489.519l15.913,15.913c8.752,8.752,23.074,8.752,31.827,0l88.32-88.32 L126.71,401.2z"></path> <polygon style="fill:#969696;" points="150.58,377.33 126.71,401.2 94.883,401.2 94.883,369.373 118.754,345.502 "></polygon> <path style="fill:#FEA680;" d="M126.71,401.2l-88.32,88.32c-8.752,8.752-23.074,8.752-31.827,0c-8.752-8.752-8.752-23.074,0-31.827 l88.32-88.32L126.71,401.2z"></path> </g></svg>
                </div>
                <p class="text-gray-500 text-2xl font-semibold mb-2">No se encontraron patentes</p>
                <p class="text-blue-400">Intenta ajustar tus filtros de búsqueda</p>
                <button onclick="patentesSystem.clearAllFilters()" 
                    class="mt-4 px-4 py-2 bg-[#98c560]  text-white rounded-md hover:bg-[#98c260]">
                    Limpiar filtros
                </button>
            </div>
        `;

                this.pageContainer.classList.add('hidden');
            }

            showError(message) {
                this.patentesContainer.innerHTML = `
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                ${message}
            </div>
        `;
            }

            applyUrlParams() {
                const urlParams = new URLSearchParams(window.location.search);

                // Query de búsqueda
                if (urlParams.has('query') && this.searchInput) {
                    const query = urlParams.get('query');
                    this.searchInput.value = query;
                    this.filters.query = query;
                }

            
                // Área seleccionada
                if (urlParams.has('area')) {
                    const areaId = parseInt(urlParams.get('area'));
                    this.filters.areaId = areaId;
                    const areaBtn = document.querySelector(`button[value="${areaId}"]`);
                    if (areaBtn) {
                        areaBtn.classList.add('bg-gray-100', 'text-gray-700');
                    }
                }

                // Página actual
                if (urlParams.has('page')) {
                    this.currentPage = parseInt(urlParams.get('page')) || 1;
                }
                this.updateClearFiltersButton();
            }

            updateUrl() {
                const params = new URLSearchParams();

                if (this.filters.query && this.filters.query.length >= 3) {
                    params.set('query', this.filters.query);
                }


                if (this.filters.areaId) {
                    params.set('area', this.filters.areaId);
                }

                if (this.currentPage > 1) {
                    params.set('page', this.currentPage);
                }

                const newUrl = `${window.location.pathname}?${params.toString()}`;
                window.history.pushState(null, '', newUrl);
            }

            clearAllFilters() {
                // Limpiar estado de filtros
                this.filters.query = '';
                this.filters.areaId = null;
                this.currentPage = 1;

                // Limpiar UI
                if (this.searchInput) this.searchInput.value = '';

                this.areaBtns.forEach(btn => btn.classList.remove('bg-gray-100', 'text-gray-700'));

                // Re-renderizar
                this.applyFiltersAndRender();
                this.updateUrl();
                this.updateClearFiltersButton();
            }

            updateClearFiltersButton() {
                // Mostrar el botón solo si hay filtros activos
                const hasActiveFilters =
                    this.filters.query.length >= 3 ||
                    this.filters.areaId !== null;
                console.log('hasActiveFilters', this.filters.query.length,
                    this.filters.areaId)
                if (hasActiveFilters) {
                    this.clearFiltersBtn.classList.remove('hidden');
                } else {
                    this.clearFiltersBtn.classList.add('hidden');
                }
            }


            debounce(func, timeout = 300) {
                let timer;
                return (...args) => {
                    clearTimeout(timer);
                    timer = setTimeout(() => func.apply(this, args), timeout);
                };
            }
        }

        // Funciones globales para uso en templates
        function viewpatenteDetails(patenteId) {
            // Implementar modal o redirección a detalles del patente
            window.location.href = `/biblioteca/patentes/patente/${patenteId}`;
        }

        // Inicializar el sistema cuando el DOM esté listo
        let patentesSystem;
        document.addEventListener('DOMContentLoaded', function() {
            patentesSystem = new PatentesFilterSystem();

            // Manejar navegación del browser
            window.addEventListener('popstate', function() {
                patentesSystem.applyUrlParams();
                patentesSystem.applyFiltersAndRender();
            });
        });
    </script>

@endsection
