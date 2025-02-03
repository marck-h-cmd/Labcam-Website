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
                                    @foreach ($direcciones as $direccion)
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
                                            <form action="{{ route('direcciones.update', $direccion->id) }}" method="POST">
                                                <button type="button" onclick="openEditModal(this)" 
                                                data-capital='@json($direccion)'
                                                class="text-blue-600 font-bold hover:text-blue-900">
                                                Editar
                                                </button>
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
                        <div class="mb-4">
                            <label for="edit_descripcion" class="block">Descripción</label>
                            <textarea type="text" id="edit_descripcion" name="edit_descripcion" value="" class="w-full px-4 py-2 border rounded" required></textarea>
                        </div>
                    </div>
                    <div class="relative flex justify-center items-center mb-4">
                        <img id="previewImage" src="" alt="Vista previa" class="w-full h-auto rounded shadow max-w-[150px] object-cover">
                        <button type="button" class="absolute top-1 right-1 bg-white p-2 rounded-full shadow hover:bg-gray-100" onclick="document.getElementById('edit_img').click()">
                            🖉
                        </button>
                        <input type="file" id="edit_img" name="edit_img" class="hidden" accept="image/*" onchange="mostrarVistaPrevia(event)">
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
            let direccion = JSON.parse(button.getAttribute('data-capital'));
            document.getElementById('edit_nombre').value = direccion.nombre;
            document.getElementById('edit_carrera').value = direccion.carrera;
            document.getElementById('edit_rol').value = direccion.rol;
            document.getElementById('edit_descripcion').value = direccion.descripcion;
            document.getElementById('editForm').action = `/admin/direccion/${direccion.id}`;
            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }
        
    </script>

@endsection