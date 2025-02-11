<?php $__env->startSection('contenido'); ?>
<section class="font-sans my-20 mx-0">
  
    <!-- Main Content -->
    <div class="container mx-auto mt-8 py-10">
        <div class="text-center">
            <h2 class="text-blue-800 font-semibold text-5xl mb-1">CAPITAL HUMANO</h2>
            <div class="w-72 h-[1.1px] bg-green-400 mx-auto mt-1"></div>
        </div>
  
        <div class="flex justify-center items-start ">
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
            <section class="w-3/4 pl-8 my-10 mx-4">
                <!-- Investigadores Section -->
                <div id="investigadores" class="dynamic-section">
                    <div class="grid grid-cols-4 gap-8 w-50">
                        <div class="bg-white p-4 shadow rounded text-center w-50">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/team-02.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <h4 class="font-semibold">Juan Pérez</h4>
                            <p>ING. DE SISTEMAS</p>
                            <p>Área de Investigación: Inteligencia Artificial</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-center">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/team-01.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <h4 class="font-semibold">Elena Castro</h4>
                            <p>ING. CIVIL</p>
                            <p>Área de Investigación: Estructuras</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-center">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/team-02.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <h4 class="font-semibold">Mario López</h4>
                            <p>ING. MECATRONICO</p>
                            <p>Área de Investigación: Robótica</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-center">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/test.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <h4 class="font-semibold">Carlos Sánchez</h4>
                            <p>Biologo</p>
                            <p>Área de Investigación: Ecología</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-center">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/test.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <h4 class="font-semibold">Javier Ramírez</h4>
                            <p>Químico</p>
                            <p>Área de Investigación: Química Orgánica</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-center">
                            <img src="/user/template/images/jefe.png" alt="Profile" class="mx-auto mb-4">
                            <h4 class="font-semibold">Nombre:</h4>
                            <p>Carrera:</p>
                            <p>Área de Investigación:</p>
                            <p>Correo:</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-center">
                            <img src="/user/template/images/jefe.png" alt="Profile" class="mx-auto mb-4">
                            <h4 class="font-semibold">Nombre:</h4>
                            <p>Carrera:</p>
                            <p>Área de Investigación:</p>
                            <p>Correo:</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-center">
                            <img src="/user/template/images/jefe.png" alt="Profile" class="mx-auto mb-4">
                            <h4 class="font-semibold">Nombre:</h4>
                            <p>Carrera:</p>
                            <p>Área de Investigación:</p>
                            <p>Correo:</p>
                        </div>
                            <!-- Repite más tarjetas según sea necesario -->
                    </div>
                </div>
    
                <!-- Egresados Section -->
                <div id="egresados" class="dynamic-section hidden">
                    <div class="grid grid-cols-4 gap-8">
                        <div class="bg-white p-4 shadow rounded text-center">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/team-02.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <h4 class="font-semibold">Alejandro Torres</h4>
                            <p>ING. MECATRONICO</p>
                            <p>Área de Investigación: Robótica</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-center">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/team-01.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <h4 class="font-semibold">Beatriz Ruiz</h4>
                            <p>Ing. Electrónica</p>
                            <p>Área de Investigación: Sistemas de Control</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-center">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/team-01.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <h4 class="font-semibold">Carla Mendoza</h4>
                            <p>Ingeniera de Sistemas</p>
                            <p>Área de Investigación: Inteligencia Artificial</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-center">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/team-01.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <h4 class="font-semibold">Diana López</h4>
                            <p>Ingeniera Industrial</p>
                            <p>Área de Investigación: Automatización Industrial</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-center">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/test.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <h4 class="font-semibold">Eduardo Salazar</h4>
                            <p>Ingeniero de Software</p>
                            <p>Área de Investigación: Sistemas Embebidos</p>
                        </div>
                    </div>
                </div>
    
                <!-- Tesistas Section -->
                <div id="tesistas" class="dynamic-section hidden">
                    <!-- Submenú Pregrado/Posgrado -->
                    <div class="flex justify-center mb-2 p-4">
                        <div class="bg-gray-300 rounded-lg shadow w-4/5 flex justify-evenly">
                            <button onclick="showTesistas('pregrado',this)" class="tesistas-tab block px-8 py-2 mx-2 rounded-md bg-gray-300 hover:bg-gray-400 active">PREGRADO</button>
                            <button onclick="showTesistas('posgrado',this)" class="tesistas-tab block px-8 py-2 mx-2 rounded-full bg-gray-300 hover:bg-gray-400">POSGRADO</button>
                        </div>
                    </div>

                    <!-- Contenido de Tesistas -->
                    <div id="pregrado" class="tesistas-content">
                        <div class="grid grid-cols-4 gap-8">
                            <div class="bg-white p-4 shadow rounded text-center">
                                <div class="c rc i z-1 pg ">
                                    <img src="/user/template/images/team-01.png" alt="Profile" class="mx-auto mb-2">
                                    <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                        <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                    </div>
                                </div>
                                <h4 class="font-semibold">Beatriz Ruiz</h4>
                                <p>Ing. Electrónica</p>
                                <p>Área de Investigación: Sistemas de Control</p>
                            </div>
                            <div class="bg-white p-4 shadow rounded text-center">
                                <div class="c rc i z-1 pg ">
                                    <img src="/user/template/images/test.png" alt="Profile" class="mx-auto mb-2">
                                    <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                        <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                    </div>
                                </div>
                                <h4 class="font-semibold">Eduardo Salazar</h4>
                                <p>Ingeniero de Software</p>
                                <p>Área de Investigación: Sistemas Embebidos</p>
                            </div>
                            <div class="bg-white p-4 shadow rounded text-center">
                                <div class="c rc i z-1 pg ">
                                    <img src="/user/template/images/team-01.png" alt="Profile" class="mx-auto mb-2">
                                    <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                        <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                    </div>
                                </div>
                                <h4 class="font-semibold">Beatriz Ruiz</h4>
                                <p>Ing. Electrónica</p>
                                <p>Área de Investigación: Sistemas de Control</p>
                            </div>
                            <!-- Más tarjetas de Pregrado -->
                        </div>
                    </div>

                    <div id="posgrado" class="tesistas-content hidden">
                        <div class="grid grid-cols-4 gap-8">
                            <div class="bg-white p-4 shadow rounded text-center">
                                <div class="c rc i z-1 pg ">
                                    <img src="/user/template/images/test.png" alt="Profile" class="mx-auto mb-2">
                                    <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                        <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                    </div>
                                </div>
                                <h4 class="font-semibold">Eduardo Salazar</h4>
                                <p>Ingeniero de Software</p>
                                <p>Área de Investigación: Sistemas Embebidos</p>
                            </div>
                            <div class="bg-white p-4 shadow rounded text-center">
                                <div class="c rc i z-1 pg ">
                                    <img src="/user/template/images/team-01.png" alt="Profile" class="mx-auto mb-2">
                                    <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                        <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                    </div>
                                </div>
                                <h4 class="font-semibold">Beatriz Ruiz</h4>
                                <p>Ing. Electrónica</p>
                                <p>Área de Investigación: Sistemas de Control</p>
                            </div>
                            <div class="bg-white p-4 shadow rounded text-center">
                                <div class="c rc i z-1 pg ">
                                    <img src="/user/template/images/team-01.png" alt="Profile" class="mx-auto mb-2">
                                    <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                        <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                    </div>
                                </div>
                                <h4 class="font-semibold">Beatriz Ruiz</h4>
                                <p>Ing. Electrónica</p>
                                <p>Área de Investigación: Sistemas de Control</p>
                            </div>
                            <div class="bg-white p-4 shadow rounded text-center">
                                <div class="c rc i z-1 pg ">
                                    <img src="/user/template/images/test.png" alt="Profile" class="mx-auto mb-2">
                                    <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                        <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                    </div>
                                </div>
                                <h4 class="font-semibold">Eduardo Salazar</h4>
                                <p>Ingeniero de Software</p>
                                <p>Área de Investigación: Sistemas Embebidos</p>
                            </div>
                            <!-- Más tarjetas de Posgrado -->
                        </div>
                    </div>
                </div>

    
                <!-- Pasantes Section -->
                <div id="pasantes" class="dynamic-section hidden">
                    <div class="grid grid-cols-4 gap-8">
                        <div class="bg-white p-4 shadow rounded text-center">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/test.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <h4 class="font-semibold">Eduardo Salazar</h4>
                            <p>Ingeniero de Software</p>
                            <p>Área de Investigación: Sistemas Embebidos</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-center">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/test.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <h4 class="font-semibold">Eduardo Salazar</h4>
                            <p>Ingeniero de Software</p>
                            <p>Área de Investigación: Sistemas Embebidos</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-center">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/test.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <h4 class="font-semibold">Eduardo Salazar</h4>
                            <p>Ingeniero de Software</p>
                            <p>Área de Investigación: Sistemas Embebidos</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-center">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/test.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <h4 class="font-semibold">Eduardo Salazar</h4>
                            <p>Ingeniero de Software</p>
                            <p>Área de Investigación: Sistemas Embebidos</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-center">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/test.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <h4 class="font-semibold">Eduardo Salazar</h4>
                            <p>Ingeniero de Software</p>
                            <p>Área de Investigación: Sistemas Embebidos</p>
                        </div>
                    </div>
                </div>
    
                <!-- Aliados Section -->
                <div id="aliados" class="dynamic-section hidden">
                    <div class=" grid grid-cols-4 gap-8">
                        <div class="bg-white p-4 shadow rounded text-center">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/about-01.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <h4 class="font-semibold">Ecolnnovate</h4>
                            <p>Direcctor: Laura Martínez</p>
                            <p>Área de Investigación: Medio Ambiente</p>
                            <p>Descripción: Ecolnnovate se dedica a desarrollar soluciones sostenibles para la industria. Su misión es promover la innoación ecológica y la reducción de la huella de carbono</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-center">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/about-01.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <h4 class="font-semibold">Tech4All</h4>
                            <p>Direcctor: Javir López</p>
                            <p>Área de Investigación: Tecnología</p>
                            <p>Descripción: Tech4All busca cerrar la brecha digital proporcionando accceso a tecnología y educación digital en áreas desfavorecidas.</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-center">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/about-01.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <h4 class="font-semibold">Innovación Digital</h4>
                            <p>Direcctor: Andrés Torres</p>
                            <p>Área de Investigación: Desarrollo de Software</p>
                            <p>Descripción: Innovación Digital se enfoca en el desarrollo de software y soluciones tecnológicas para pequeñas y medianas empresas, ayudandolas a digitalizar sus operaciones.</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-center">
                            <div class="c rc i z-1 pg ">
                                <img src="/user/template/images/about-01.png" alt="Profile" class="mx-auto mb-2">
                                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                    <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Ver CV</a>
                                </div>
                            </div>
                            <h4 class="font-semibold">Ciberseguridad para Todos</h4>
                            <p>Direcctor: Laura Martínez</p>
                            <p>Área de Investigación: Ciberseguridad</p>
                            <p>Descripción: Ciberseguridad para Todos trabajad para concienciar sobre la seguridad en línea y ofrece talleres gratuitos sobre protección de datos y ciberseguridad.</p>
                        </div>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('usuario.layout.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CURSOS EXTRAS\PAGINA LABCAM\PROYECTO COMPARTIDO\Labcam-Website\resources\views/usuario/Organizacion/CapitalHumano.blade.php ENDPATH**/ ?>