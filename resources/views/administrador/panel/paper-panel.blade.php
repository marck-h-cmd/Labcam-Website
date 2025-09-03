@extends('administrador.dashboard.plantilla')

@section('title', 'biblioteca')

@section('contenido')
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900 leading-tight">
            Papers
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow-xl sm:rounded-2xl border border-gray-100">
                <div class="px-6 py-8">
                    <!-- Header Section -->
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-8">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="p-2 bg-indigo-50 rounded-lg">
                                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <h1 class="text-xl font-bold text-gray-900">Gestión de Papers</h1>
                            </div>
                            <p class="text-gray-600">Administra y visualiza todos los papers académicos registrados en el sistema.</p>
                            
                            <!-- Search Bar -->
                            <div class="mt-6 max-w-md">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>
                                    <input 
                                        class="block w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl bg-gray-50 focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm transition-all duration-200 hover:bg-white" 
                                        type="text" 
                                        id="search" 
                                        placeholder="Buscar por título, autor o área..." 
                                    />
                                </div>
                            </div>
                        </div>
                        
                        <!-- Create Button -->
                        <div class="flex-shrink-0">
                            <a href="{{ route('papers.create') }}" 
                               class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-indigo-600 to-indigo-700 text-white font-semibold rounded-xl shadow-lg hover:from-indigo-700 hover:to-indigo-800 focus:outline-none focus:ring-4 focus:ring-indigo-500/50 transition-all duration-200 transform hover:scale-105">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Nuevo Paper
                            </a>
                        </div>
                    </div>

                    <!-- Table Section -->
                    <div class="bg-gray-50 rounded-xl border border-gray-100">
                        <div class="overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th scope="col" class="px-4 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                #
                                            </th>
                                            <th scope="col" class="px-4 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Título
                                            </th>
                                            <th scope="col" class="px-4 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Área
                                            </th>
                                            <th scope="col" class="px-4 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Descripción
                                            </th>
                                            <th scope="col" class="px-4 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Autores
                                            </th>
                                            <th scope="col" class="px-4 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Publisher
                                            </th>
                                            <th scope="col" class="px-4 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                DOI
                                            </th>
                                            <th scope="col" class="px-4 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Fecha
                                            </th>
                                            <th scope="col" class="px-4 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Archivos
                                            </th>
                                            <th scope="col" class="px-4 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-100">
                                        @foreach ($papers as $paper)
                                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                                <td class="px-4 py-6 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    <span class="bg-gray-100 px-3 py-1 rounded-full text-xs font-semibold">{{ ++$i }}</span>
                                                </td>
                                                
                                                <td class="px-4 py-6 text-sm text-gray-900">
                                                    <div class="max-w-xs">
                                                        <p class="font-semibold truncate">{{ $paper->titulo }}</p>
                                                    </div>
                                                </td>
                                                
                                                <td class="px-4 py-6 whitespace-nowrap text-sm">
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200">
                                                        {{ $paper->area ? $paper->area->nombre : 'Sin área' }}
                                                    </span>
                                                </td>
                                                
                                                <td class="px-4 py-6 text-sm text-gray-600">
                                                    <div class="max-w-sm">
                                                        <p class="line-clamp-2 description-text" data-full-text="{{ $paper->descripcion }}">{{ $paper->descripcion }}</p>
                                                        @if(strlen($paper->descripcion) > 100)
                                                            <button onclick="toggleDescription(this)" 
                                                                    class="text-indigo-600 hover:text-indigo-800 text-xs font-medium mt-1 transition-colors duration-150">
                                                                Ver más
                                                            </button>
                                                        @endif
                                                    </div>
                                                </td>
                                                
                                                <td class="px-4 py-6 whitespace-nowrap text-sm text-gray-600">
                                                    <div class="max-w-xs truncate">
                                                        {{ $paper->formatted_autores }}
                                                    </div>
                                                </td>
                                                
                                                <td class="px-4 py-6 whitespace-nowrap text-sm text-gray-600">
                                                    {{ $paper->publisher }}
                                                </td>
                                                
                                                <td class="px-4 py-6 whitespace-nowrap text-sm text-gray-600 font-mono">
                                                    <div class="max-w-xs truncate">
                                                        {{ $paper->doi }}
                                                    </div>
                                                </td>
                                                
                                                <td class="px-4 py-6 whitespace-nowrap text-sm text-gray-600">
                                                    {{ $paper->fecha_publicacion }}
                                                </td>
                                                
                                                <td class="px-4 py-6 whitespace-nowrap text-sm">
                                                    <div class="flex items-center gap-3">
                                                        <!-- Image Preview -->
                                                        <button type="button" 
                                                                onclick="openModal('{{ Storage::url('uploads/paper_img/' . $paper->img_filename) }}')" 
                                                                class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-medium text-green-700 bg-green-50 border border-green-200 rounded-lg hover:bg-green-100 transition-colors duration-150">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                            </svg>
                                                            Imagen
                                                        </button>
                                                        
                                                        <!-- PDF Link -->
                                                        <a href="/storage/uploads/pdf/{{ $paper->pdf_filename }}" 
                                                           target="_blank" 
                                                           class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-medium text-red-700 bg-red-50 border border-red-200 rounded-lg hover:bg-red-100 transition-colors duration-150">
                                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                                <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                                                            </svg>
                                                            PDF
                                                        </a>
                                                    </div>
                                                </td>
                                                
                                                <td class="px-4 py-6 whitespace-nowrap text-center">
                                                    <div class="flex items-center justify-center gap-2">
                                                        <!-- View -->
                                                        <a href="{{ route('biblioteca.papers.show', $paper->id) }}" 
                                                           class="p-2 text-gray-500 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors duration-150"
                                                           title="Ver detalles">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                            </svg>
                                                        </a>
                                                        
                                                        <!-- Edit -->
                                                        <a href="{{ route('papers.edit', $paper->id) }}" 
                                                           class="p-2 text-gray-500 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-colors duration-150"
                                                           title="Editar">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                            </svg>
                                                        </a>
                                                        
                                                        <!-- Delete -->
                                                        <form class="inline-block" action="{{ route('papers.destroy', $paper->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" 
                                                                    onclick="event.preventDefault(); 
                                                                             Swal.fire({
                                                                                 title: '¿Estás seguro?',
                                                                                 text: 'No será posible revertir los cambios!',
                                                                                 icon: 'warning',
                                                                                 showCancelButton: true,
                                                                                 customClass: {
                                                                                    confirmButton: 'swal2-confirm-green',
                                                                                    cancelButton: 'swal2-cancel-red'
                                                                                },
                                                                                 confirmButtonText: 'Sí, eliminar'
                                                                             }).then((result) => {
                                                                                 if (result.isConfirmed) {
                                                                                     this.closest('form').submit();
                                                                                 }
                                                                             });"
                                                                    class="p-2 text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors duration-150"
                                                                    title="Eliminar">
                                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="bg-white px-6 py-4 border-t border-gray-200">
                            {!! $papers->withQueryString()->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Image Preview -->
    <div id="archivoModal" class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center hidden z-50">
        <div class="bg-white p-6 rounded-2xl shadow-2xl max-w-5xl w-full mx-4 relative">
            <button class="absolute -top-2 -right-2 bg-gray-800 text-white w-8 h-8 rounded-full flex items-center justify-center hover:bg-gray-700 transition-colors duration-150" onclick="closeModal()">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <div id="modalContent" class="max-h-[80vh] overflow-auto"></div>
        </div>
    </div>

    <!-- Success/Edit Messages -->
    @if (session('success'))
        <script>
            Swal.fire({
                title: "¡Eliminado!",
                text: "{{ session('success') }}",
                icon: "success",
                customClass: {
                    confirmButton: 'bg-green-500 text-white hover:bg-green-600 focus:ring-2 focus:ring-green-300 rounded-lg py-2 px-4'
                }
            });
        </script>
    @elseif(session('edited'))
        <script>
            Swal.fire({
                title: "¡Actualizado!",
                text: "{{ session('edited') }}",
                icon: "success",
                customClass: {
                    confirmButton: 'bg-green-500 text-white hover:bg-green-600 focus:ring-2 focus:ring-green-300 rounded-lg py-2 px-4'
                }
            });
        </script>   
    @endif

    <script>
        function toggleDescription(button) {
            const descriptionElement = button.previousElementSibling;
            const isExpanded = descriptionElement.classList.contains('line-clamp-none');
            
            if (isExpanded) {
                descriptionElement.classList.remove('line-clamp-none');
                descriptionElement.classList.add('line-clamp-2');
                button.textContent = 'Ver más';
                button.classList.remove('text-indigo-800');
                button.classList.add('text-indigo-600');
            } else {
                descriptionElement.classList.remove('line-clamp-2');
                descriptionElement.classList.add('line-clamp-none');
                button.textContent = 'Ver menos';
                button.classList.remove('text-indigo-600');
                button.classList.add('text-indigo-800');                                            
            }
        }

        function openModal(fileUrl) {
            const modal = document.getElementById('archivoModal');
            const modalContent = document.getElementById('modalContent');
            modalContent.innerHTML = `<img src="${fileUrl}" alt="Imagen del paper" class="w-full h-auto rounded-xl shadow-lg">`;
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            const modal = document.getElementById('archivoModal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });

        // Close modal when clicking outside
        document.getElementById('archivoModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .line-clamp-none {
            display: block;
            overflow: visible;
        }
        
        /* Custom scrollbar */
        .overflow-x-auto::-webkit-scrollbar {
            height: 6px;
        }
        
        .overflow-x-auto::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 6px;
        }
        
        .overflow-x-auto::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 6px;
        }
        
        .overflow-x-auto::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
@endsection

@section('script')
    <script>
        const searchBar = document.getElementById("search");
        
        document.addEventListener("DOMContentLoaded", () => {
            function searchPapers(query) {
                fetch(`/admin/papers/buscar?search=${query}`, {
                        method: 'GET',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.text())
                    .then(html => {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');
                        const tableBody = doc.querySelector('tbody');
                        document.querySelector('tbody').innerHTML = tableBody.innerHTML;
                    })
                    .catch(error => console.error('Error:', error));
            }

            searchBar.addEventListener("input", () => {
                const query = searchBar.value;
                searchPapers(query);
            });
        });
    </script>
@endsection