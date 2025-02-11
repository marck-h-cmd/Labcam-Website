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
            <div class="flex flex-col items-center justify-center w-full text-center my-4">
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
                <ul class="space-y-2">
                    <li>
                        <button onclick="showSection('investigadores',this)" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Quimica</button>
                    </li>
                    <li>
                        <button onclick="showSection('egresados',this)" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Tecnología</button>
                    </li>
                    <li>
                         <button onclick="showSection('tesistas',this)" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Medio Ambiente</button>
                    </li>
                    <li>
                        <button onclick="showSection('pasantes',this)" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Nanotecnología</button>
                    </li>
                    <li>
                        <button onclick="showSection('aliados',this)" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Inteligencia Artificial</button>
                    </li>
                </ul>

                <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded" type="button"> Más categorias 
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                <div id="dropdownHover" class="z-10 hidden divide-y divide-gray-100 rounded-lg shadow-sm w-44 ">
                    <ul class="space-py-2 text-sm text-gray-900 dark:text-gray-400" aria-labelledby="dropdownHoverButton">
                      <li>
                        <button onclick="showSection('investigadores',this)" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Btn1</button>
                      </li>
                      <li>
                        <button onclick="showSection('egresados',this)" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Btn2</button>
                      </li>
                      <li>
                        <button onclick="showSection('tesistas',this)" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Btn3</button>
                      </li>
                      <li>
                        <button onclick="showSection('aliados',this)"" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Btn4</button>
                      </li>
                      <li>
                        <button onclick="showSection('investigadores',this)" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Btn5</button>
                      </li>
                      <li>
                        <button onclick="showSection('egresados',this)" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Btn6</button>
                      </li>
                      <li>
                        <button onclick="showSection('tesistas',this)" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Btn7</button>
                      </li>
                      <li>
                        <button onclick="showSection('aliados',this)"" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Btn8</button>
                      </li>
                    </ul>
                </div>
            </div>

            <section class="w-3/4 pl-8 my-0 mx-4">
                <div id="investigadores" class="dynamic-section">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 text-lg">
                        @foreach($investigadores as $investigador)
                        <div class="relative w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl group overflow-hidden">
                            <div class="w-full h-48 flex justify-center overflow-hidden bg-gray-100">
                                <img src="/user/template/images/{{ $investigador->foto }}" alt="{{ $investigador->foto }}" class="h-full object-contain rounded-t-lg">
                            </div>
                            <div class="px-4 py-6">
                                <span class="text-gray-600 text-lg font-bold">{{ $investigador->nombre }}</span>
                                <p class="text-sm text-black">Grado Académico: {{ $investigador->carrera }}</p>
                                <p class="text-sm text-black">Área de Investigación: {{ $investigador->areaInvestigacion->nombre }}</p>
                                <p class="text-sm text-black break-words overflow-hidden text-ellipsis whitespace-nowrap">{{ $investigador->correo }}</p>
                            </div>
                            <div class="absolute inset-0 bg-[#1E5397] bg-opacity-35 flex items-center justify-center opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 ease-in-out rounded-xl backdrop-blur-md">
                                <div class="flex flex-col gap-4">
                                    <a href="/user/template/uploads/pdfs/{{$investigador->cv }}" class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg text-center">
                                        CV
                                    </a>
                                    <a href="/user/template/uploads/pdfs/{{$investigador->linkedin }}" class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                        Linkedin
                                    </a>
                                    <a href="/user/template/uploads/pdfs/{{ $investigador->ctivitae }}" class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                        CTI Vitae
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                
                <div id="egresados" class="dynamic-section hidden">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 text-lg">
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
                                    <a href="/user/template/uploads/pdfs/{{ $egresado->ctivitae }}" class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                        CTI Vitae
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div id="tesistas" class="dynamic-section hidden">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 text-lg">
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
                                    <a href="/user/template/uploads/pdfs/{{ $tesista->ctivitae }}" class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                        CTI Vitae
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div id="pasantes" class="dynamic-section hidden">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 text-lg">
                        @foreach($pasantes as $pasante)
                        <div class="relative w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl group overflow-hidden">
                            <img src="/user/template/images/{{ $pasante->foto }}" alt="{{ $pasante->foto }}" class="w-full h-[200px] object-cover rounded-t-xl">
                            <div class="px-4 py-6">
                                <span class="text-gray-600 text-lg font-bold">{{ $pasante->nombre }}</span>
                                <p class="text-sm text-black">Grado Académico: {{ $pasante->carrera }}</p>
                                <p class="text-sm text-black">Área de Investigación: {{ $pasante->areaInvestigacion->nombre }}</p>
                                <p class="text-sm text-black">Correo: {{ $pasante->correo }}</p>
                            </div>
                            <div class="absolute inset-0 bg-[#1E5397] bg-opacity-35 flex items-center justify-center opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 ease-in-out rounded-xl backdrop-blur-md">
                                <div class="flex flex-col gap-4 justify-center">
                                    <a href="/user/template/uploads/pdfs/{{$pasante->cv }}" class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg text-center">
                                        CV
                                    </a>
                                    <a href="/user/template/uploads/pdfs/{{$pasante->linkedin }}" class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                        Linkedin
                                    </a>
                                    <a href="/user/template/uploads/pdfs/{{ $pasante->ctivitae }}" class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                        CTI Vitae
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div id="aliados" class="dynamic-section hidden">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 text-lg">
                        @foreach($aliados as $aliado)
                        <div class="relative w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl group overflow-hidden">
                            <img src="/user/template/images/{{ $aliado->foto }}" alt="{{ $aliado->foto }}" class="w-full h-[200px] object-cover rounded-t-xl">
                            <div class="px-4 py-6">
                                <span class="text-gray-600 text-lg font-bold">{{ $aliado->nombre }}</span>
                                <p class="text-sm text-black">Grado Académico: {{ $aliado->carrera }}</p>
                                <p class="text-sm text-black">Área de Investigación: {{ $aliado->areaInvestigacion->nombre }}</p>
                                <p class="text-sm text-black">Correo: {{ $aliado->correo }}</p>
                            </div>
                            <div class="absolute inset-0 bg-[#1E5397] bg-opacity-35 flex items-center justify-center opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 ease-in-out rounded-xl backdrop-blur-md">
                                <div class="flex flex-col gap-4 justify-center">
                                    <a href="/user/template/uploads/pdfs/{{$aliado->cv }}" class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg text-center">
                                        CV
                                    </a>
                                    <a href="/user/template/uploads/pdfs/{{$aliado->linkedin }}" class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                        Linkedin
                                    </a>
                                    <a href="/user/template/uploads/pdfs/{{ $aliado->ctivitae }}" class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                        CTI Vitae
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

<script>
    function showSection(sectionId,button) {
        // Oculta todas las secciones
        document.querySelectorAll('.dynamic-section').forEach(section => {
            section.classList.add('hidden');
        });
        // Muestra la sección seleccionada
        document.getElementById(sectionId).classList.remove('hidden');
        // Resalta la pestaña activa
        document.querySelectorAll('.bloque').forEach(tab => {
            tab.classList.remove('bg-blue-600', 'text-white', 'active');
            tab.classList.add('bg-gray-200', 'hover:bg-gray-400');
        });
        //Resaltar botón seleccionado
        button.classList.add('bg-blue-600', 'text-white', 'active');

        // Asegura ocultar el menú después de elegir
        document.getElementById("dropdown-options").classList.add("hidden");
    }


    function showTesistas(tesistaId, button) {
        // Oculta todos los contenidos de tesistas
        document.querySelectorAll('.tesistas-content').forEach(content => {content.classList.add('hidden');});

        // Muestra el contenido seleccionado
        document.getElementById(tesistaId).classList.remove('hidden');

         // Resalta la pestaña activa
        document.querySelectorAll('.tesistas-tab').forEach(tab => {
            tab.classList.remove('bg-blue-600', 'text-white', 'active');
            tab.classList.add('bg-gray-300', 'hover:bg-gray-400');
        });

        button.classList.add('bg-blue-600', 'text-white', 'active');
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Mostrar la sección de investigadores y resaltar el botón
        showSection('investigadores', document.querySelector('[onclick="showSection(\'investigadores\',this)"]'));
    });


</script>

@endsection