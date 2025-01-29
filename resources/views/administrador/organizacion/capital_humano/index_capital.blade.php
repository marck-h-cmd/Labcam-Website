@extends('administrador.dashboard.plantilla')

@section('contenido')
<div class="main-title flex flex-col items-center gap-3 mb-8">
    <div class="title text-2xl font-semibold text-[#2e5382]">Capital Humano</div>
    <div class="blue-line w-1/5 h-0.5 bg-[#64d423]"></div>
</div>
<!-- Menú -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 bg-gray-200 mx-4 sm:mx-6 md:mx-8 lg:mx-14 mb-6 gap-4">
    <div id="menu-investigadores" class="cursor-pointer">
        <a onclick="filterByRole('Investigadores', this)" class="flex justify-center py-4 px-4 w-full h-full text-gray-700 font-medium hover:bg-blue-600 hover:text-white rounded-md">
            <span class="text-sm">Investigadores</span>
        </a>
    </div>
    <div id="menu-egresados" class="cursor-pointer">
        <a onclick="filterByRole('Egresados', this)" class="flex justify-center py-4 px-4 w-full h-full text-gray-700 font-medium hover:bg-blue-600 hover:text-white rounded-md">
            <span class="text-sm">Egresados</span>
        </a>
    </div>
    <div id="menu-tesistas" class="cursor-pointer">
        <a onclick="filterByRole('Tesistas', this)" class="flex justify-center py-4 px-4 w-full h-full text-gray-700 font-medium hover:bg-blue-600 hover:text-white rounded-md">
            <span class="text-sm">Tesistas</span>
        </a>
    </div>
    <div id="menu-pasantes" class="cursor-pointer">
        <a onclick="filterByRole('Pasantes', this)" class="flex justify-center py-4 px-4 w-full h-full text-gray-700 font-medium hover:bg-blue-600 hover:text-white rounded-md">
            <span class="text-sm">Pasantes</span>
        </a>
    </div>
    <div id="menu-aliados" class="cursor-pointer">
        <a onclick="filterByRole('Aliados', this)" class="flex justify-center py-4 px-4 w-full h-full text-gray-700 font-medium hover:bg-blue-600 hover:text-white rounded-md">
            <span class="text-sm">Aliados</span>
        </a>
    </div>
</div>


{{-- -----------CAMBIOS------- --}}
<div class="p-2">
    <div class="max-w-[1200px] mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="w-full">
                <form class="sm:flex sm:items-center sm:justify-between flex-col sm:flex-row gap-4" action="{{route('capitales.store')}}" method="POST" id="form1">
                    @csrf
                    <div class="sm:flex-none flex justify-center sm:justify-start">
                        <button type="button" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-700 w-full sm:w-auto" onclick="openCreateModal()">
                            + Nuevo
                        </button>
                    </div>
                    <form class="flex items-center max-w-lg mx-auto">   
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-400 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-700 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-500 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-200 dark:border-gray-400 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre..." required />
                            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-300 dark:focus:ring-blue-800">Buscar</button>
                        </div>
                    </form>                    
                </form>

                <div class="flow-root">
                    <div class="mt-10 overflow-x-auto">
                        <div class="inline-block min-w-full py-2 align-middle">
                            <table class="w-full divide-y divide-gray-300">
                                <thead>
                                    <tr>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                            Nombre
                                        </th>
                                        <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                            Grado Academico
                                        </th>
                                        <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                            Área de Investigación
                                        </th>
                                        <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                            Correo
                                        </th>
                                        <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                            CV
                                        </th>

                                        <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
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
                                            {{ $capital->areaInvestigacion->nombre}}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $capital->correo }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            <a href="/user/template/uploads/pdfs/{{ $capital->cv }}">CV</a>
                                        </td>
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                            <form action="{{ route('capitales.destroy', $capital->id) }}" method="POST">
                                                <button type="button" onclick="openEditModal(this)" 
                                                data-capital='@json($capital)'
                                                class="text-blue-600 font-bold hover:text-blue-900">
                                                Editar
                                                </button>
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('capitales.destroy', $capital->id) }}" class="text-red-600 font-bold hover:text-red-900" onclick="event.preventDefault(); 
                                                    Swal.fire({
                                                        title: '¿Estás seguro?',
                                                        text: 'No será posible revertir los cambios!',
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33',
                                                        confirmButtonText: 'Eliminar'
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

{{-- --------------------Modal de create------------------------ --}}

<div id="createModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 w-full h-full">
    <div class="flex items-center justify-center w-full h-full">
        <div class="bg-slate-200 p-7 rounded shadow-lg max-w-4xl w-full relative max-h-screen overflow-y-auto">
            <!-- Título centrado en todo el modal -->
            <div class="main-title flex flex-col items-center gap-3 mb-8">
                <div class="title text-2xl font-semibold text-[#2e5382]">Nuevo Registro</div>
                <div class="blue-line w-2/5 h-0.5 bg-[#64d423]"></div>
            </div>
            <!-- Contenido del modal -->
            <form id="form" action="{{ route('capitales.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-6">
                @method('POST')
                @csrf
                <!-- Contenedor de columnas -->
                <div class="flex flex-col md:flex-row gap-6">
                    <!-- Columna izquierda -->
                    <div class="w-full md:w-1/2">
                        <div class="mb-4">
                            <label for="nombres" class="block">Nombres:</label>
                            <input type="text" id="nombres" name="nombres" class="w-full px-4 py-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="area_investigacion" class="block">Área de Investigación:</label>
                            <select id="area_investigacion" name="area_investigacion" class="w-full px-4 py-2 border rounded" required>
                                <option value="">Seleccione un área</option>
                                @foreach($areasInvestigacion as $area)
                                <option value="{{$area->id}}">{{$area->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="correo" class="block">Correo:</label>
                            <input type="email" id="correo" name="correo" class="w-full px-4 py-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="carrera" class="block">Grado Académico:</label>
                            <input type="text" id="carrera" name="carrera" class="w-full px-4 py-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="rol" class="block">Rol:</label>
                            <input type="text" id="rol" name="rol" class="w-full px-4 py-2 border rounded" required>
                        </div>
                    </div>
                    <!-- Columna derecha -->
                    <div class="w-full md:w-1/2">
                        <div class="relative flex justify-center items-center mb-4">
                            <img id="previewImage" src="" alt="Vista previa" class="w-full h-auto rounded shadow max-w-[150px] object-cover">
                            <button type="button" class="absolute top-1 right-1 bg-white p-2 rounded-full shadow hover:bg-gray-100" onclick="document.getElementById('imagen').click()">
                                🖉
                            </button>
                            <input type="file" id="imagen" name="imagen" class="hidden" accept="image/*" onchange="mostrarVistaPrevia(event)">
                        </div> 
                        <div class="mb-4">
                            <label for="cv" class="block">CV:</label>
                            <input type="file" id="cv" name="cv" class="w-full px-4 py-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="linkedin" class="block">LinkedIn:</label>
                            <input type="text" id="linkedin" name="linkedin" class="w-full px-4 py-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="ctivitae" class="block">Cti Vitae:</label>
                            <input type="text" id="ctivitae" name="ctivitae" class="w-full px-4 py-2 border rounded" required>
                        </div>
                    </div>
                </div>
                <!-- Botones de acción -->
                <div class="flex justify-center gap-4 mt-6">
                    <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-700">
                        Guardar
                    </button>
                    <button type="button" onclick="closeCreateModal()" class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-700">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>



{{-- --------------------MODAL DE EDITAR DE REGISTRO---------------------- --}}

<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 w-full h-full">
    <div class="flex items-center justify-center w-full h-full">
        <div class="bg-slate-200 p-7 rounded shadow-lg max-w-4xl w-full relative">
            <div class="main-title flex flex-col items-center gap-3 mb-8">
                <div class="title text-2xl font-semibold text-[#2e5382]">Editar Registro</div>
                <div class="blue-line w-2/5 h-0.5 bg-[#64d423]"></div>
            </div>
            <form id="editForm" action="" method="POST" enctype="multipart/form-data" class="flex flex-col gap-6">
                @csrf
                @method('PUT')
                <div class="flex felx-col md:flex-row gap-6">
                    <div class="w-full md:w-1/2">
                        <div class="mb-4">
                            <label for="edit_nombre" class="block">Nombres</label>
                            <input type="text" id="edit_nombre" name="edit_nombre" value="" class="w-full px-4 py-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="edit_area_investigacion" class="block">Área de Investigación</label>
                            <select id="edit_area_investigacion" name="edit_area_investigacion" class="w-full px-4 py-2 border rounded" required>
                                <option value="">Seleccione una opción</option>
                                @foreach($areasInvestigacion as $area)
                                    <option value="{{$area->id}}">
                                        {{ $area->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="edit_correo" class="block">Correo</label>
                            <input type="email" id="edit_correo" name="edit_correo" value="" class="w-full px-4 py-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="edit_carrera" class="block">Grado Académico</label>
                            <input type="text" id="edit_carrera" name="edit_carrera" value="" class="w-full px-4 py-2 border rounded" required>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2">
                        <div class="mb-4">
                            <label for="edit_cv" class="block">CV</label>
                            <input type="file" id="edit_cv" name="edit_cv" class="w-full px-4 py-2 border rounded">
                            
                            <!-- Mostrar el enlace al CV actual -->
                            <div id="cvPreview" class="mt-2">
                                <a id="cvLink" href="#" target="_blank" class="text-blue-600 hover:underline hidden">Ver CV Actual</a>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="edit_rol" class="block">Rol</label>
                            <input type="text" id="edit_rol" name="edit_rol" value="" class="w-full px-4 py-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="edit_linkedin" class="block">Linkedin</label>
                            <input type="text" id="edit_linkedin" name="edit_linkedin" value="" class="w-full px-4 py-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="edit_ctivitae" class="block">CtiVitae</label>
                            <input type="text" id="edit_ctivitae" name="edit_ctivitae" value="" class="w-full px-4 py-2 border rounded" required>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center gap-4 mt-6">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-700">
                        Actualizar
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
        
        // Limpia todos los campos del formulario
        document.getElementById('form').reset();

        // Limpia la vista previa de la imagen
        const previewImage = document.getElementById('previewImage');
        if (previewImage) {
            previewImage.src = ''; // Reinicia la imagen a su estado inicial
        }
    }

    function mostrarVistaPrevia(event) {
        const input = event.target;
        const previewImage = document.getElementById("previewImage");

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function openEditModal(button) {
        let capital = JSON.parse(button.getAttribute('data-capital'));
        console.log(capital);
        // Llenar los campos del modal con los valores de la variable capital
        document.getElementById('edit_nombre').value = capital.nombre;
        document.getElementById('edit_area_investigacion').selectedIndex = capital.area_investigacion.id;
        document.getElementById('edit_correo').value = capital.correo;
        document.getElementById('edit_carrera').value = capital.carrera;
        document.getElementById('edit_rol').value = capital.rol;
        document.getElementById('edit_linkedin').value = capital.linkedin;
        document.getElementById('edit_ctivitae').value = capital.ctivitae;

        // Modificar la acción del formulario para actualizar el registro correcto
        document.getElementById('editForm').action = `/admin/capitales/${capital.id}`;

        // Manejo del CV
        let cvLink = document.getElementById('cvLink');
        if (capital.cv) {
            cvLink.href = `/user/template/uploads/pdfs/${capital.cv}`;
            cvLink.classList.remove('hidden'); // Mostrar enlace
            cvLink.innerText = "Ver CV Actual";
        } else {
            cvLink.classList.add('hidden'); // Ocultar enlace si no hay CV
        }

        // Mostrar el modal
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    // Función para filtrar filas por rol
    // function filterByRole(role, element) {
    //     // Mostrar solo las filas que coincidan con el rol
    //     const rows = document.querySelectorAll('#table-body tr');
    //     rows.forEach(row => {
    //         row.style.display = row.dataset.role === role ? '' : 'none';
    //     });
    //     // Cambiar el título dinámicamente
    //     const title = document.querySelector('.main-title .title');
    //     title.textContent = `Capital Humano: ${role}`;

    //     // Quitar la clase activa de todos los botones
    //     const menuItems = document.querySelectorAll('.grid .cursor-pointer a');
    //     menuItems.forEach(item => {
    //         item.classList.remove('bg-blue-600', 'text-white');
    //         item.classList.add('text-gray-700'); // Restaurar el color original
    //     });

    //     // Activar el botón seleccionado
    //     element.classList.add('bg-blue-600', 'text-white');
    //     element.classList.remove('text-gray-700');
    // }

    // // Mostrar Investigadores por defecto al cargar la página
    // document.addEventListener('DOMContentLoaded', () => {
    //     const defaultButton = document.querySelector('#menu-investigadores a');
    //     filterByRole('Investigadores', defaultButton);
    // });

</script>
@endsection
