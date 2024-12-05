@extends('usuario.layout.plantilla')

@section('contenido')
<section class="my-20 mx-0">
    <div>
        <!-- Encabezado -->
        <section class="py-10">
            <div class="text-center">
                <h2 class="text-blue-800 font-semibold text-5xl mb-1">DIRECCIÓN</h2>
                <div class="w-72 h-[1.1px] bg-green-400 mx-auto mt-1"></div>
            </div>
        </section>
        
        <!-- Contenido principal -->
        <section class="flex justify-center items-center">
            <!-- Columna izquierda (Menú) -->
            <div class="bg-gray-200 p-6 w-60 m-20 shadow-md rounded-lg">
                <button 
                    class="text-center text-lg font-bold mb-6 w-full py-2 hover:bg-gray-300 focus:outline-none" 
                    onclick="mostrarContenido('jefe')">JEFE</button>
                <button 
                    class="text-center text-lg font-bold mb-6 w-full py-2 hover:bg-gray-300 focus:outline-none" 
                    onclick="mostrarContenido('tecnico')">TÉCNICO</button>
                <button 
                    class="text-center text-lg font-bold w-full py-2 hover:bg-gray-300 focus:outline-none" 
                    onclick="mostrarContenido('investigador')">INVESTIGADOR PRINCIPAL</button>
            </div>
            
            <!-- Columna derecha (Contenido dinámico) -->
            <div id="contenido-dinamico" class="flex-1 p-10">
                <div class="flex flex-col items-center space-y-6">
                    <!-- Jefe -->
                    <div class="text-center">
                        <img class="w-40 h-40 mx-auto mb-2" src="/user/template/images/jefe.png" alt="Jefe">
                        <h3 class="text-black font-semibold text-2xl">JEFE</h3>
                    </div>
    
                    <!-- Técnico e Investigador Principal -->
                    <div class="flex space-x-40">
                        <!-- Técnico -->
                        <div class="text-center mx-6">
                            <img class="w-40 h-40 mx-auto mb-2" src="/user/template/images/jefe.png" alt="Técnico">
                            <h3 class="text-black font-semibold text-2xl">TÉCNICO</h3>
                        </div>
                        <!-- Investigador Principal -->
                        <div class="text-center mx-6">
                            <img class="w-40 h-40 mx-auto mb-2" src="/user/template/images/jefe.png" alt="Investigador Principal">
                            <h3 class="text-black font-semibold text-2xl">INVESTIGADOR <br> PRINCIPAL</h3>
                        </div>
                    </div>
                </div>
                <!-- Contenido por defecto -->
                <div id="jefe" class="hidden">
                    <div class="text-center">
                        <img class="w-40 h-40 mx-auto mb-4" src="/user/template/images/jefe.png" alt="Jefe">
                        <h3 class="text-black font-semibold text-2xl mb-2">JEFE</h3>
                        <p class="text-gray-700">Descripción del jefe. Este es el líder del equipo. <br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae sapiente ipsum repellat! Recusandae ea earum iusto reiciendis accusamus magni illo error possimus voluptas ipsam, nam eaque iste maiores totam id.
                        </p>
                    </div>
                </div>

                <div id="tecnico" class="hidden">
                    <div class="text-center">
                        <img class="w-40 h-40 mx-auto mb-4" src="/user/template/images/jefe.png" alt="Técnico">
                        <h3 class="text-black font-semibold text-2xl mb-2">TÉCNICO</h3>
                        <p class="text-gray-700">Nombre:  <br>
                            Carrera:  <br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, nemo pariatur itaque rem qui aspernatur impedit illum repellendus omnis! Sunt nemo debitis nihil perferendis temporibus, repellendus libero similique ratione commodi.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia aut eveniet unde illum dolore voluptatibus molestias deleniti nesciunt quaerat omnis sequi, aspernatur magnam harum asperiores, explicabo incidunt? Esse, corrupti optio.
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam dolorem optio modi sunt unde incidunt ducimus, eius vel est enim sed cumque aut dolorum repellat molestias reprehenderit! Error, aliquid. Quia!
                        </p>
                    </div>
                </div>

                <div id="investigador" class="hidden">
                    <div class="text-center">
                        <img class="w-40 h-40 mx-auto mb-4" src="/user/template/images/jefe.png" alt="Investigador Principal">
                        <h3 class="text-black font-semibold text-2xl mb-2">INVESTIGADOR PRINCIPAL</h3>
                        <p class="text-gray-700">Descripción del investigador principal. Lidera los proyectos de investigación. <br>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat nostrum reiciendis a unde vitae! Provident id facere molestiae eum tempora, eius eaque fugiat eligendi. Rem commodi nam exercitationem quibusdam dolore.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>

<script>
    function mostrarContenido(seccionId) {
        // Oculta todas las secciones
        const secciones = document.querySelectorAll('#contenido-dinamico > div');
        secciones.forEach(seccion => seccion.classList.add('hidden'));

        // Muestra solo la sección seleccionada
        const seccionActiva = document.getElementById(seccionId);
        seccionActiva.classList.remove('hidden');
    }
</script>
@endsection