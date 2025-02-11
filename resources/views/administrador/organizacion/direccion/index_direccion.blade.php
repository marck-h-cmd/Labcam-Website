@extends('administrador.dashboard.plantilla')

@section('contenido')
<div class="main-title flex flex-col items-center gap-3 mb-8">
    <div class="title text-2xl font-semibold text-[#2e5382]">Dirección</div>
    <div class="blue-line w-1/5 h-0.5 bg-[#64d423]"></div>
</div>

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
                                            Nombres y Apellidos
                                        </th>
                                        <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                            Grado Académico
                                        </th>
                                        <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                            Rol
                                        </th>
                                        <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                            Linkedin
                                        </th>
                                        <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                            Cti Vitae
                                        </th>
                                        <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                            Foto
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
                                    @foreach ($direcciones as $direccion)
                                    <tr>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $direccion->nombre}}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $direccion->carrera }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $direccion->rol}}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            <a href="{{ $direccion->linkedin}}"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 64 64">
                                                <rect width="50" height="50" x="7" y="7" fill="#58b5e8" rx="6" ry="6"></rect><path fill="#faefde" d="M19.5 19A3.5 3.5 0 1 0 19.5 26 3.5 3.5 0 1 0 19.5 19zM39.76 28c-2.21 0-5 1.78-6.19 2.79V29.46a1 1 0 0 0-1-1H27.48a1 1 0 0 0-1 1v21a1 1 0 0 0 1 1h5.4a1 1 0 0 0 1-1V39.88c0-3.16 1.78-5.34 3.89-5.34s3.37 2.39 3.37 5.51V50.48a1 1 0 0 0 1 1h5.4a1 1 0 0 0 1-1V38.77C48.4 33.44 47.37 28 39.76 28zM16 29H23V51H16z"></path><path fill="#65c5ef" d="M11,7H53a4,4,0,0,1,4,4v0a3,3,0,0,1-3,3H10a3,3,0,0,1-3-3v0a4,4,0,0,1,4-4Z"></path><path fill="#8d6c9f" d="M23 28H16a1 1 0 0 0-1 1V51a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V29A1 1 0 0 0 23 28zM22 50H17V30h5zM39.88 27.44a8.47 8.47 0 0 0-5.44 1.88V29a1 1 0 0 0-1-1H27a1 1 0 0 0-1 1V51a1 1 0 0 0 1 1h6.7a1 1 0 0 0 1-1V39.89c0-3.31.82-4.55 3-4.55s2.49 1.46 2.49 4.72V51a1 1 0 0 0 1 1h6.71a1 1 0 0 0 1-1V38.72C48.92 33.14 47.85 27.44 39.88 27.44zm7 22.56H42.21V40.06c0-2.35 0-6.72-4.49-6.72-5 0-5 4.93-5 6.55V50H28V30h4.43v2a1.08 1.08 0 0 0 1.09 1 1 1 0 0 0 .88-.53 6.07 6.07 0 0 1 5.46-3c5.87 0 7 3.55 7 9.29zM19.5 18A4.5 4.5 0 1 0 24 22.5 4.5 4.5 0 0 0 19.5 18zm0 7.33a2.83 2.83 0 1 1 2.83-2.83A2.83 2.83 0 0 1 19.5 25.33z"></path><path fill="#8d6c9f" d="M51,6H13a7,7,0,0,0-7,7V51a7,7,0,0,0,7,7H51a7,7,0,0,0,7-7V13A7,7,0,0,0,51,6Zm5,45a5,5,0,0,1-5,5H13a5,5,0,0,1-5-5V13a5,5,0,0,1,5-5H51a5,5,0,0,1,5,5Z"></path><path fill="#8d6c9f" d="M17 16a1 1 0 0 0 1-1V13a1 1 0 0 0-2 0v2A1 1 0 0 0 17 16zM12 12a1 1 0 0 0-1 1v2a1 1 0 0 0 2 0V13A1 1 0 0 0 12 12zM32 16a1 1 0 0 0 1-1V13a1 1 0 0 0-2 0v2A1 1 0 0 0 32 16zM37 16a1 1 0 0 0 1-1V13a1 1 0 0 0-2 0v2A1 1 0 0 0 37 16zM42 16a1 1 0 0 0 1-1V13a1 1 0 0 0-2 0v2A1 1 0 0 0 42 16zM47 16a1 1 0 0 0 1-1V13a1 1 0 0 0-2 0v2A1 1 0 0 0 47 16zM52 12a1 1 0 0 0-1 1v2a1 1 0 0 0 2 0V13A1 1 0 0 0 52 12zM22 16a1 1 0 0 0 1-1V13a1 1 0 0 0-2 0v2A1 1 0 0 0 22 16zM27 16a1 1 0 0 0 1-1V13a1 1 0 0 0-2 0v2A1 1 0 0 0 27 16z"></path>
                                                </svg></a>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            <a href="{{ $direccion->ctivitae}}"><img width="40" height="40" src="https://img.icons8.com/fluency/48/link.png" alt="link"/></a>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            <a href="/user/template/images/{{ $direccion->foto}}"><img width="40" height="40" src="https://img.icons8.com/stickers/50/image.png" alt="image"/></a>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            <a href="/user/template/uploads/pdfs/{{ $direccion->cv }}"><img width="40" height="40" src="https://img.icons8.com/ultraviolet/40/documents.png" alt="documents"/></a>
                                        </td>
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                            <button type="button" onclick="openEditModal(this)" data-direccion='@json($direccion)'class="text-blue-600 font-bold hover:text-blue-900">
                                                <img width="40" height="40" src="https://img.icons8.com/stickers/50/sign-up.png" alt="sign-up"/>
                                            </button>
                                        </td>
                                    </tr>
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
                <div class="title text-2xl font-semibold text-[#2e5382]">Editar</div>
                <div class="blue-line w-2/5 h-0.5 bg-[#64d423]"></div>
            </div>
            <form id="editForm" action="" method="POST" enctype="multipart/form-data" class="flex flex-col gap-6">
                @csrf
                @method('PUT')
                <div class="flex felx-col md:flex-row gap-6">
                    <div class="w-full md:w-1/2">
                        <div class="mb-4">
                            <label for="edit_nombre" class="block">Nombres y Apellidos</label>
                            <input type="text" id="edit_nombre" name="edit_nombre" value="" class="w-full px-4 py-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="edit_carrera" class="block">Grado Académico</label>
                            <input type="text" id="edit_carrera" name="edit_carrera" value="" class="w-full px-4 py-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="edit_rol" class="block">Rol</label>
                            <input type="text" id="edit_rol" name="edit_rol" value="" class="w-full px-4 py-2 border rounded" readonly>
                        </div>
                        <div class="mb-4">
                            <label for="edit_descripcion" class="block">Descripción</label>
                            <textarea type="text" id="edit_descripcion" name="edit_descripcion" value="" class="w-full px-4 py-2 border rounded" rows=8 required></textarea>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2">
                        <div class="relative flex justify-center items-center mb-4">
                            <img id="previewImg" alt="Vista previa" class="w-full h-auto rounded shadow max-w-[150px] object-cover">
                            <button type="button" class="absolute top-1 right-1 bg-white p-2 rounded-full shadow hover:bg-gray-100" onclick="document.getElementById('edit_img').click()">
                                🖉
                            </button>
                            <input type="file" id="edit_img" name="edit_img" class="hidden" accept="image/*" onchange="previewImage(event)">
                        </div>
                        <div class="mb-4">
                            <label for="edit_cv" class="block">CV</label>
                            <input type="file" id="edit_cv" name="edit_cv" class="w-full px-4 py-2 border rounded">
                            <div id="cvPreview" class="mt-2">
                                <a id="cvLink" href="#" target="_blank" class="text-blue-600 hover:underline hidden">Ver CV Actual</a>
                            </div>
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

    function previewImage(event) {
        const input1 = event.target;
        const previewImg = document.getElementById("previewImg");

        if (input1.files && input1.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
            };
            reader.readAsDataURL(input1.files[0]);
        }
    }

    function openEditModal(button) {
        let direccion = JSON.parse(button.getAttribute('data-direccion'));
        document.getElementById('edit_nombre').value = direccion.nombre;
        document.getElementById('edit_descripcion').value = direccion.descripcion;
        document.getElementById('edit_carrera').value = direccion.carrera;
        document.getElementById('edit_rol').value = direccion.rol;
        document.getElementById('edit_linkedin').value = direccion.linkedin;
        document.getElementById('edit_ctivitae').value = direccion.ctivitae;
        document.getElementById('previewImg').src = `/user/template/images/${direccion.foto}`;
        document.getElementById('editForm').action = `/admin/direccion/${direccion.id}`;

        // Manejo del CV
        let cvLink = document.getElementById('cvLink');
        if (direccion.cv) {
            cvLink.href = `/user/template/uploads/pdfs/${direccion.cv}`;
            cvLink.classList.remove('hidden'); // Mostrar enlace
            cvLink.innerText = "Ver CV Actual";
        } else {
            cvLink.classList.add('hidden'); // Ocultar enlace si no hay CV
        }

        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
</script>

@endsection

