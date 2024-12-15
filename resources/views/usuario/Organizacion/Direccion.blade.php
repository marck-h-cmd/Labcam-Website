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
        <section class="flex justify-center items-start">
            <!-- Columna izquierda (Menú) -->
            <div class="bg-gray-200 p-6 w-60 m-20 shadow-md rounded-lg">
                <button 
                    class="bloque-d text-center text-lg font-bold mb-6 w-full rounded-md py-2 hover:bg-gray-300 focus:outline-none" 
                    onclick="mostrarContenido('jefe',this)">JEFE</button>
                <button 
                    class="bloque-d text-center text-lg font-bold mb-6 w-full rounded-md py-2 hover:bg-gray-300 focus:outline-none" 
                    onclick="mostrarContenido('tecnico',this)">TÉCNICO</button>
                <button 
                    class="bloque-d text-center text-lg font-bold w-full rounded-lg py-2 hover:bg-gray-300 focus:outline-none" 
                    onclick="mostrarContenido('investigador',this)">INVESTIGADOR PRINCIPAL</button>
            </div>
            
            <!-- Columna derecha (Contenido dinámico) -->
            <div id="contenido-dinamico" class="flex-1 p-4">
                <div class="flex flex-col items-center space-y-6">
                    <!-- Jefe -->
                    <div class="text-center">
                        <img class="w-40 h-40 mx-auto mb-2" src="/user/template/images/team-02.png" alt="Jefe">
                        <h3 class="text-black font-semibold text-lg">JEFE</h3>
                    </div>
    
                    <!-- Técnico e Investigador Principal -->
                    <div class="flex space-x-40">
                        <!-- Técnico -->
                        <div class="text-center mx-6">
                            <img class="w-40 h-40 mx-auto mb-2" src="/user/template/images/team-01.png" alt="Técnico">
                            <h3 class="text-black font-semibold text-md">TÉCNICO</h3>
                        </div>
                        <!-- Investigador Principal -->
                        <div class="text-center mx-6">
                            <img class="w-40 h-40 mx-auto mb-2" src="/user/template/images/test.png" alt="Investigador Principal">
                            <h3 class="text-black font-semibold text-lg">INVESTIGADOR PRINCIPAL</h3>
                        </div>
                    </div>
                </div>
                <!-- Contenido por defecto -->
                <div id="jefe" class="hidden">
                    <div class="text-center">
                        <div class="c rc i z-1 pg ">
                            <img src="/user/template/images/team-02.png" alt="Profile" class="mx-auto mb-2 w-60">
                            <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                            </div>
                        </div>
                        <h3 class="text-black font-semibold text-2xl mb-2">Jose Alberto Gómez</h3>
                        <p class="text-gray-700">Ingeniero Mecatronico <br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae sapiente ipsum repellat! Recusandae ea earum iusto reiciendis accusamus magni illo error possimus voluptas ipsam, nam eaque iste maiores totam id.
                        </p>
                    </div>
                </div>

                <div id="tecnico" class="hidden">
                    <div class="text-center">
                        <div class="c rc i z-1 pg ">
                            <img src="/user/template/images/team-01.png" alt="Profile" class="mx-auto mb-2 w-60">
                            <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                            </div>
                        </div>
                        <h3 class="text-black font-semibold text-2xl mb-2">Patricia Barreto </h3>
                        <p class="text-gray-700">Ingeniera Agroindustrial<br>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, nemo pariatur itaque rem qui aspernatur impedit illum repellendus omnis! Sunt nemo debitis nihil perferendis temporibus, repellendus libero similique ratione commodi.
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam dolorem optio modi sunt unde incidunt ducimus, eius vel est enim sed cumque aut dolorum repellat molestias reprehenderit! Error, aliquid. Quia!
                        </p>
                    </div>
                </div>

                <div id="investigador" class="hidden">
                    <div class="text-center">
                        <div class="c rc i z-1 pg ">
                            <img src="/user/template/images/team-02.png" alt="Investigador Principal" class="mx-auto mb-2 w-60">
                            <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                            </div>
                        </div>
                        <h3 class="text-black font-semibold text-2xl mb-2">Sergio Fernandez</h3>
                        <p class="text-gray-700">Biólogo<br>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat nostrum reiciendis a unde vitae! Provident id facere molestiae eum tempora, eius eaque fugiat eligendi. Rem commodi nam exercitationem quibusdam dolore.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>

<script>
    function mostrarContenido(seccionId,button) {
        // Oculta todas las secciones
        document.querySelectorAll('#contenido-dinamico > div').forEach(section=>{
            section.classList.add('hidden');
        });

        // Muestra solo la sección seleccionada
        document.getElementById(seccionId).classList.remove('hidden');
        //Resaltaa pestaña activa
        document.querySelectorAll('.bloque-d').forEach(tab => {
            tab.classList.remove('bg-blue-600', 'text-white', 'active');
            tab.classList.add('bg-gray-200', 'hover:bg-gray-400');
        });
        //Resaltar botón seleccionado
        button.classList.add('bg-blue-600', 'text-white', 'active');
    }
</script>
@endsection