@extends('usuario.layout.plantilla')

@section('contenido')
    <section class="flex flex-wrap justify-center gap-12 h-full w-full px-16 mb-12 relative">
        <!-- Columna izquierda (Menú) -->
        <div class="bg-gray-200 mt-36 sticky top-36 px-4 py-8 w-max md:w-56 shadow-md rounded-lg flex md:flex-col h-fit">
            <div class="flex flex-col gap-4 w-full">
                <button
                    class="bloque-d text-center text-base font-semibold w-full rounded-md py-2 hover:bg-blue-600 hover:text-white focus:outline-none"
                    onclick="mostrarContenido('general',this)">Organigrama General</button>
                <button
                    class="bloque-d text-center text-base font-semibold w-full rounded-md py-2 hover:bg-blue-600 hover:text-white focus:outline-none"
                    onclick="mostrarContenido('jefe',this)">Jefe</button>
                <button
                    class="bloque-d text-center text-base font-semibold w-full rounded-md py-2 hover:bg-blue-600 hover:text-white focus:outline-none"
                    onclick="mostrarContenido('tecnico',this)">Técnico</button>
                <button
                    class="bloque-d text-center text-base font-semibold w-full rounded-lg py-2 hover:bg-blue-600 hover:text-white focus:outline-none"
                    onclick="mostrarContenido('investigador',this)">Investigador Principal</button>
            </div>
        </div>

        <!-- Columna derecha (Contenido dinámico) -->
        <div class="flex-1 w-full">
            <!-- Encabezado -->
            <div class="grid grid-cols-3 items-center justify-center pt-8">
                <div class="flex justify-start">
                    <!-- Botón de anterior -->
                    <a href="{{ route('areas') }}" class="text-gray-500 hover:text-gray-800 transition mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                </div>

                <div class="flex flex-col items-center mb-12">
                    <h2 class="text-blue-800 font-medium text-4xl mb-1">Dirección</h2>
                    <div class="blue-line w-full h-0.5 bg-[#64d423]"></div>
                </div>

                <div class="flex justify-end">
                    <!-- Botón de siguiente -->
                    <a href="{{ route('capital_usuario') }}" class="text-gray-500 hover:text-gray-800 transition ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <div id="contenido-dinamico" class="flex-1 p-4 w-full">
                <!-- General -->
                <div id="general" class="flex flex-col items-center gap-10">
                    <!-- Jefe -->
                    @foreach ($jefes as $jefe)
                        <div
                            class="text-center bg-white shadow-xl rounded-lg p-4 w-full max-w-[17rem] aspect-square flex flex-col justify-center items-center">
                            <img class="w-32 h-32 md:w-40 md:h-40 object-cover rounded-full border-2 border-gray-300"
                                src="/user/template/images/{{ $jefe->foto }}" alt="{{ $jefe->foto }}">
                            <h3 class="text-black font-semibold text-base mt-3">JEFE</h3>
                            <h3 class="text-black font-semibold text-base mt-3">{{ $jefe->nombre }}</h3>
                        </div>
                    @endforeach
                    <!-- Técnico e Investigador Principal -->
                    <div class="flex flex-wrap justify-center gap-16 w-full">
                        @foreach ($tecnicos as $tecnico)
                            <div
                                class="text-center bg-white shadow-xl rounded-lg p-4 w-full max-w-[17rem] aspect-square flex flex-col justify-center items-center">
                                <img class="w-32 h-32 md:w-40 md:h-40 object-cover rounded-full border-2 border-gray-300"
                                    src="/user/template/images/{{ $tecnico->foto }}" alt="{{ $tecnico->foto }}">
                                <h3 class="text-black font-semibold text-sm mt-3">TÉCNICO</h3>
                                <h3 class="text-black font-semibold text-sm mt-3">{{ $tecnico->nombre }}</h3>
                            </div>
                        @endforeach
                        <!-- Investigador Principal -->
                        @foreach ($invPs as $invP)
                            <div
                                class="text-center bg-white shadow-xl rounded-lg p-4 w-full max-w-[17rem] aspect-square flex flex-col justify-center items-center">
                                <img class="w-32 h-32 md:w-40 md:h-40 object-cover rounded-full border-2 border-gray-300"
                                    src="/user/template/images/{{ $invP->foto }}" alt="{{ $invP->foto }}">
                                <h3 class="text-black font-semibold text-base mt-3">INVESTIGADOR PRINCIPAL</h3>
                                <h3 class="text-black font-semibold text-base mt-3">{{ $invP->nombre }}</h3>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Jefe -->
                @foreach ($jefes as $jefe)
                    <div id="jefe" class="hidden">
                        <div class="text-center ">
                            <img src="/user/template/images/{{ $jefe->foto }}" alt="Profile"
                                class="mx-auto mb-4 w-40 h-40 md:w-48 md:h-48 object-cover rounded-full border-2 border-gray-300">
                            <h3 class="text-black font-semibold text-xl mb-2">{{ $jefe->nombre }}</h3>
                            <p class="text-gray-700 text-sm md:text-base">{{ $jefe->carrera }}</p>
                            <p class="text-wrap break-words max-w-5xl mx-auto text-gray-800">{{ $jefe->descripcion }}
                            </p>
                            <div class="flex justify-center items-center gap-4 w-full mt-4">
                                <a href="/user/template/uploads/pdfs/{{ $jefe->cv }}"
                                    class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg text-center">
                                    CV
                                </a>
                                <a href="{{ $jefe->linkedin }}"
                                    class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                    Linkedin
                                </a>
                                <a href="{{ $jefe->ctivitae }}"
                                    class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                    CTI Vitae
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Técnico -->
                <div id="tecnico" class="hidden">
                    @foreach ($tecnicos as $tecnico)
                        <div class="text-center">
                            <img src="/user/template/images/{{ $tecnico->foto }}" alt="{{ $tecnico->foto }}"
                                class="mx-auto mb-4 w-40 h-40 md:w-48 md:h-48 object-cover rounded-full border-2 border-gray-300">
                            <h3 class="text-black font-semibold text-xl mb-2">{{ $tecnico->nombre }}</h3>
                            <p class="text-gray-700 text-sm md:text-base">{{ $tecnico->carrera }}</p>
                            <p class="text-wrap break-words max-w-5xl mx-auto text-gray-800">
                                {{ $tecnico->descripcion }}
                            </p>
                            <div class="flex justify-center items-center gap-4 w-full mt-4">
                                <a href="/user/template/uploads/pdfs/{{ $tecnico->cv }}"
                                    class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg text-center">
                                    CV
                                </a>
                                <a href="{{ $tecnico->linkedin }}"
                                    class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                    Linkedin
                                </a>
                                <a href="{{ $tecnico->ctivitae }}"
                                    class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                    CTI Vitae
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Investigador Principal -->
                <div id="investigador" class="hidden">
                    @foreach ($invPs as $invP)
                        <div class="text-center">
                            <img src="/user/template/images/{{ $invP->foto }}" alt="{{ $invP->foto }}"
                                class="mx-auto mb-4 w-40 h-40 md:w-48 md:h-48 object-cover rounded-full border-2 border-gray-300">
                            <h3 class="text-black font-semibold text-xl mb-2">{{ $invP->nombre }}</h3>
                            <p class="text-gray-700 text-sm md:text-base">{{ $invP->carrera }}</p>
                            <p class="text-wrap break-words max-w-5xl mx-auto text-gray-800">{{ $invP->descripcion }}
                            </p>
                            <div class="flex justify-center items-center gap-4 w-full mt-4">
                                <a href="/user/template/uploads/pdfs/{{ $invP->cv }}"
                                    class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg text-center">
                                    CV
                                </a>
                                <a href="{{ $invP->linkedin }}"
                                    class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                    Linkedin
                                </a>
                                <a href="{{ $invP->ctivitae }}"
                                    class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                    CTI Vitae
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <script>
        function mostrarContenido(seccionId, button) {
            // Oculta todas las secciones
            document.querySelectorAll('#contenido-dinamico > div').forEach(section => {
                section.classList.add('hidden');
            });

            // Muestra solo la sección seleccionada
            document.getElementById(seccionId).classList.remove('hidden');

            // Resalta pestaña activa
            document.querySelectorAll('.bloque-d').forEach(tab => {
                tab.classList.remove('bg-blue-600', 'text-white');
                tab.classList.add('hover:bg-blue-600', 'hover:text-white');
            });

            // Resaltar botón seleccionado
            button.classList.add('bg-blue-600', 'text-white');
        }

        document.addEventListener('DOMContentLoaded', () => {
            const generalButton = document.querySelector('.bloque-d[onclick*="general"]');
            if (generalButton) {
                generalButton.classList.add('bg-blue-600', 'text-white');
            }
        });
    </script>
@endsection
