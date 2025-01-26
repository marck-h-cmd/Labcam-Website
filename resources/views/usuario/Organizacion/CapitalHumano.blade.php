@extends('usuario.layout.plantilla')
@section('contenido')
<section class="font-sans my-20 mx-0">
  
    <!-- Main Content -->
    <div class="container mx-auto mt-8 py-10 w-95">
        <div class="text-center">
            <h2 class="text-blue-800 font-semibold text-5xl mb-1">CAPITAL HUMANO</h2>
            <div class="w-72 h-[1.1px] bg-green-400 mx-auto mt-1"></div>
        </div>
  
        <div class="sm:flex sm:justify-center sm:items-start flex-col sm:flex-row gap-4">
            <!-- Sidebar -->
            <div class="bg-gray-200 p-6 w-60 m-10 shadow-md rounded">
                <ul class="space-y-2">
                    <li>
                        <button onclick="showSection('investigadores',this)" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Investigadores</button>
                    </li>
                    <li>
                        <button onclick="showSection('egresados',this)" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Egresados</button>
                    </li>
                    <li>
                         <button onclick="showSection('tesistas',this)" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Tesistas</button>
                    </li>
                    <li>
                        <button onclick="showSection('pasantes',this)" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Pasantes</button>
                    </li>
                    <li>
                        <button onclick="showSection('aliados',this)" class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Aliados</button>
                    </li>
                </ul>
            </div>
  
            <!-- Profiles -->
            <section class="w-full px-2 my-10">
                <!-- Investigadores Section -->
                <div id="investigadores" class="dynamic-section">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 text-lg">

                        {{-- -----Investigadores-------------- --}}
                        @foreach ($investigadores as $investigador)
                        <div class="relative w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl group overflow-hidden">
                            <a href="#" class="w-full h-full block">
                                <img src="/user/template/images/{{ $investigador->foto }}" alt="{{$investigador->foto }}" class="w-full h-[200px] object-cover rounded-t-xl" />
                                <div class="px-4 py-6 w-full min-h-[150px]">
                                    <span class="text-gray-600 mr-3 uppercase text-lg">{{$investigador->nombre}}</span>
                                <p class="text-lg text-black truncate block capitalize mt-3 select-none">
                                    Carrera: {{ $investigador->carrera}}
                                </p>
                                <p class="text-base font-normal text-black cursor-auto my-3 break-words select-none">
                                    Área de Investigación: 
                                    {{$investigador->areaInvestigacion->nombre}}
                                </p>
                                <p class="text-base text-black truncate block capitalize mt-3 select-none">
                                    Correo: {{$investigador->correo}}
                                </p>
                            </div>
                        </a>
                        <!-- Texto de hover con animación desde abajo y fondo difuminado -->
                        <div
                            class="absolute inset-0 bg-[#1E5397] bg-opacity-35 flex items-center justify-center opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 ease-in-out rounded-xl backdrop-blur-md">
                            <a href="/user/template/uploads/pdfs/{{ $investigador->cv}}" class="text-white text-base font-semibold select-none bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg cursor-pointer">
                                Ver CV
                            </a>
                        </div>
                    </div>
                        @endforeach
                    </div>
                </div>

                <!-- Egresados Section -->
                <div id="egresados" class="dynamic-section hidden">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 text-lg">
                            {{-- --------------CARTAS---------- --}}
                            @foreach ($egresados as $egresado)
                            <div class="relative w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl group overflow-hidden">
                                <a href="#" class="w-full h-full block">
                                    <img src="/user/template/images/{{ $egresado->foto }}" alt="{{$egresado->foto }}" class="w-full h-[200px] object-cover rounded-t-xl" />
                                    <div class="px-4 py-6 w-full min-h-[150px]">
                                        <span class="text-gray-600 mr-3 uppercase text-lg">{{$egresado->nombre}}</span>
                                    <p class="text-lg text-black truncate block capitalize mt-3 select-none">
                                        Carrera: {{ $egresado->carrera}}
                                    </p>
                                    <p class="text-base font-normal text-black cursor-auto my-3 break-words select-none">
                                        Área de Investigación: 
                                        {{$egresado->areaInvestigacion->nombre}}
                                    </p>
                                    <p class="text-base text-black truncate block capitalize mt-3 select-none">
                                        Correo: {{ $egresado->correo}}
                                    </p>
                                </div>
                            </a>
                            <!-- Texto de hover con animación desde abajo y fondo difuminado -->
                            <div
                                class="absolute inset-0 bg-[#1E5397] bg-opacity-35 flex items-center justify-center opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 ease-in-out rounded-xl backdrop-blur-md">
                                <a href="" class="text-white text-base font-semibold select-none bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg cursor-pointer">
                                    Ver CV
                                </a>
                            </div>
                        </div>
                            @endforeach
                    </div>
                </div>
    
                <!-- Tesistas Section -->
                <div id="tesistas" class="dynamic-section hidden">
                    <!-- Submenú Pregrado/Posgrado -->
                    <div class="flex justify-center mb-2 p-4">
                        <div class="bg-gray-300 rounded-lg shadow w-4/5 flex justify-evenly">
                            <button onclick="showTesistas('pregrado',this)" class="tesistas-tab block px-8 py-2 mx-2 rounded-md bg-gray-300 hover:bg-gray-400 active">PREGRADO</button>
                            <button onclick="showTesistas('posgrado',this)" class="tesistas-tab block px-8 py-2 mx-2 rounded-md bg-gray-300 hover:bg-gray-400">POSGRADO</button>
                        </div>
                    </div>

                    <!-- Contenido de Tesistas -->
                    <div id="pregrado" class="tesistas-content hidden">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 text-lg">
                            @foreach ($tesistas_pre as $tesista_pre)
                            <div class="relative w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl group overflow-hidden">
                                <a href="#" class="w-full h-full block">
                                    <img src="/user/template/{{ $tesista_pre->foto }}" alt="{{$tesista_pre->foto }}" class="w-full h-[200px] object-cover rounded-t-xl" />
                                    <div class="px-4 py-6 w-full min-h-[150px]">
                                        <span class="text-gray-600 mr-3 uppercase text-lg">{{$tesista_pre->nombre}}</span>
                                    <p class="text-lg text-black truncate block capitalize mt-3 select-none">
                                        Carrera: {{ $tesista_pre->carrera}}
                                    </p>
                                    <p class="text-base font-normal text-black cursor-auto my-3 break-words select-none">
                                        Área de Investigación: 
                                        {{$tesista_pre->areaInvestigacion->nombre}}
                                    </p>
                                    <p class="text-base text-black truncate block capitalize mt-3 select-none">
                                        Correo: {{ $tesista_pre->correo}}
                                    </p>
                                </div>
                            </a>
                            <!-- Texto de hover con animación desde abajo y fondo difuminado -->
                            <div
                                class="absolute inset-0 bg-[#1E5397] bg-opacity-35 flex items-center justify-center opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 ease-in-out rounded-xl backdrop-blur-md">
                                <a href="" class="text-white text-base font-semibold select-none bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg cursor-pointer">
                                    Ver CV
                                </a>
                            </div>
                        </div>
                            @endforeach
                        </div>
                    </div>

                    <div id="posgrado" class="tesistas-content hidden">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 text-lg">
                            @foreach ($tesistas_pos as $tesista_pos)
                            <div class="relative w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl group overflow-hidden">
                                <a href="#" class="w-full h-full block">
                                    <img src="/user/template/{{ $tesista_pos->foto }}" alt="{{$tesista_pos->foto }}" class="w-full h-[200px] object-cover rounded-t-xl" />
                                    <div class="px-4 py-6 w-full min-h-[150px]">
                                        <span class="text-gray-600 mr-3 uppercase text-lg">{{$tesista_pos->nombre}}</span>
                                    <p class="text-lg text-black truncate block capitalize mt-3 select-none">
                                        Carrera: {{ $tesista_pos->carrera}}
                                    </p>
                                    <p class="text-base font-normal text-black cursor-auto my-3 break-words select-none">
                                        Área de Investigación: 
                                        {{$tesista_pos->areaInvestigacion->nombre}}
                                    </p>
                                    <p class="text-base text-black truncate block capitalize mt-3 select-none">
                                        Correo: {{$tesista_pos->correo}}
                                    </p>
                                </div>
                            </a>
                            <!-- Texto de hover con animación desde abajo y fondo difuminado -->
                            <div
                                class="absolute inset-0 bg-[#1E5397] bg-opacity-35 flex items-center justify-center opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 ease-in-out rounded-xl backdrop-blur-md">
                                <a href="" class="text-white text-base font-semibold select-none bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg cursor-pointer">
                                    Ver CV
                                </a>
                            </div>
                        </div>
                            @endforeach
                        </div>
                    </div>
                </div>

    
                <!-- Pasantes Section -->
                <div id="pasantes" class="dynamic-section hidden">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 text-lg">
                        @foreach ($pasantes as $pasante)
                        <div class="relative w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl group overflow-hidden">
                            <a href="#" class="w-full h-full block">
                                <img src="/user/template/{{ $pasante->foto }}" alt="{{$pasante->foto }}" class="w-full h-[200px] object-cover rounded-t-xl" />
                                <div class="px-4 py-6 w-full min-h-[150px]">
                                    <span class="text-gray-600 mr-3 uppercase text-lg">{{$pasante->nombre}}</span>
                                <p class="text-lg text-black truncate block capitalize mt-3 select-none">
                                    Carrera: {{ $pasante->carrera}}
                                </p>
                                <p class="text-base font-normal text-black cursor-auto my-3 break-words select-none">
                                    Área de Investigación: 
                                    {{$pasante->areaInvestigacion->nombre}}
                                </p>
                                <p class="text-base text-black truncate block capitalize mt-3 select-none">
                                    Correo: {{ $pasante->correo}}
                                </p>
                            </div>
                        </a>
                        <!-- Texto de hover con animación desde abajo y fondo difuminado -->
                        <div
                            class="absolute inset-0 bg-[#1E5397] bg-opacity-35 flex items-center justify-center opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 ease-in-out rounded-xl backdrop-blur-md">
                            <a href="" class="text-white text-base font-semibold select-none bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg cursor-pointer">
                                Ver CV
                            </a>
                        </div>
                    </div>
                        @endforeach
                    </div>
                </div>
    
                <!-- Aliados Section -->
                <div id="aliados" class="dynamic-section hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-lg">
                        @foreach ($aliados as $aliado)
                        <div class="relative w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl group overflow-hidden">
                            <a href="#" class="w-full h-full block">
                                <img src="/user/template/{{ $aliado->foto }}" alt="{{ $aliado->foto }}" class="w-full h-[200px] object-cover rounded-t-xl" />
                                <div class="px-4 py-6 w-full min-h-[150px]">
                                    <span class="text-gray-600 mr-3 uppercase text-lg">{{$aliado->nombre}}</span>
                                <p class="text-lg text-black truncate block capitalize mt-3 select-none">
                                    Carrera: {{ $aliado->carrera}}
                                </p>
                                <p class="text-base font-normal text-black cursor-auto my-3 break-words select-none">
                                    Área de Investigación: 
                                    {{$aliado->areaInvestigacion->nombre}}
                                </p>
                                <p class="text-base text-black truncate block capitalize mt-3 select-none">
                                    Correo: {{ $aliado->correo}}
                                </p>
                            </div>
                        </a>
                        <!-- Texto de hover con animación desde abajo y fondo difuminado -->
                        <div
                            class="absolute inset-0 bg-[#1E5397] bg-opacity-35 flex items-center justify-center opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 ease-in-out rounded-xl backdrop-blur-md">
                            <a href="" class="text-white text-base font-semibold select-none bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg cursor-pointer">
                                Ver CV
                            </a>
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
        
    </script>
    
@endsection