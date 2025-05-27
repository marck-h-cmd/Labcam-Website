@extends('administrador.dashboard.plantilla')

@section('title', 'Slider panel')

@section('contenido')


    <section class="">

        <div id="default-styled-tab-content">
            <div class=" p-4 rounded-lg bg-gray-50" id="styled-topic" role="tabpanel" aria-labelledby="topic-tab">
                <div class="p-2">
                    <div class="max-w-[1200px] mx-auto sm:px-6 lg:px-8 space-y-6">
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <div class="w-full">
                                <div class="main-title flex flex-col items-center gap-3 mb-8">
                                    <div class="title text-2xl font-semibold text-[#2e5382]">Historia Slider Panel</div>
                                    <div class="blue-line w-1/5 h-0 bg-[#64d423]"></div>
                                </div>



                                  <!-- TABLA SLIDERS -->
                                <div class="flow-root">
                                    <div class="mt-10 overflow-x-auto">
                                        <div class="inline-block min-w-full py-2 align-middle">
                                            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                                    <tr>
                                                        <th scope="col" class="px-3 py-3">
                                                            Numero
                                                        </th>
                                                        <th scope="col" class=" px-16 py-3">
                                                            <span class="sr-only">Imagen Slider</span>
                                                        </th>
                                                        <th scope="col" class="px-20 py-3">
                                                            Descripción
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Acciones
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($sliders as $slider)
                                                        <tr class="bg-white border-b  hover:bg-gray-50 ">
                                                            <td class="px-3 py-4 font-semibold text-gray-900 ">
                                                                {{ ++$i }}
                                                            </td>
                                                            <td class="p-4">
                                                                <img src="{{ Storage::url('uploads/imgs/' . $slider->historia_img) }}"
                                                                    class="w-16 md:w-32 max-w-full max-h-full"
                                                                    alt="Imagen {{$slider->id}}">
                                                            </td>
                                                            <td class="px-6 py-4 text-gray-900">
                                                                {!! $slider->descripcion !!}</p>
                                                            </td>
                                                            <td
                                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                                <form class="flex" action="{{ route('h-slider.destroy', $slider->id) }}"
                                                                    method="POST">
                                                                    
                                                                    <a href="{{ route('h-slider.edit', $slider->id) }}"
                                                                        class="text-indigo-600 font-bold hover:text-indigo-900  mr-3"><svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M8.56078 20.2501L20.5608 8.25011L15.7501 3.43945L3.75012 15.4395V20.2501H8.56078ZM15.7501 5.56077L18.4395 8.25011L16.5001 10.1895L13.8108 7.50013L15.7501 5.56077ZM12.7501 8.56079L15.4395 11.2501L7.93946 18.7501H5.25012L5.25012 16.0608L12.7501 8.56079Z" fill="#473bce"></path> </g></svg></a>
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <a href="{{ route('h-slider.destroy', $slider->id) }}"
                                                                        class="text-red-600 font-bold hover:text-red-900"
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
                                                                         });">
                                                                         <svg class="h-6 w-6" viewBox="0 -0.5 21 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>delete [#f31212]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-179.000000, -360.000000)" fill="#f31212"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M130.35,216 L132.45,216 L132.45,208 L130.35,208 L130.35,216 Z M134.55,216 L136.65,216 L136.65,208 L134.55,208 L134.55,216 Z M128.25,218 L138.75,218 L138.75,206 L128.25,206 L128.25,218 Z M130.35,204 L136.65,204 L136.65,202 L130.35,202 L130.35,204 Z M138.75,204 L138.75,200 L128.25,200 L128.25,204 L123,204 L123,206 L126.15,206 L126.15,220 L140.85,220 L140.85,206 L144,206 L144,204 L138.75,204 Z" id="delete-[#f31212]"> </path> </g> </g> </g> </g></svg>
                                                                    </a>

                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>

                                            <div class="mt-4 px-4">
                                                {!! $sliders->withQueryString()->links() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </div>

    </section>

    @if (session('success'))
        <script>
            Swal.fire({
                title: "Eliminado!",
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
                title: "Actualizado!",
                text: "{{ session('edited') }}",
                icon: "success",
                customClass: {
                    confirmButton: 'bg-green-500 text-white hover:bg-green-600 focus:ring-2 focus:ring-green-300 rounded-lg py-2 px-4'
                }
            });
        </script>
    @elseif(session('error'))
    <script>
        Swal.fire({
            title: "Error!",
            text: "{{ session('error') }}",
            icon: "success",
            customClass: {
                confirmButton: 'bg-red-500 text-white hover:bg-green-600 focus:ring-2 focus:ring-green-300 rounded-lg py-2 px-4'
            }
        });
    </script>
    @endif


@endsection
