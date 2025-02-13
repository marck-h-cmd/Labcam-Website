@extends('usuario.layout.plantilla')

@section('contenido')
    <section class="flex flex-wrap justify-center gap-12 w-full px-16 pb-12 relative">
        <!-- Columna izquierda (Menú) -->
        <div class="bg-gray-200 mt-36 top-36 sticky px-4 py-8 w-max md:w-56 shadow-md rounded-lg flex md:flex-col h-fit">
            <div class="flex flex-col gap-4 w-full">
                <button onclick="showSection('investigadores',this)"
                    class="bloque text-base font-semibold w-full rounded-md py-2 hover:bg-blue-600 hover:text-white focus:outline-none">Investigadores</button>
                <button onclick="showSection('egresados',this)"
                    class="bloque text-base font-semibold w-full rounded-md py-2 hover:bg-blue-600 hover:text-white focus:outline-none">Egresados</button>
                <button onclick="showSection('tesistas',this)"
                    class="bloque text-base font-semibold w-full rounded-md py-2 hover:bg-blue-600 hover:text-white focus:outline-none">Tesistas</button>
                <button onclick="showSection('pasantes',this)"
                    class="bloque text-base font-semibold w-full rounded-md py-2 hover:bg-blue-600 hover:text-white focus:outline-none">Pasantes</button>
                <button onclick="showSection('aliados',this)"
                    class="bloque text-base font-semibold w-full rounded-md py-2 hover:bg-blue-600 hover:text-white focus:outline-none">Aliados</button>
            </div>
        </div>

        <section class="flex-1 w-full">
            <!-- Encabezado -->
            <div class="grid grid-cols-3 items-center justify-center pt-8">
                <div class="flex justify-start">
                    <!-- Botón de anterior -->
                    <a href="{{ route('direccion') }}" class="text-gray-500 hover:text-gray-800 transition mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                </div>

                <div class="flex flex-col items-center mb-12">
                    <h2 class="text-blue-800 font-medium text-4xl mb-1">Capital Humano</h2>
                    <div class="blue-line w-full h-0.5 bg-[#64d423]"></div>
                </div>

                <div class="flex justify-end">
                    <!-- Botón de siguiente -->
                    <a href="{{ route('areas') }}" class="text-gray-500 hover:text-gray-800 transition ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Investigadores Section -->
            <div id="investigadores" class="dynamic-section hidden flex-1 p-4 w-full">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-lg">
                    @foreach ($investigadores as $investigador)
                        <div
                            class="relative w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl group overflow-hidden">
                            <img src="/user/template/images/{{ $investigador->foto }}" alt="{{ $investigador->foto }}"
                                class="w-full h-[200px] object-cover rounded-t-xl">
                            <div class="px-4 py-6">
                                <span class="text-gray-600 text-lg font-bold">{{ $investigador->nombre }}</span>
                                <p class="text-sm text-black">Grado Académico: {{ $investigador->carrera }}</p>
                                <p class="text-sm text-black">Área de Investigación:
                                    {{ $investigador->areaInvestigacion->nombre }}</p>
                                <p class="text-sm text-black">Correo: {{ $investigador->correo }}</p>
                            </div>
                            <div
                                class="absolute inset-0 bg-[#1E5397] bg-opacity-35 flex items-center justify-center opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 ease-in-out rounded-xl backdrop-blur-md">
                                <div class="flex flex-col gap-4">
                                    <a href="/user/template/uploads/pdfs/{{ $investigador->cv }}"
                                        class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg text-center">
                                        CV
                                    </a>
                                    <a href="{{ $investigador->linkedin }}"
                                        class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                        Linkedin
                                    </a>
                                    <a href="{{ $investigador->ctivitae }}"
                                        class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                        Cti Vitae
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Egresados Section -->
            <div id="egresados" class="dynamic-section hidden flex-1 p-4 w-full">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-lg">
                    @foreach ($egresados as $egresado)
                        <div
                            class="relative w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl group overflow-hidden">
                            <img src="/user/template/images/{{ $egresado->foto }}" alt="{{ $egresado->foto }}"
                                class="w-full h-[200px] object-cover rounded-t-xl">
                            <div class="px-4 py-6">
                                <span class="text-gray-600 text-lg font-bold">{{ $egresado->nombre }}</span>
                                <p class="text-sm text-black">Grado Academico: {{ $egresado->carrera }}</p>
                                <p class="text-sm text-black"> Área de Investigación:
                                    {{ $egresado->areaInvestigacion->nombre }}</p>
                                <p class="text-sm text-black">Correo: {{ $egresado->correo }}</p>
                            </div>
                            <div
                                class="absolute inset-0 bg-[#1E5397] bg-opacity-35 flex items-center justify-center opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 ease-in-out rounded-xl backdrop-blur-md">
                                <div class="flex flex-col gap-4">
                                    <a href="/user/template/uploads/pdfs/{{ $egresado->cv }}"
                                        class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg text-center">
                                        CV
                                    </a>
                                    <a href="{{ $egresado->linkedin }}"
                                        class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                        Linkedin
                                    </a>
                                    <a href="{{ $egresado->ctivitae }}"
                                        class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                        Cti Vitae
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


            <!-- Tesistas Section -->
            <div id="tesistas" class="dynamic-section hidden flex-1 w-full">
                <!-- Submenú Pregrado/Posgrado -->
                <div class="flex justify-center mb-8 p-4">
                    <div class="bg-gray-300 rounded-lg shadow w-4/5 flex justify-evenly">
                        <button onclick="showTesistas('pregrado',this)"
                            class="tesistas-tab block px-8 py-2 mx-2 rounded-md bg-gray-300 hover:bg-gray-400 active">PREGRADO</button>
                        <button onclick="showTesistas('posgrado',this)"
                            class="tesistas-tab block px-8 py-2 mx-2 rounded-md bg-gray-300 hover:bg-gray-400">POSGRADO</button>
                    </div>
                </div>

                <!-- Contenido de Tesistas -->
                <div id="pregrado" class="tesistas-content hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-lg">
                        @foreach ($tesistas_pre as $tesista_pre)
                            <div
                                class="relative w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl group overflow-hidden">
                                <img src="/user/template/images/{{ $tesista_pre->foto }}" alt="{{ $tesista_pre->foto }}"
                                    class="w-full h-[200px] object-cover rounded-t-xl">
                                <div class="px-4 py-6">
                                    <span class="text-gray-600 text-lg font-bold">{{ $tesista_pre->nombre }}</span>
                                    <p class="text-sm text-black">Grado Academico: {{ $tesista_pre->carrera }}</p>
                                    <p class="text-sm text-black"> Área de Investigación:
                                        {{ $tesista_pre->areaInvestigacion->nombre }}</p>
                                    <p class="text-sm text-black">Correo: {{ $tesista_pre->correo }}</p>
                                </div>
                                <div
                                    class="absolute inset-0 bg-[#1E5397] bg-opacity-35 flex items-center justify-center opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 ease-in-out rounded-xl backdrop-blur-md">
                                    <div class="flex flex-col gap-4">
                                        <a href="/user/template/uploads/pdfs/{{ $tesista_pre->cv }}"
                                            class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg text-center">
                                            CV
                                        </a>
                                        <a href="{{ $tesista_pre->linkedin }}"
                                            class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                            Linkedin
                                        </a>
                                        <a href="{{ $tesista_pre->ctivitae }}"
                                            class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                            Cti Vitae
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div id="posgrado" class="tesistas-content hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-lg">
                        @foreach ($tesistas_pos as $tesista_pos)
                            <div
                                class="relative w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl group overflow-hidden">
                                <img src="/user/template/images/{{ $tesista_pos->foto }}" alt="{{ $tesista_pos->foto }}"
                                    class="w-full h-[200px] object-cover rounded-t-xl">
                                <div class="px-4 py-6">
                                    <span class="text-gray-600 text-lg font-bold">{{ $tesista_pos->nombre }}</span>
                                    <p class="text-sm text-black">Grado Academico: {{ $tesista_pos->carrera }}</p>
                                    <p class="text-sm text-black"> Área de Investigación:
                                        {{ $tesista_pos->areaInvestigacion->nombre }}</p>
                                    <p class="text-sm text-black">Correo: {{ $tesista_pos->correo }}</p>
                                </div>
                                <div
                                    class="absolute inset-0 bg-[#1E5397] bg-opacity-35 flex items-center justify-center opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 ease-in-out rounded-xl backdrop-blur-md">
                                    <div class="flex flex-col gap-4">
                                        <a href="/user/template/uploads/pdfs/{{ $tesista_pos->cv }}"
                                            class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg text-center">
                                            CV
                                        </a>
                                        <a href="{{ $tesista_pos->linkedin }}"
                                            class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                            Linkedin
                                        </a>
                                        <a href="{{ $tesista_pos->ctivitae }}"
                                            class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                            CTI Vitae
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


            <!-- Pasantes Section -->
            <div id="pasantes" class="dynamic-section hidden flex-1 p-4 w-full">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-lg">
                    @foreach ($pasantes as $pasante)
                        <div
                            class="relative w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl group overflow-hidden">
                            <img src="/user/template/images/{{ $pasante->foto }}" alt="{{ $pasante->foto }}"
                                class="w-full h-[200px] object-cover rounded-t-xl">
                            <div class="px-4 py-6">
                                <span class="text-gray-600 text-lg font-bold">{{ $pasante->nombre }}</span>
                                <p class="text-sm text-black">Grado Academico: {{ $pasante->carrera }}</p>
                                <p class="text-sm text-black"> Área de Investigación:
                                    {{ $pasante->areaInvestigacion->nombre }}</p>
                                <p class="text-sm text-black">Correo: {{ $pasante->correo }}</p>
                            </div>
                            <div
                                class="absolute inset-0 bg-[#1E5397] bg-opacity-35 flex items-center justify-center opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 ease-in-out rounded-xl backdrop-blur-md">
                                <div class="flex flex-col gap-4">
                                    <a href="/user/template/uploads/pdfs/{{ $pasante->cv }}"
                                        class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg text-center">
                                        CV
                                    </a>
                                    <a href="{{ $pasante->linkedin }}"
                                        class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                        Linkedin
                                    </a>
                                    <a href="{{ $pasante->ctivitae }}"
                                        class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                        Cti Vitae
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Aliados Section -->
            <div id="aliados" class="dynamic-section hidden flex-1 p-4 w-full">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-lg">
                    @foreach ($aliados as $aliado)
                        <div
                            class="relative w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl group overflow-hidden">
                            <img src="/user/template/images/{{ $aliado->foto }}" alt="{{ $aliado->foto }}"
                                class="w-full h-[200px] object-cover rounded-t-xl">
                            <div class="px-4 py-6">
                                <span class="text-gray-600 text-lg font-bold">{{ $aliado->nombre }}</span>
                                <p class="text-sm text-black">Grado Academico: {{ $aliado->carrera }}</p>
                                <p class="text-sm text-black"> Área de Investigación:
                                    {{ $aliado->areaInvestigacion->nombre }}</p>
                                <p class="text-sm text-black">Correo: {{ $aliado->correo }}</p>
                            </div>
                            <div
                                class="absolute inset-0 bg-[#1E5397] bg-opacity-35 flex items-center justify-center opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 ease-in-out rounded-xl backdrop-blur-md">
                                <div class="flex flex-col gap-4">
                                    <a href="/user/template/uploads/pdfs/{{ $aliado->cv }}"
                                        class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg text-center">
                                        CV
                                    </a>
                                    <a href="{{ $aliado->linkedin }}"
                                        class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                        Linkedin
                                    </a>
                                    <a href="{{ $aliado->ctivitae }}"
                                        class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                        Cti Vitae
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </section>

    <script>
        function showSection(sectionId, button) {
            // Oculta todas las secciones
            document.querySelectorAll('.dynamic-section').forEach(section => {
                section.classList.add('hidden');
            });

            // Muestra la sección seleccionada
            document.getElementById(sectionId).classList.remove('hidden');

            // Resalta la pestaña activa
            document.querySelectorAll('.bloque').forEach(tab => {
                tab.classList.remove('bg-blue-600', 'text-white');
                tab.classList.add('hover:bg-blue-600', 'hover:text-white');
            });

            //Resaltar botón seleccionado
            button.classList.add('bg-blue-600', 'text-white', 'active');
            if (sectionId === 'tesistas') {
                showTesistas('pregrado', document.querySelector('.tesistas-tab'));
            }
        }


        function showTesistas(tesistaId, button) {
            // Oculta todos los contenidos de tesistas
            document.querySelectorAll('.tesistas-content').forEach(content => {
                content.classList.add('hidden');
            });

            // Muestra el contenido seleccionado
            document.getElementById(tesistaId).classList.remove('hidden');

            // Resalta la pestaña activa
            document.querySelectorAll('.tesistas-tab').forEach(tab => {
                tab.classList.remove('bg-blue-600', 'text-white', 'active');
                tab.classList.add('bg-gray-300', 'hover:bg-gray-400');
            });
            button.classList.add('bg-blue-600', 'text-white', 'active');
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Mostrar la sección de investigadores y resaltar el botón
            showSection('investigadores', document.querySelector(
                '[onclick="showSection(\'investigadores\',this)"]'));
        });
    </script>
@endsection
