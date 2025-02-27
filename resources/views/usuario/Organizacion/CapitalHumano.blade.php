@extends('usuario.layout.plantilla')

@section('contenido')
    <!-- Contenedor principal: en mobile se muestra en columna, en md+ en fila -->
    <section class="flex flex-col md:flex-row gap-12 w-full px-4 md:px-16 pb-12 relative">
        <!-- Menú fijo (ancho constante w-56 en md+; en mobile se mantiene ese ancho centrado) -->
        <div
            class="bg-gray-200 mt-4 md:mt-36 md:sticky md:top-36 px-4 py-8 w-56 shadow-md rounded-lg flex flex-col h-fit mx-auto md:mx-0">
            <div class="flex flex-col gap-4 w-full">
                <button onclick="showSection('investigadores',this)"
                    class="bloque text-base font-semibold w-full rounded-md py-2 hover:bg-blue-600 hover:text-white focus:outline-none">
                    Investigadores
                </button>
                <button onclick="showSection('egresados',this)"
                    class="bloque text-base font-semibold w-full rounded-md py-2 hover:bg-blue-600 hover:text-white focus:outline-none">
                    Egresados
                </button>
                <button onclick="showSection('tesistas',this)"
                    class="bloque text-base font-semibold w-full rounded-md py-2 hover:bg-blue-600 hover:text-white focus:outline-none">
                    Tesistas
                </button>
                <button onclick="showSection('pasantes',this)"
                    class="bloque text-base font-semibold w-full rounded-md py-2 hover:bg-blue-600 hover:text-white focus:outline-none">
                    Pasantes
                </button>
                <button onclick="showSection('aliados',this)"
                    class="bloque text-base font-semibold w-full rounded-md py-2 hover:bg-blue-600 hover:text-white focus:outline-none">
                    Aliados
                </button>
            </div>
        </div>

        <!-- Contenedor de la derecha: la grid se ajusta proporcionalmente -->
        <div class="flex-1 w-full">
            <!-- Encabezado -->
            <div class="grid grid-cols-3 items-center justify-center pt-8">
                <div class="flex justify-start">
                    <a href="{{ route('direccion') }}" class="text-gray-500 hover:text-gray-800 transition mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                </div>

                <div class="flex flex-col items-center mb-12">
                    <h2 class="text-blue-800 font-medium text-4xl text-center mb-1">Capital Humano</h2>
                    <div class="blue-line w-full h-0.5 bg-[#64d423]"></div>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('areas') }}" class="text-gray-500 hover:text-gray-800 transition ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Contenedor dinámico para las secciones -->
            <div id="contenido-dinamico" class="flex-1 p-4 w-full overflow-x-hidden">
                <!-- ===================== INVESTIGADORES ===================== -->
                <div id="investigadores" class="dynamic-section hidden">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8 text-lg">
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

                <!-- ===================== EGRESADOS ===================== -->
                <div id="egresados" class="dynamic-section hidden">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8 text-lg">
                        @foreach ($egresados as $egresado)
                            <div
                                class="relative w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl group overflow-hidden">
                                <img src="/user/template/images/{{ $egresado->foto }}" alt="{{ $egresado->foto }}"
                                    class="w-full h-[200px] object-cover rounded-t-xl">
                                <div class="px-4 py-6">
                                    <span class="text-gray-600 text-lg font-bold">{{ $egresado->nombre }}</span>
                                    <p class="text-sm text-black">Grado Académico: {{ $egresado->carrera }}</p>
                                    <p class="text-sm text-black">Área de Investigación:
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

                <!-- ===================== TESISTAS ===================== -->
                <div id="tesistas" class="dynamic-section hidden">
                    <!-- Submenú para Tesistas -->
                    <div class="flex justify-center mb-8 p-4">
                        <div class="bg-gray-300 rounded-lg shadow w-full max-w-md flex">
                            <button onclick="showTesistas('pregrado',this)"
                                class="tesistas-tab flex-1 py-2 rounded-md bg-gray-300 hover:bg-gray-400 active">
                                PREGRADO
                            </button>
                            <button onclick="showTesistas('posgrado',this)"
                                class="tesistas-tab flex-1 py-2 rounded-md bg-gray-300 hover:bg-gray-400">
                                POSGRADO
                            </button>
                        </div>
                    </div>
                    <div id="pregrado" class="tesistas-content hidden">
                        <div
                            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8 text-lg">
                            @foreach ($tesistas_pre as $tesista_pre)
                                <!-- Tarjeta similar -->
                                <div
                                    class="relative w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl group overflow-hidden">
                                    <img src="/user/template/images/{{ $tesista_pre->foto }}"
                                        alt="{{ $tesista_pre->foto }}" class="w-full h-[200px] object-cover rounded-t-xl">
                                    <div class="px-4 py-6">
                                        <span class="text-gray-600 text-lg font-bold">{{ $tesista_pre->nombre }}</span>
                                        <p class="text-sm text-black">Grado Académico: {{ $tesista_pre->carrera }}</p>
                                        <p class="text-sm text-black">Área de Investigación:
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
                        <div
                            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8 text-lg">
                            @foreach ($tesistas_pos as $tesista_pos)
                                <div
                                    class="relative w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl group overflow-hidden">
                                    <img src="/user/template/images/{{ $tesista_pos->foto }}"
                                        alt="{{ $tesista_pos->foto }}"
                                        class="w-full h-[200px] object-cover rounded-t-xl">
                                    <div class="px-4 py-6">
                                        <span class="text-gray-600 text-lg font-bold">{{ $tesista_pos->nombre }}</span>
                                        <p class="text-sm text-black">Grado Académico: {{ $tesista_pos->carrera }}</p>
                                        <p class="text-sm text-black">Área de Investigación:
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

                <!-- ===================== PASANTES ===================== -->
                <div id="pasantes" class="dynamic-section hidden">
                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8 text-lg">
                        @foreach ($pasantes as $pasante)
                            <div
                                class="relative w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl group overflow-hidden">
                                <img src="/user/template/images/{{ $pasante->foto }}" alt="{{ $pasante->foto }}"
                                    class="w-full h-[200px] object-cover rounded-t-xl">
                                <div class="px-4 py-6">
                                    <span class="text-gray-600 text-lg font-bold">{{ $pasante->nombre }}</span>
                                    <p class="text-sm text-black">Grado Académico: {{ $pasante->carrera }}</p>
                                    <p class="text-sm text-black">Área de Investigación:
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

                <!-- ===================== ALIADOS ===================== -->
                <div id="aliados" class="dynamic-section hidden">
                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8 text-lg">
                        @foreach ($aliados as $aliado)
                            <div
                                class="relative w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl group overflow-hidden">
                                <img src="/user/template/images/{{ $aliado->foto }}" alt="{{ $aliado->foto }}"
                                    class="w-full h-[200px] object-cover rounded-t-xl">
                                <div class="px-4 py-6">
                                    <span class="text-gray-600 text-lg font-bold">{{ $aliado->nombre }}</span>
                                    <p class="text-sm text-black">Grado Académico: {{ $aliado->carrera }}</p>
                                    <p class="text-sm text-black">Área de Investigación:
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
                <!-- Fin de secciones dinámicas -->
            </div>
        </div>
    </section>

    <script>
        function showSection(sectionId, button) {
            document.querySelectorAll('.dynamic-section').forEach(section => {
                section.classList.add('hidden');
            });
            document.getElementById(sectionId).classList.remove('hidden');

            document.querySelectorAll('.bloque').forEach(tab => {
                tab.classList.remove('bg-blue-600', 'text-white', 'active');
                tab.classList.add('hover:bg-blue-600', 'hover:text-white');
            });
            button.classList.add('bg-blue-600', 'text-white', 'active');
            if (sectionId === 'tesistas') {
                showTesistas('pregrado', document.querySelector('.tesistas-tab'));
            }
        }

        function showTesistas(tesistaId, button) {
            document.querySelectorAll('.tesistas-content').forEach(content => {
                content.classList.add('hidden');
            });
            document.getElementById(tesistaId).classList.remove('hidden');

            document.querySelectorAll('.tesistas-tab').forEach(tab => {
                tab.classList.remove('bg-blue-600', 'text-white', 'active');
                tab.classList.add('bg-gray-300', 'hover:bg-gray-400');
            });
            button.classList.add('bg-blue-600', 'text-white', 'active');
        }

        document.addEventListener('DOMContentLoaded', function() {
            showSection('investigadores', document.querySelector(
                '[onclick="showSection(\'investigadores\',this)"]'));
        });
    </script>
@endsection
