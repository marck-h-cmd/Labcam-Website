@extends('usuario.layout.plantilla')

@section('contenido')
    <!-- En pantallas pequeñas: columna (menu arriba, contenido abajo).
         En pantallas md+ : fila (menu a la izq, contenido a la derecha). -->
    <section class="flex flex-col md:flex-row gap-12 w-full px-4 md:px-16 mb-12 relative">

        <!-- Menú izquierdo -->
        <!-- w-full en mobile, w-56 en md+ -->
        <div class="bg-gray-200 mt-4 md:mt-36 md:sticky md:top-36 px-4 py-8 w-full md:w-56 shadow-md rounded-lg flex flex-col h-fit">
            <div class="flex flex-col gap-4 w-full">
                <button
                    class="bloque-d text-center text-base font-semibold w-full rounded-md py-2 hover:bg-blue-600 hover:text-white focus:outline-none"
                    onclick="mostrarContenido('general',this)">
                    Organigrama General
                </button>
                <button
                    class="bloque-d text-center text-base font-semibold w-full rounded-md py-2 hover:bg-blue-600 hover:text-white focus:outline-none"
                    onclick="mostrarContenido('jefe',this)">
                    Jefe
                </button>
                <button
                    class="bloque-d text-center text-base font-semibold w-full rounded-md py-2 hover:bg-blue-600 hover:text-white focus:outline-none"
                    onclick="mostrarContenido('tecnico',this)">
                    Técnico
                </button>
                <button
                    class="bloque-d text-center text-base font-semibold w-full rounded-lg py-2 hover:bg-blue-600 hover:text-white focus:outline-none"
                    onclick="mostrarContenido('investigador',this)">
                    Investigador Principal
                </button>
            </div>
        </div>

        <!-- Contenido a la derecha (o abajo en mobile) -->
        <div class="flex-1 w-full overflow-x-hidden">
            <!-- Encabezado -->
            <div class="grid grid-cols-3 items-center justify-center pt-8">
                <div class="flex justify-start">
                    <a href="{{ route('areas') }}" class="text-gray-500 hover:text-gray-800 transition mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                </div>

                <div class="flex flex-col items-center mb-12">
                    <h2 class="text-blue-800 font-medium text-4xl text-center mb-1">Dirección</h2>
                    <div class="blue-line w-full h-0.5 bg-[#64d423]"></div>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('capital_usuario') }}" class="text-gray-500 hover:text-gray-800 transition ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Contenedor dinámico para las secciones -->
            <div id="contenido-dinamico" class="flex-1 p-4 w-full overflow-x-hidden">
                <!-- ===================== SECCIÓN: Organigrama General ===================== -->
                <div id="general" class="flex flex-col items-center gap-10">
                    @foreach ($jefes as $jefe)
                        <div
                            class="text-center bg-white shadow-xl rounded-lg p-4 w-full max-w-[17rem] aspect-square flex flex-col justify-center items-center">
                            <img class="w-32 h-32 md:w-40 md:h-40 object-cover rounded-full border-2 border-gray-300"
                                 src="/user/template/images/{{ $jefe->foto }}" alt="{{ $jefe->foto }}">
                            <h3 class="text-black font-semibold text-base mt-3">JEFE</h3>
                            <h3 class="text-black font-semibold text-base mt-3">{{ $jefe->nombre }}</h3>
                        </div>
                    @endforeach
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

                <!-- ===================== SECCIÓN: Jefe ===================== -->
                <div id="jefe" class="hidden">
                    <div class="flex flex-col items-center gap-10">
                        @foreach ($jefes as $jefe)
                            <!-- Tarjeta vertical y algo más angosta para evitar scroll horizontal -->
                            <!-- Ajusta min-h si deseas más alto; quita si no quieres forzar altura mínima -->
                            <div class="text-center bg-white shadow-xl rounded-lg px-6 py-6 w-full max-w-2xl mx-auto min-h-[28rem] flex flex-col items-center">
                                <img src="/user/template/images/{{ $jefe->foto }}" alt="Profile"
                                     class="mb-4 w-40 h-40 md:w-48 md:h-48 object-cover rounded-full border-2 border-gray-300">
                                <h3 class="text-black font-semibold text-xl mb-2">{{ $jefe->nombre }}</h3>
                                <p class="text-gray-700 text-sm md:text-base whitespace-normal break-words w-full">
                                    {{ $jefe->carrera }}
                                </p>
                                <p class="text-gray-800 text-sm md:text-base whitespace-normal break-words mt-2 w-full">
                                    {{ $jefe->descripcion }}
                                </p>
                                <div class="flex flex-wrap justify-center items-center gap-4 w-full mt-4">
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
                        @endforeach
                    </div>
                </div>

                <!-- ===================== SECCIÓN: Técnico ===================== -->
                <div id="tecnico" class="hidden">
                    <div class="flex flex-col items-center gap-10">
                        @foreach ($tecnicos as $tecnico)
                            <div class="text-center bg-white shadow-xl rounded-lg px-6 py-6 w-full max-w-2xl mx-auto min-h-[28rem] flex flex-col items-center">
                                <img src="/user/template/images/{{ $tecnico->foto }}" alt="{{ $tecnico->foto }}"
                                     class="mb-4 w-40 h-40 md:w-48 md:h-48 object-cover rounded-full border-2 border-gray-300">
                                <h3 class="text-black font-semibold text-xl mb-2">{{ $tecnico->nombre }}</h3>
                                <p class="text-gray-700 text-sm md:text-base whitespace-normal break-words w-full">
                                    {{ $tecnico->carrera }}
                                </p>
                                <p class="text-gray-800 text-sm md:text-base whitespace-normal break-words mt-2 w-full">
                                    {{ $tecnico->descripcion }}
                                </p>
                                <div class="flex flex-wrap justify-center items-center gap-4 w-full mt-4">
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
                </div>

                <!-- ===================== SECCIÓN: Investigador Principal ===================== -->
                <div id="investigador" class="hidden">
                    <div class="flex flex-col items-center gap-10">
                        @foreach ($invPs as $invP)
                            <div class="text-center bg-white shadow-xl rounded-lg px-6 py-6 w-full max-w-2xl mx-auto min-h-[28rem] flex flex-col items-center">
                                <img src="/user/template/images/{{ $invP->foto }}" alt="{{ $invP->foto }}"
                                     class="mb-4 w-40 h-40 md:w-48 md:h-48 object-cover rounded-full border-2 border-gray-300">
                                <h3 class="text-black font-semibold text-xl mb-2">{{ $invP->nombre }}</h3>
                                <p class="text-gray-700 text-sm md:text-base whitespace-normal break-words w-full">
                                    {{ $invP->carrera }}
                                </p>
                                <p class="text-gray-800 text-sm md:text-base whitespace-normal break-words mt-2 w-full">
                                    {{ $invP->descripcion }}
                                </p>
                                <div class="flex flex-wrap justify-center items-center gap-4 w-full mt-4">
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
                <!-- Fin de secciones -->
            </div>
        </div>
    </section>

    <script>
        function mostrarContenido(seccionId, button) {
            // Oculta todas las secciones
            document.querySelectorAll('#contenido-dinamico > div').forEach(section => {
                section.classList.add('hidden');
            });

            // Muestra la sección seleccionada
            document.getElementById(seccionId).classList.remove('hidden');

            // Quita el color activo de todas las pestañas
            document.querySelectorAll('.bloque-d').forEach(tab => {
                tab.classList.remove('bg-blue-600', 'text-white');
                tab.classList.add('hover:bg-blue-600', 'hover:text-white');
            });

            // Aplica el color activo a la pestaña actual
            button.classList.add('bg-blue-600', 'text-white');
        }

        // Por defecto, Organigrama General
        document.addEventListener('DOMContentLoaded', () => {
            const generalButton = document.querySelector('.bloque-d[onclick*="general"]');
            if (generalButton) {
                generalButton.classList.add('bg-blue-600', 'text-white');
            }
        });
    </script>
@endsection
