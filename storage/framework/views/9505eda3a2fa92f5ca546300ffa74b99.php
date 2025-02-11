<?php $__env->startSection('title', 'Vista Contacto'); ?>

<?php $__env->startSection('contenido'); ?>
    <div class="max-w-screen-2xl mx-auto my-8 px-4">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-[#2e5382]">Detalles de Contacto</h1>
            <div class="w-1/4 mx-auto h-0.5 bg-[#64d423]"></div>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-200 text-gray-700 uppercase">
                    <tr>
                        <th class="px-4 py-3">Nombres</th>
                        <th class="px-4 py-3">Apellidos</th>
                        <th class="px-4 py-3">Correo</th>
                        <th class="px-4 py-3">Teléfono</th>
                        <th class="px-4 py-3">País</th>
                        <th class="px-4 py-3">Departamento</th>
                        <th class="px-4 py-3">Asunto</th>
                        <th class="px-4 py-3">Mensaje</th>
                        <th class="px-4 py-3">Archivo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $contactos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contacto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3"><?php echo e($contacto->nombres); ?></td>
                            <td class="px-4 py-3"><?php echo e($contacto->apellidos); ?></td>
                            <td class="px-4 py-3"><?php echo e($contacto->correo); ?></td>
                            <td class="px-4 py-3"><?php echo e($contacto->telefono); ?></td>
                            <td class="px-4 py-3"><?php echo e($contacto->pais); ?></td>
                            <td class="px-4 py-3"><?php echo e($contacto->departamento); ?></td>
                            <td class="px-4 py-3"><?php echo e($contacto->asunto); ?></td>
                            <td class="px-4 py-3"><?php echo e($contacto->mensaje); ?></td>
                            <td class="px-4 py-3">
                                <?php if(in_array(pathinfo($contacto->archivo, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png'])): ?>
                                  <div class="px-8 py-0.1 text-center">
                                    <img
                                        src="<?php echo e(Storage::url($contacto->archivo)); ?>"
                                        alt="Archivo"
                                        class="w-8 h-8 object-cover rounded shadow cursor-pointer "
                                        onclick="openModal('<?php echo e(Storage::url($contacto->archivo)); ?>', 'image')"
                                    >
                                  </div>
                                <?php elseif(in_array(pathinfo($contacto->archivo, PATHINFO_EXTENSION), ['pdf'])): ?>
                                    <button
                                        class=" hover:underline cursor-pointer"
                                        onclick="openModal('<?php echo e(Storage::url($contacto->archivo)); ?>', 'pdf')"
                                    >
                                        <div class="px-8 py-0.1 text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                             <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h10M7 11h10m-6 4h6m4-14H5a2 2 0 00-2 2v16a2 2 0 002 2h14a2 2 0 002-2V3a2 2 0 00-2-2z" />
                                            </svg>
                                        </div>
                                    </button>
                                <?php elseif(in_array(pathinfo($contacto->archivo, PATHINFO_EXTENSION), ['docx'])): ?>
                                    <a
                                        href="<?php echo e(Storage::url($contacto->archivo)); ?>"
                                        target="_blank"
                                        class="text-blue-600 hover:underline"
                                    >
                                        Descargar WORD
                                    </a>
                                <?php else: ?>
                                    <span class="text-gray-500">No hay archivo</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
         <!-- Paginación -->
         <div class="flex justify-end text-sm">
             <?php echo e($contactos->links('pagination::tailwind')); ?>

         </div>
    </div>

    <!-- Modal -->
    <div
        id="archivoModal"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50"
    >
        <div class="bg-white p-7 rounded shadow-lg max-w-7xl w-full relative">
            <button
                class="absolute top-0.5 right-0.5 text-gray-500 hover:text-black text-3xl p-2"
                onclick="closeModal()"
            >
                &times;
            </button>
            <div id="modalContent"></div>
        </div>
    </div>

    <script>
        function openModal(fileUrl, fileType) {
            const modal = document.getElementById('archivoModal');
            const modalContent = document.getElementById('modalContent');

            if (fileType === 'image') {
                modalContent.innerHTML = `<img src="${fileUrl}" alt="Archivo" class="w-full max-h-[80vh] object-contain rounded">`;
            } else if (fileType === 'pdf') {
                modalContent.innerHTML = `<iframe src="${fileUrl}" class="w-full min-h-[550px]"></iframe>`;
            }

            modal.classList.remove('hidden');
        }

        function closeModal() {
            const modal = document.getElementById('archivoModal');
            modal.classList.add('hidden');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrador.dashboard.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CURSOS EXTRA ACADEMICOS\PAGINA LABCAM\PROYECTO\Labcam-Website\resources\views/administrador/panel/contacto/show.blade.php ENDPATH**/ ?>