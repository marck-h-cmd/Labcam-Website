@extends('administrador.dashboard.plantilla')

@section('contenido')
    <div class="main-title flex flex-col items-center gap-3 mb-8">
        <div class="title text-2xl font-semibold text-[#2e5382]">Capital Humano</div>
        <div class="blue-line w-1/5 h-0.5 bg-[#64d423]"></div>
    </div>
    <!-- Menú -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 bg-gray-200 mx-4 sm:mx-6 md:mx-8 lg:mx-14 mb-6 gap-4">
        <div id="menu-investigadores" class="cursor-pointer">
            <a onclick="filterByRole('Investigadores', this)" 
               class="flex justify-center py-4 px-4 w-full h-full text-gray-700 font-medium hover:bg-blue-600 hover:text-white rounded-md">
                <span class="text-sm">Investigadores</span>
            </a>
        </div>
        <div id="menu-egresados" class="cursor-pointer">
            <a onclick="filterByRole('Egresados', this)" 
               class="flex justify-center py-4 px-4 w-full h-full text-gray-700 font-medium hover:bg-blue-600 hover:text-white rounded-md">
                <span class="text-sm">Egresados</span>
            </a>
        </div>
        <div id="menu-tesistas" class="cursor-pointer">
            <a onclick="filterByRole('Tesistas', this)" 
               class="flex justify-center py-4 px-4 w-full h-full text-gray-700 font-medium hover:bg-blue-600 hover:text-white rounded-md">
                <span class="text-sm">Tesistas</span>
            </a>
        </div>
        <div id="menu-pasantes" class="cursor-pointer">
            <a onclick="filterByRole('Pasantes', this)" 
               class="flex justify-center py-4 px-4 w-full h-full text-gray-700 font-medium hover:bg-blue-600 hover:text-white rounded-md">
                <span class="text-sm">Pasantes</span>
            </a>
        </div>
        <div id="menu-aliados" class="cursor-pointer">
            <a onclick="filterByRole('Aliados', this)" 
               class="flex justify-center py-4 px-4 w-full h-full text-gray-700 font-medium hover:bg-blue-600 hover:text-white rounded-md">
                <span class="text-sm">Aliados</span>
            </a>
        </div>
    </div>
    
    
     {{-- -----------CAMBIOS------- --}}
    <div class="p-2">
        <div class="max-w-[1200px] mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <form class="sm:flex sm:items-center sm:justify-between flex-col sm:flex-row gap-4" action="{{ route('capitales.store') }}" method="POST" id="form">
                        @csrf
                        <div class="sm:flex-none flex justify-center sm:justify-start">
                            <button type="button" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-700 w-full sm:w-auto" onclick="openCreateModal()">
                                + Nuevo
                            </button>
                        </div>
                        <div class="sm:flex-auto max-w-[500px] w-full">
                            <label for="buscarpor" class="block mb-2 text-sm font-medium text-gray-900">
                                Buscar
                            </label>
                            <input type="search" name="buscarpor" id="buscarpor" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  placeholder="Nombre de ..." required/>
                        </div>
                    </form>
            
                    <div class="flow-root">
                        <div class="mt-10 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="w-full divide-y divide-gray-300">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Nombre
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Carrera
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Área de Investigación
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Correo
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                CV
                                            </th>
                                
                                            <th scope="col"
                                                class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Opciones
                                            </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="table-body" class="divide-y divide-gray-200 bg-white">
                                        @foreach ($capitales as $capital)
                                            <tr data-role="{{ $capital->rol }}" class="even:bg-gray-50">
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $capital->nombre}}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $capital->carrera }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $capital->areaInvestigacion->nombre ?? 'N/A' }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $capital->correo }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $capital->cv }}
                                                </td>
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                    <form action="{{ route('capitales.destroy', $capital->id) }}" method="POST">
                                                        <a href="{{ route('capitales.edit', $capital->id) }}" class="text-indigo-600 font-bold hover:text-indigo-900  mr-2">
                                                            Editar
                                                        </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('capitales.destroy', $capital->id) }}"
                                                            class="text-red-600 font-bold hover:text-red-900"
                                                            onclick="event.preventDefault(); 
                                                                     Swal.fire({
                                                                         title: '¿Estás seguro?',
                                                                         text: 'No será posible revertir los cambios!',
                                                                         icon: 'warning',
                                                                         showCancelButton: true,
                                                                         confirmButtonColor: '#3085d6',
                                                                         cancelButtonColor: '#d33',
                                                                         confirmButtonText: 'Sí, eliminar'
                                                                     }).then((result) => {
                                                                         if (result.isConfirmed) {
                                                                             this.closest('form').submit();
                                                                         }
                                                                     });">
                                                             Eliminar
                                                         </a>  
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>  
                                </table>

                                <div class="mt-4 px-4">
                                    {!! $capitales->withQueryString()->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     {{-- ------------------modal de Nuevo--------------- --}}
    <div id="createModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 w-full h-full">
        <div class="flex items-center justify-center w-full h-full">
            <div class="bg-slate-200 p-7 rounded shadow-lg max-w-4xl w-full relative">
                <!-- Título centrado en todo el modal -->
                <div class="main-title flex flex-col items-center gap-3 mb-8">
                    <div class="title text-2xl font-semibold text-[#2e5382]">Nuevo Registro</div>
                    <div class="blue-line w-2/5 h-0.5 bg-[#64d423]"></div>
                </div>
    
                <!-- Contenido del modal -->
                <div class="flex justify-center items-center">
                    <!-- Sección para la imagen -->
                    <div class="relative w-1/3 flex justify-center items-center">
                        <div class="relative">
                            <img id="previewImage" src="/ruta/a/imagen_por_defecto.jpg" alt="Vista previa" class="w-full h-auto rounded shadow">
                            <!-- Botón de edición -->
                            <button type="button" class="absolute top-2 right-2 bg-white p-2 rounded-full shadow hover:bg-gray-100" onclick="document.getElementById('imagen').click()">
                                🖉
                            </button>
                            <!-- Campo de archivo oculto -->
                            <input type="file" id="imagen" name="imagen" class="hidden" accept="image/*" onchange="mostrarVistaPrevia(event)">
                        </div>
                    </div>
                    <!-- Sección del formulario -->
                    <div class="w-2/3 pl-6">
                        <form action="{{ route('capitales.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="nombres" class="block">Nombres</label>
                                <input type="text" id="nombres" name="nombres" class="w-full px-4 py-2 border rounded" required>
                            </div>
                            <div class="mb-4">
                                <label for="carrera" class="block">Carrera</label>
                                <input type="text" id="carrera" name="carrera" class="w-full px-4 py-2 border rounded" required>
                            </div>
                            <div class="mb-4">
                                <label for="area_investigacion" class="block">Área de Investigación</label>
                                <select id="area_investigacion" name="Area_de_Investigacion" class="w-full px-4 py-2 border rounded" required>
                                    <option value="">Seleccione un área</option>
                                    @foreach($capitales as $capital)
                                        <option value="">{{ $capital->areaInvestigacion->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="correo" class="block">Correo</label>
                                <input type="email" id="correo" name="correo" class="w-full px-4 py-2 border rounded" required>
                            </div>
                            <div class="mb-4">
                                <label for="cv" class="block">CV</label>
                                <input type="file" id="cv" name="cv" class="w-full px-4 py-2 border rounded" required>
                            </div>
                            <div class="mb-4">
                                <label for="rol" class="block">Rol</label>
                                <input type="text" id="rol" name="rol" class="w-full px-4 py-2 border rounded" required>
                            </div>
                            <div class="flex justify-center mt-6">
                                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-700">
                                    Guardar
                                </button>
                                <button type="button" onclick="closeCreateModal()" class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-700 ml-4">
                                    Cancelar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- --------------------------modal de editar-------------------------------- --}}
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 w-full h-full">
        <div class="flex items-center justify-center w-full h-full">
            <div class="bg-slate-200 p-7 rounded shadow-lg max-w-4xl w-full relative">
                <div class="main-title flex flex-col items-center gap-3 mb-8">
                    <div class="title text-2xl font-semibold text-[#2e5382]">Editar Registro</div>
                    <div class="blue-line w-2/5 h-0.5 bg-[#64d423]"></div>
                </div>
                <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="edit_nombres" class="block">Nombres</label>
                        <input type="text" id="edit_nombres" name="nombres" class="w-full px-4 py-2 border rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="edit_carrera" class="block">Carrera</label>
                        <input type="text" id="edit_carrera" name="carrera" class="w-full px-4 py-2 border rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="edit_area_investigacion" class="block">Área de Investigación</label>
                        <select id="edit_area_investigacion" name="Area_de_Investigacion" class="w-full px-4 py-2 border rounded" required>
                            @foreach($capitales as $capital)
                                <option value="{{ $capital->areaInvestigacion->id }}">{{ $capital->areaInvestigacion->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="edit_correo" class="block">Correo</label>
                        <input type="email" id="edit_correo" name="correo" class="w-full px-4 py-2 border rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="edit_cv" class="block">CV</label>
                        <input type="file" id="edit_cv" name="cv" class="w-full px-4 py-2 border rounded">
                    </div>
                    <div class="mb-4">
                        <label for="edit_rol" class="block">Rol</label>
                        <input type="text" id="edit_rol" name="rol" class="w-full px-4 py-2 border rounded" required>
                    </div>
                    <div class="flex justify-center mt-6">
                        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-700">
                            Guardar
                        </button>
                        <button type="button" onclick="closeEditModal()" class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-700 ml-4">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
    


    <script>
        function openCreateModal() {
            document.getElementById('createModal').classList.remove('hidden');
        }

        function closeCreateModal() {
            document.getElementById('createModal').classList.add('hidden');
        }

        function mostrarVistaPrevia(event) {
            const input = event.target;
            const previewImage = document.getElementById("previewImage");

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Función para filtrar filas por rol
        function filterByRole(role, element) {
            // Mostrar solo las filas que coincidan con el rol
            const rows = document.querySelectorAll('#table-body tr');
            rows.forEach(row => {
                row.style.display = row.dataset.role === role ? '' : 'none';
            });
            // Cambiar el título dinámicamente
            const title = document.querySelector('.main-title .title');
            title.textContent = `Capital Humano: ${role}`;

            // Quitar la clase activa de todos los botones
            const menuItems = document.querySelectorAll('.grid .cursor-pointer a');
            menuItems.forEach(item => {
                item.classList.remove('bg-blue-600', 'text-white');
                item.classList.add('text-gray-700'); // Restaurar el color original
            });

            // Activar el botón seleccionado
            element.classList.add('bg-blue-600', 'text-white');
            element.classList.remove('text-gray-700');
        }

        // // Mostrar Investigadores por defecto al cargar la página
        // document.addEventListener('DOMContentLoaded', () => {
        //     const defaultButton = document.querySelector('#menu-investigadores a');
        //     filterByRole('Investigadores', defaultButton);
        // });

    </script>
@endsection




