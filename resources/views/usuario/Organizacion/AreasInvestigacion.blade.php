@extends('usuario.layout.plantilla')
@section('contenido')
<section class="font-sans my-20 mx-0">
    <div class="container mx-auto mt-8 py-10 w-95">
        <div class="flex items-center justify-end -scroll-mr-20 md:mr-72 mb-10 flex-wrap">
            <a href="{{ route('capital_usuario') }}" class="text-gray-500 hover:text-gray-800 transition mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div class="text-center">
                <h2 class="text-blue-800 font-medium text-4xl mb-1">Áreas de Investigación</h2>
                <div class="w-72 h-[1.1px] bg-green-400 mx-auto mt-1"></div>
            </div>
            <a href="{{ route('direccion') }}"
                class="text-gray-500 hover:text-gray-800 transition ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
        <div class="sm:flex sm:justify-center sm:items-start flex-col sm:flex-row gap-4">
            <!-- Sidebar -->
            <div class="bg-gray-200 p-6 w-60 m-10 shadow-md rounded sm:sticky top-5"> {{-- //NO TOCAR!! --}}
                <ul id="categoryList" class="space-y-2">
                    <li><button onclick="showSection('investigadores', this)" id="defaultBtn" class="bloque block w-full text-left px-4 py-2 bg-blue-600 text-white rounded">Química</button></li>
                    <li><button onclick="showSection('egresados', this)" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Tecnología</button></li>
                    <li><button onclick="showSection('tesistas', this)" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Ciencias de la Vida</button></li>
                    <li><button onclick="showSection('pasantes', this)" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Ciencias Físicas</button></li>
                    <div id="extraCategories" class="hidden">
                        <li><button onclick="showSection('aliados', this)" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Inteligencia Artificial</button></li>
                        <li><button onclick="showSection('opcionExtra1', this)" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Nanotecnología</button></li>
                        <li><button onclick="showSection('opcionExtra2', this)" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Ciencia</button></li>
                        <li><button onclick="showSection('opcionExtra3', this)" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Nano</button></li>
                        <li><button onclick="showSection('opcionExtra4', this)" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Ambiente</button></li>
                    </div>
                    <li id="loadMoreBtn">
                        <button onclick="loadMoreCategories()" class="block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">
                            <img width="30" height="30" src="https://img.icons8.com/stickers/50/sort-down.png" alt="sort-down"/>
                        </button>
                    </li>
                </ul>                
            </div>
            <section class="w-3/4 pl-8 my-0 mx-4">

                <div id="investigadores" class="dynamic-section">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 text-lg">
                        @foreach($investigadores as $investigador)
                        <div class="relative w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl group overflow-hidden">
                            <img src="/user/template/images/{{ $investigador->foto }}" alt="{{ $investigador->foto }}" class="w-full h-[200px] object-cover rounded-t-xl">
                            <div class="px-4 py-6">
                                <span class="text-gray-600 text-lg font-bold">{{ $investigador->nombre }}</span>
                                <p class="text-sm text-black">Grado Académico: {{ $investigador->carrera }}</p>
                                <p class="text-sm text-black">Área de Investigación: {{ $investigador->areaInvestigacion->nombre }}</p>
                                <p class="text-sm text-black">Correo: {{ $investigador->correo }}</p>
                            </div>
                            <div class="absolute inset-0 bg-[#1E5397] bg-opacity-35 flex items-center justify-center opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 ease-in-out rounded-xl backdrop-blur-md">
                                <div class="flex flex-col gap-4">
                                    <a href="/user/template/uploads/pdfs/{{$investigador->cv }}" class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg text-center">
                                        CV
                                    </a>
                                    <a href="/user/template/uploads/pdfs/{{$investigador->linkedin }}" class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                        Linkedin
                                    </a>
                                    <a href="/user/template/uploads/pdfs/{{ $investigador->ctiVitae }}" class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                        CTI Vitae
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="bg-white p-4 shadow rounded text-center max-w-[17rem]">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/team-02.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <div class="text-sm sm:text-base">
                                <h4 class="font-semibold">Alejandro Torres</h4>
                                <p>ING. MECATRONICO</p>
                                <p>Área de Investigación: Robótica</p>
                            </div>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-center max-w-[17rem]">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/team-02.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <div class="text-sm sm:text-base">
                                <h4 class="font-semibold">Alejandro Torres</h4>
                                <p>ING. MECATRONICO</p>
                                <p>Área de Investigación: Robótica</p>
                            </div>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-center max-w-[17rem]">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/team-02.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <div class="text-sm sm:text-base">
                                <h4 class="font-semibold">Alejandro Torres</h4>
                                <p>ING. MECATRONICO</p>
                                <p>Área de Investigación: Robótica</p>
                            </div>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-center max-w-[17rem]">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/team-02.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <div class="text-sm sm:text-base">
                                <h4 class="font-semibold">Alejandro Torres</h4>
                                <p>ING. MECATRONICO</p>
                                <p>Área de Investigación: Robótica</p>
                            </div>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-center max-w-[17rem]">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/team-02.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <div class="text-sm sm:text-base">
                                <h4 class="font-semibold">Alejandro Torres</h4>
                                <p>ING. MECATRONICO</p>
                                <p>Área de Investigación: Robótica</p>
                            </div>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-center max-w-[17rem]">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/team-02.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <div class="text-sm sm:text-base">
                                <h4 class="font-semibold">Alejandro Torres</h4>
                                <p>ING. MECATRONICO</p>
                                <p>Área de Investigación: Robótica</p>
                            </div>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-center max-w-[17rem]">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/team-02.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <div class="text-sm sm:text-base">
                                <h4 class="font-semibold">Alejandro Torres</h4>
                                <p>ING. MECATRONICO</p>
                                <p>Área de Investigación: Robótica</p>
                            </div>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-center max-w-[17rem]">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/team-02.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <div class="text-sm sm:text-base">
                                <h4 class="font-semibold">Alejandro Torres</h4>
                                <p>ING. MECATRONICO</p>
                                <p>Área de Investigación: Robótica</p>
                            </div>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-center max-w-[17rem]">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/team-02.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <div class="text-sm sm:text-base">
                                <h4 class="font-semibold">Alejandro Torres</h4>
                                <p>ING. MECATRONICO</p>
                                <p>Área de Investigación: Robótica</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="egresados" class="dynamic-section hidden">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 text-lg">
                        @foreach($egresados as $egresado)
                        <div class="relative w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl group overflow-hidden">
                            <img src="/user/template/images/{{ $egresado->foto }}" alt="{{ $egresado->foto }}" class="w-full h-[200px] object-cover rounded-t-xl">
                            
                            <div class="px-4 py-6">
                                <span class="text-gray-600 text-lg font-bold">{{ $egresado->nombre }}</span>
                                <p class="text-sm text-black">Grado Académico: {{ $egresado->carrera }}</p>
                                <p class="text-sm text-black">Área de Investigación: {{ $egresado->areaInvestigacion->nombre }}</p>
                                <p class="text-sm text-black">Correo: {{ $egresado->correo }}</p>
                            </div>
                            <div class="absolute inset-0 bg-[#1E5397] bg-opacity-35 flex items-center justify-center opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 ease-in-out rounded-xl backdrop-blur-md">
                                <div class="flex flex-col gap-4">
                                    <a href="/user/template/uploads/pdfs/{{$egresado->cv }}" class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg text-center">
                                        CV
                                    </a>
                                    <a href="/user/template/uploads/pdfs/{{$egresado->linkedin }}" class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                        Linkedin
                                    </a>
                                    <a href="/user/template/uploads/pdfs/{{ $egresado->ctiVitae }}" class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                        CTI Vitae
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div id="tesistas" class="dynamic-section hidden">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 text-lg">
                        @foreach($tesistas as $tesista)
                        <div class="relative w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl group overflow-hidden">
                            <img src="/user/template/images/{{ $tesista->foto }}" alt="{{ $tesista->foto }}" class="w-full h-[200px] object-cover rounded-t-xl">
                            
                            <div class="px-4 py-6">
                                <span class="text-gray-600 text-lg font-bold">{{ $tesista->nombre }}</span>
                                <p class="text-sm text-black">Grado Académico: {{ $tesista->carrera }}</p>
                                <p class="text-sm text-black">Área de Investigación: {{ $tesista->areaInvestigacion->nombre }}</p>
                                <p class="text-sm text-black">Correo: {{ $tesista->correo }}</p>
                            </div>
                            <div class="absolute inset-0 bg-[#1E5397] bg-opacity-35 flex items-center justify-center opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 ease-in-out rounded-xl backdrop-blur-md">
                                <div class="flex flex-col gap-4 justify-center">
                                    <a href="/user/template/uploads/pdfs/{{$tesista->cv }}" class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg text-center">
                                        CV
                                    </a>
                                    <a href="/user/template/uploads/pdfs/{{$tesista->linkedin }}" class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                        Linkedin
                                    </a>
                                    <a href="/user/template/uploads/pdfs/{{ $tesista->ctiVitae }}" class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                        CTI Vitae
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div id="pasantes" class="dynamic-section hidden">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 text-lg">
                        <div class="bg-white p-4 shadow rounded text-center max-w-[17rem]">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/test.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <div class="text-sm sm:text-base">
                                <h4 class="font-semibold">Eduardo Salazar</h4>
                                <p>Ingeniero de Software</p>
                                <p>Área de Investigación: Sistemas Embebidos</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="aliados" class="dynamic-section hidden">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 text-lg">

                        <div class="bg-white p-4 shadow rounded text-center max-w-[17rem]">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/about-01.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <div class="text-sm sm:text-base">
                                <h4 class="font-semibold">Ecolnnovate</h4>
                                <p>Direcctor: Laura Martínez</p>
                                <p>Área de Investigación: Medio Ambiente</p>
                                <p>Descripción: Ecolnnovate se dedica a desarrollar soluciones sostenibles para la industria. Su misión es promover la innoación ecológica y la reducción de la huella de carbono</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="opcionExtra1" class="dynamic-section hidden">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 text-lg">
                        <div class="bg-white p-4 shadow rounded text-center max-w-[17rem]">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/team-02.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <div class="text-sm sm:text-base">
                                <h4 class="font-semibold">Alejandro Torres</h4>
                                <p>ING. MECATRONICO</p>
                                <p>Área de Investigación: Robótica</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="opcionExtra2" class="dynamic-section hidden">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 text-lg">
                        <div class="bg-white p-4 shadow rounded text-center max-w-[17rem]">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/team-02.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <div class="text-sm sm:text-base">
                                <h4 class="font-semibold">Alejandro Torres</h4>
                                <p>ING. MECATRONICO</p>
                                <p>Área de Investigación: Robótica</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="opcionExtra3" class="dynamic-section hidden">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 text-lg">
                        <div class="bg-white p-4 shadow rounded text-center max-w-[17rem]">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/team-02.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <div class="text-sm sm:text-base">
                                <h4 class="font-semibold">Alejandro Torres</h4>
                                <p>ING. MECATRONICO</p>
                                <p>Área de Investigación: Robótica</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="opcionExtra4" class="dynamic-section hidden">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 text-lg">
                        <div class="bg-white p-4 shadow rounded text-center max-w-[17rem]">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/team-02.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <div class="text-sm sm:text-base">
                                <h4 class="font-semibold">Alejandro Torres</h4>
                                <p>ING. MECATRONICO</p>
                                <p>Área de Investigación: Robótica</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="opcionExtra5" class="dynamic-section hidden">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 text-lg">
                        <div class="bg-white p-4 shadow rounded text-center max-w-[17rem]">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/team-02.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <div class="text-sm sm:text-base">
                                <h4 class="font-semibold">Alejandro Torres</h4>
                                <p>ING. MECATRONICO</p>
                                <p>Área de Investigación: Robótica</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

<script>
    let currentIndex = 0; 
    const categories = document.querySelectorAll("#extraCategories li"); 
    const loadMoreBtn = document.getElementById("loadMoreBtn");

    function showSection(sectionId, button) {
        // Ocultar todas las secciones
        document.querySelectorAll('.dynamic-section').forEach(section => {
            section.classList.add('hidden');
        });

        // Mostrar la sección seleccionada
        document.getElementById(sectionId).classList.remove('hidden');

        // Quitar la clase de resaltado de todos los botones
        document.querySelectorAll('.bloque').forEach(tab => {
            tab.classList.remove('bg-blue-600', 'text-white');
            tab.classList.add('hover:bg-gray-300', 'bg-gray-200');
        });

        // Resaltar el botón seleccionado
        button.classList.add('bg-blue-600', 'text-white');
        button.classList.remove('hover:bg-gray-300', 'bg-gray-200');
    }

    function loadMoreCategories() {
        for (let i = currentIndex; i < currentIndex + 4; i++) {
            if (categories[i]) {
                categories[i].classList.remove("hidden");
                loadMoreBtn.parentNode.insertBefore(categories[i], loadMoreBtn);
            }
        }
        currentIndex += 4;

        if (currentIndex >= categories.length) {
            loadMoreBtn.classList.add("hidden");
        }
    }

    // Mostrar el primer botón y su contenido al cargar la página
    document.addEventListener('DOMContentLoaded', function () {
        const defaultBtn = document.getElementById('defaultBtn');
        if (defaultBtn) {
            const defaultSection = defaultBtn.getAttribute('onclick').match(/'([^']+)'/)[1];
            showSection(defaultSection, defaultBtn);
        }
    });
</script>



@endsection