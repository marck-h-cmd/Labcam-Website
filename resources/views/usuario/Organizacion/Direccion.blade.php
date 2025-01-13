@extends('usuario.layout.plantilla')

@section('contenido')
    <section class="px-16 mt-28 mb-16">
        <div>
            <!-- Encabezado -->
            <section class="py-10">
                <div class="main-title flex flex-col items-center gap-3 mb-4">
                    <h2 class="text-blue-800 font-semibold text-4xl mb-1">DIRECCIÓN</h2>
                    <div class="blue-line w-1/5 h-0.5 bg-[#64d423]"></div>
                </div>
            </section>

            <!-- Contenido principal -->
            <section class="flex flex-wrap justify-center items-center gap-12 h-full">
                <!-- Columna izquierda (Menú) -->
                <div class="bg-gray-200 px-4 py-8 w-max md:w-56 shadow-md rounded-lg flex md:flex-col h-auto">
                    <div class="flex flex-col gap-4 w-full">
                        <button
                            class="bloque-d text-center text-base font-semibold w-full rounded-md py-2 hover:bg-blue-600 hover:text-white focus:outline-none"
                            onclick="mostrarContenido('general',this)">ORGANIGRAMA GENERAL</button>
                        <button
                            class="bloque-d text-center text-base font-semibold w-full rounded-md py-2 hover:bg-blue-600 hover:text-white focus:outline-none"
                            onclick="mostrarContenido('jefe',this)">JEFE</button>
                        <button
                            class="bloque-d text-center text-base font-semibold w-full rounded-md py-2 hover:bg-blue-600 hover:text-white focus:outline-none"
                            onclick="mostrarContenido('tecnico',this)">TÉCNICO</button>
                        <button
                            class="bloque-d text-center text-base font-semibold w-full rounded-lg py-2 hover:bg-blue-600 hover:text-white focus:outline-none"
                            onclick="mostrarContenido('investigador',this)">INVESTIGADOR PRINCIPAL</button>
                    </div>
                </div>

                <!-- Columna derecha (Contenido dinámico) -->
                <div id="contenido-dinamico" class="flex-1 p-4 w-full">
                    <!-- General -->
                    <div id="general" class="flex flex-col items-center gap-10">
                        <!-- Jefe -->
                        <div
                            class="text-center bg-white shadow-xl rounded-lg p-4 w-full max-w-[17rem] aspect-square flex flex-col justify-center items-center">
                            <img class="w-32 h-32 md:w-40 md:h-40 object-cover rounded-full border-2 border-gray-300"
                                src="/user/template/images/team-02.png" alt="Jefe">
                            <h3 class="text-black font-semibold text-base mt-3">JEFE</h3>
                        </div>

                        <!-- Técnico e Investigador Principal -->
                        <div class="flex flex-wrap justify-center gap-16 w-full">
                            <!-- Técnico -->
                            <div
                                class="text-center bg-white shadow-xl rounded-lg p-4 w-full max-w-[17rem] aspect-square flex flex-col justify-center items-center">
                                <img class="w-32 h-32 md:w-40 md:h-40 object-cover rounded-full border-2 border-gray-300"
                                    src="/user/template/images/team-01.png" alt="Técnico">
                                <h3 class="text-black font-semibold text-sm mt-3">TÉCNICO</h3>
                            </div>
                            <!-- Investigador Principal -->
                            <div
                                class="text-center bg-white shadow-xl rounded-lg p-4 w-full max-w-[17rem] aspect-square flex flex-col justify-center items-center">
                                <img class="w-32 h-32 md:w-40 md:h-40 object-cover rounded-full border-2 border-gray-300"
                                    src="/user/template/images/test.png" alt="Investigador Principal">
                                <h3 class="text-black font-semibold text-base mt-3">INVESTIGADOR PRINCIPAL</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Jefe -->
                    <div id="jefe" class="hidden">
                        <div class="text-center">
                            <img src="/user/template/images/team-02.png" alt="Profile"
                                class="mx-auto mb-4 w-40 h-40 md:w-48 md:h-48 object-cover rounded-full border-2 border-gray-300">
                            <h3 class="text-black font-semibold text-xl mb-2">Jose Alberto Gómez</h3>
                            <p class="text-gray-700 text-sm md:text-base">
                                Ingeniero Mecatrónico<br>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae sapiente ipsum repellat!
                                Recusandae ea earum iusto reiciendis accusamus magni illo error possimus voluptas ipsam, nam
                                eaque iste maiores totam id.
                            </p>
                        </div>
                    </div>

                    <!-- Técnico -->
                    <div id="tecnico" class="hidden">
                        <div class="text-center">
                            <img src="/user/template/images/team-01.png" alt="Profile"
                                class="mx-auto mb-4 w-40 h-40 md:w-48 md:h-48 object-cover rounded-full border-2 border-gray-300">
                            <h3 class="text-black font-semibold text-xl mb-2">Patricia Barreto</h3>
                            <p class="text-gray-700 text-sm md:text-base">
                                Ingeniera Agroindustrial<br>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, nemo pariatur
                                itaque rem qui aspernatur impedit illum repellendus omnis! Sunt nemo debitis nihil
                                perferendis temporibus, repellendus libero similique ratione commodi.
                            </p>
                        </div>
                    </div>

                    <!-- Investigador Principal -->
                    <div id="investigador" class="hidden">
                        <div class="text-center">
                            <img src="/user/template/images/team-02.png" alt="Investigador Principal"
                                class="mx-auto mb-4 w-40 h-40 md:w-48 md:h-48 object-cover rounded-full border-2 border-gray-300">
                            <h3 class="text-black font-semibold text-xl mb-2">Sergio Fernandez</h3>
                            <p class="text-gray-700 text-sm md:text-base">
                                Biólogo<br>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat nostrum reiciendis a unde
                                vitae! Provident id facere molestiae eum tempora, eius eaque fugiat eligendi. Rem commodi
                                nam exercitationem quibusdam dolore.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
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
