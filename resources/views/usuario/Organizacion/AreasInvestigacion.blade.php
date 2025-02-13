@extends('usuario.layout.plantilla')

@section('contenido')
    <section class="flex flex-wrap justify-center gap-12 h-full w-full px-16 pb-12">
        <!-- Menú de áreas de investigación -->
        <div class="bg-gray-200 mt-36 w-max md:w-56 shadow-md rounded-lg flex md:flex-col max-h-[310px]">
            <div class="flex flex-col px-4 py-8 gap-4 w-full h-full overflow-y-auto">
                @foreach ($areasInvestigacion as $area)
                    <button onclick="showSection('capital_area', this, '{{ $area->id }}')"
                        data-area-id="{{ $area->id }}"
                        class="bloque text-base font-semibold w-full rounded-md py-2 hover:bg-blue-600 hover:text-white focus:outline-none">
                        {{ $area->nombre }}
                    </button>
                @endforeach
            </div>
        </div>

        <section class="flex-1 w-full">
            <!-- Encabezado -->
            <div class="grid grid-cols-3 items-center justify-center pt-8">
                <div class="flex justify-start">
                    <!-- Botón de anterior -->
                    <a href="{{ route('capital_usuario') }}" class="text-gray-500 hover:text-gray-800 transition mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                </div>

                <div class="flex flex-col items-center mb-12">
                    <h2 class="text-blue-800 font-medium text-4xl mb-1">Áreas de Investigación</h2>
                    <div class="blue-line w-full h-0.5 bg-[#64d423]"></div>
                </div>

                <div class="flex justify-end">
                    <!-- Botón de siguiente -->
                    <a href="{{ route('direccion') }}" class="text-gray-500 hover:text-gray-800 transition ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Sección de capitales filtrados por área -->
            <div id="capital_area" class="dynamic-section hidden flex-1 p-4 w-full">
                @foreach ($areasInvestigacion as $area)
                    <!-- Cada contenedor tendrá un id único basado en el id del área -->
                    <div id="capital_area_{{ $area->id }}" class="capital-area-group hidden">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-lg">
                            @forelse ($capitales->where('area_investigacion', $area->id) as $capital)
                                <div
                                    class="relative w-full bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl group overflow-hidden">
                                    <img src="/user/template/images/{{ $capital->foto }}" alt="{{ $capital->foto }}"
                                        class="w-full h-[200px] object-cover rounded-t-xl">
                                    <div class="px-4 py-6">
                                        <span class="text-gray-600 text-lg font-bold">{{ $capital->nombre }}</span>
                                        <p class="text-sm text-black">Grado Académico: {{ $capital->carrera }}</p>
                                        <p class="text-sm text-black">Correo: {{ $capital->correo }}</p>
                                    </div>
                                    <div
                                        class="absolute inset-0 bg-[#1E5397] bg-opacity-35 flex items-center justify-center opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 ease-in-out rounded-xl backdrop-blur-md">
                                        <div class="flex flex-col gap-4">
                                            <a href="/user/template/uploads/pdfs/{{ $capital->cv }}"
                                                class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg text-center">
                                                CV
                                            </a>
                                            <a href="{{ $capital->linkedin }}"
                                                class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                                Linkedin
                                            </a>
                                            <a href="{{ $capital->ctivitae }}"
                                                class="text-white text-base bg-[#98C560] hover:bg-[#a6d073] px-3 py-2 rounded-lg">
                                                Cti Vitae
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500 col-span-full text-center">No se encontraron personas en el
                                    área {{ $area->nombre }}.</p>
                            @endforelse
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </section>

    <script>
        function showSection(sectionId, btn, areaId) {
            // Mostrar el contenedor principal si está oculto
            const mainSection = document.getElementById(sectionId);
            if (mainSection) {
                mainSection.classList.remove('hidden');
            }

            // Ocultar todos los contenedores de capitales
            document.querySelectorAll('.capital-area-group').forEach(group => {
                group.classList.add('hidden');
            });

            // Mostrar únicamente el contenedor correspondiente al área seleccionada
            const target = document.getElementById(`${sectionId}_${areaId}`);
            if (target) {
                target.classList.remove('hidden');
            }

            // Resaltar el botón activo: quitar el estilo activo a todos y agregarlo al botón clickeado
            document.querySelectorAll('.bloque').forEach(tab => {
                tab.classList.remove('bg-blue-600', 'text-white');
            });
            if (btn) {
                btn.classList.add('bg-blue-600', 'text-white');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Seleccionar el primer botón y extraer su data-area-id para mostrar la primera sección automáticamente
            const firstTab = document.querySelector('.bloque');
            if (firstTab) {
                const areaId = firstTab.getAttribute('data-area-id');
                showSection('capital_area', firstTab, areaId);
            }
        });
    </script>
@endsection
