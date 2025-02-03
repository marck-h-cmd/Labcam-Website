@extends('administrador.dashboard.plantilla')

@section('contenido')
<div class="main-title flex flex-col items-center gap-3 mb-8">
    <div class="title text-2xl font-semibold text-[#2e5382]">Dirección</div>
    <div class="blue-line w-1/5 h-0.5 bg-[#64d423]"></div>
</div>


{{-- -----------CAMBIOS------- --}}
<div class="p-2">
    <div class="max-w-[1200px] mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="w-full">
                <form class="sm:flex sm:items-center sm:justify-between flex-col sm:flex-row gap-4" action="" method="POST" id="form1">
                    @csrf
                    <div class="sm:flex-none flex justify-center sm:justify-start">
                        <button type="button" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-700 w-full sm:w-auto" onclick="openCreateModal()">
                            + Nuevo
                        </button>
                    </div>                    
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
                                            descripción
                                        </th>
                                        <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                            Opciones
                                        </th>

                                    </tr>
                                </thead>
                                <tbody id="table-body" class="divide-y divide-gray-200 bg-white">
                                    @foreach ($direccion as $direccion)
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $direccion->nombre}}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $direccion->carrera}}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $direccion->descripcion }}
                                        </td>
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                            <form action="" method="POST">
                                                <button type="button" onclick="openEditModal(this)" 
                                                data-capital='@json($direccion)'
                                                class="text-blue-600 font-bold hover:text-blue-900">
                                                Editar
                                                </button>
                                                @csrf
                                                @method('DELETE')
                                                <a href="" class="text-red-600 font-bold hover:text-red-900" onclick="event.preventDefault(); 
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
                                    @endforeach
                                </tbody>
                            </table>
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
            <form id="form" action="{{ route('direccion.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-6">
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
                        <label for="descripcion" class="block">descripción:</label>
                        <input type="text" id="descripcion" name="descripcion" class="w-full px-4 py-2 border rounded" required>
                    </div>
                </div>
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
                            <label for="edit_carrera" class="block">Grado Académico</label>
                            <input type="text" id="edit_carrera" name="edit_carrera" value="" class="w-full px-4 py-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="edit_rol" class="block">Rol</label>
                            <input type="text" id="edit_rol" name="edit_rol" value="" class="w-full px-4 py-2 border rounded" required>
                        </div>
                        <div class="relative flex justify-center items-center mb-4">
                            <img id="previewImage" src="" alt="Vista previa" class="w-full h-auto rounded shadow max-w-[150px] object-cover">
                            <button type="button" class="absolute top-1 right-1 bg-white p-2 rounded-full shadow hover:bg-gray-100" onclick="document.getElementById('imagen').click()">
                                🖉
                            </button>
                            <input type="file" id="edit_img" name="edit_img" class="hidden" accept="image/*" onchange="mostrarVistaPrevia(event)">
                        </div>
                        <div class="mb-4">
                            <label for="edit_descripcion" class="block">Rol</label>
                            <input type="text" id="edit_descripcion" name="edit_descripcion" value="" class="w-full px-4 py-2 border rounded" required>
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
        document.getElementById('edit_nombre').value = direccion.nombre;
        document.getElementById('edit_carrera').value = direccion.carrera;
        document.getElementById('edit_rol').value = direccion.rol;
        document.getElementById('editForm').action = `/admin/direccion/${direccion.id}`;
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
    
</script>

@endsection