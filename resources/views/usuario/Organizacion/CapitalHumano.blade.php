@extends('usuario.layout.plantilla')
@section('contenido')
<section class="font-sans my-20 mx-0">
  
    <!-- Main Content -->
    <div class="container mx-auto mt-8 py-10">
        <div class="text-center">
            <h2 class="text-blue-800 font-semibold text-5xl mb-1">CAPITAL HUMANO</h2>
            <div class="w-72 h-[1.1px] bg-green-400 mx-auto mt-1"></div>
        </div>
  
        <div class="flex justify-center items-start ">
            <!-- Sidebar -->
            <div class="w-1/4 bg-gray-200 p-6 w-60 m-10 shadow-md rounded">
                <ul class="space-y-2">
                    <li>
                        <button onclick="showSection('investigadores')" class="block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Investigadores</button>
                    </li>
                    <li>
                        <button onclick="showSection('egresados')" class="block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Egresados</button>
                    </li>
                    <li>
                         <button onclick="showSection('tesistas')" class="block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Tesistas</button>
                    </li>
                    <li>
                        <button onclick="showSection('pasantes')" class="block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Pasantes</button>
                    </li>
                    <li>
                        <button onclick="showSection('aliados')" class="block w-full text-left px-4 py-2 hover:bg-gray-300 rounded">Aliados</button>
                    </li>
                </ul>
            </div>
  
            <!-- Profiles -->
            <section class="w-3/4 pl-8 my-10 mx-4">
                <!-- Investigadores Section -->
                <div id="investigadores" class="dynamic-section">
                    <div class="grid grid-cols-4 gap-8 w-50">
                        <div class="bg-white p-4 shadow rounded text-normal w-50">
                            <img src="/user/template/images/jefe.png" alt="Profile" class="mx-auto mb-2">
                            <h4 class="font-semibold">Nombre:</h4>
                            <p>Carrera:</p>
                            <p>Área de Investigación:</p>
                            <p>Correo:</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-normal">
                            <img src="/user/template/images/jefe.png" alt="Profile" class="mx-auto mb-2">
                            <h4 class="font-semibold">Nombre:</h4>
                            <p>Carrera:</p>
                            <p>Área de Investigación:</p>
                            <p>Correo:</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-normal">
                            <img src="/user/template/images/jefe.png" alt="Profile" class="mx-auto mb-2">
                            <h4 class="font-semibold">Nombre:</h4>
                            <p>Carrera:</p>
                            <p>Área de Investigación:</p>
                            <p>Correo:</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-normal">
                            <img src="/user/template/images/jefe.png" alt="Profile" class="mx-auto mb-4">
                            <h4 class="font-semibold">Nombre:</h4>
                            <p>Carrera:</p>
                            <p>Área de Investigación:</p>
                            <p>Correo:</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-normal">
                            <img src="/user/template/images/jefe.png" alt="Profile" class="mx-auto mb-4">
                            <h4 class="font-semibold">Nombre:</h4>
                            <p>Carrera:</p>
                            <p>Área de Investigación:</p>
                            <p>Correo:</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-normal">
                            <img src="/user/template/images/jefe.png" alt="Profile" class="mx-auto mb-4">
                            <h4 class="font-semibold">Nombre:</h4>
                            <p>Carrera:</p>
                            <p>Área de Investigación:</p>
                            <p>Correo:</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-normal">
                            <img src="/user/template/images/jefe.png" alt="Profile" class="mx-auto mb-4">
                            <h4 class="font-semibold">Nombre:</h4>
                            <p>Carrera:</p>
                            <p>Área de Investigación:</p>
                            <p>Correo:</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-normal">
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
                        <div class="bg-white p-4 shadow rounded text-normal">
                            <img src="/user/template/images/jefe.png" alt="Profile" class="mx-auto mb-4">
                            <h4 class="font-semibold">Nombre:</h4>
                            <p>Carrera:</p>
                            <p>Área de Investigación:</p>
                            <p>Correo:</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-normal">
                            <img src="/user/template/images/jefe.png" alt="Profile" class="mx-auto mb-4">
                            <h4 class="font-semibold">Nombre:</h4>
                            <p>Carrera:</p>
                            <p>Área de Investigación:</p>
                            <p>Correo:</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-normal">
                            <img src="/user/template/images/jefe.png" alt="Profile" class="mx-auto mb-4">
                            <h4 class="font-semibold">Nombre:</h4>
                            <p>Carrera:</p>
                            <p>Área de Investigación:</p>
                            <p>Correo:</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-normal">
                            <img src="/user/template/images/jefe.png" alt="Profile" class="mx-auto mb-4">
                            <h4 class="font-semibold">Nombre:</h4>
                            <p>Carrera:</p>
                            <p>Área de Investigación:</p>
                            <p>Correo:</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded text-normal">
                            <img src="/user/template/images/jefe.png" alt="Profile" class="mx-auto mb-4">
                            <h4 class="font-semibold">Nombre:</h4>
                            <p>Carrera:</p>
                            <p>Área de Investigación:</p>
                            <p>Correo:</p>
                        </div>
                    </div>
                </div>
    
                <!-- Tesistas Section -->
                <div id="tesistas" class="dynamic-section hidden">
                    <!-- Submenú Pregrado/Posgrado -->
                    <div class="flex justify-center mb-6 p-6 w-100">
                        <div class="inline-flex bg-gray-300 rounded-md shadow">
                            <button onclick="showTesistas('pregrado')" class="tesistas-tab block px-4 py-2 mx-2 bg-gray-300 rounded hover:bg-gray-400 active">PREGRADO</button>
                            <button onclick="showTesistas('posgrado')" class="tesistas-tab block px-4 py-2 mx-2 bg-gray-300 rounded hover:bg-gray-400">POSGRADO</button>
                        </div>
                    </div>

                    <!-- Contenido de Tesistas -->
                    <div id="pregrado" class="tesistas-content">
                        <div class="grid grid-cols-4 gap-8">
                            <div class="bg-white p-4 shadow rounded text-normal">
                                <img src="/user/template/images/jefe.png" alt="Profile" class="mx-auto mb-4">
                                <h4 class="font-semibold">Nombre:</h4>
                                <p>Carrera:</p>
                                <p>Área de Investigación:</p>
                                <p>Correo:</p>
                            </div>
                            <!-- Más tarjetas de Pregrado -->
                        </div>
                    </div>

                    <div id="posgrado" class="tesistas-content hidden">
                        <div class="grid grid-cols-4 gap-8">
                            <div class="bg-white p-4 shadow rounded text-normal">
                                <img src="/user/template/images/jefe.png" alt="Profile" class="mx-auto mb-4">
                                <h4 class="font-semibold">Nombre:</h4>
                                <p>Carrera:</p>
                                <p>Área de Investigación:</p>
                                <p>Correo:</p>
                            </div>
                            <div class="bg-white p-4 shadow rounded text-normal">
                                <img src="/user/template/images/jefe.png" alt="Profile" class="mx-auto mb-4">
                                <h4 class="font-semibold">Nombre:</h4>
                                <p>Carrera:</p>
                                <p>Área de Investigación:</p>
                                <p>Correo:</p>
                            </div>
                            <div class="bg-white p-4 shadow rounded text-normal">
                                <img src="/user/template/images/jefe.png" alt="Profile" class="mx-auto mb-4">
                                <h4 class="font-semibold">Nombre:</h4>
                                <p>Carrera:</p>
                                <p>Área de Investigación:</p>
                                <p>Correo:</p>
                            </div>
                            <!-- Más tarjetas de Posgrado -->
                        </div>
                    </div>
                </div>

    
                <!-- Pasantes Section -->
                <div id="pasantes" class="dynamic-section hidden">
                    <h3 class="text-xl font-bold mb-4">Pasantes</h3>
                    <p>Contenido relacionado con los pasantes.</p>
                </div>
    
                <!-- Aliados Section -->
                <div id="aliados" class="dynamic-section hidden">
                    <h3 class="text-xl font-bold mb-4">Aliados</h3>
                    <p>Contenido relacionado con los aliados.</p>
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
    </script>
@endsection