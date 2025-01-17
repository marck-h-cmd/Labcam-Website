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
                                                            Action
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
                                                                <form action="{{ route('h-slider.destroy', $slider->id) }}"
                                                                    method="POST">
                                                                    
                                                                    <a href="{{ route('h-slider.edit', $slider->id) }}"
                                                                        class="text-indigo-600 font-bold hover:text-indigo-900  mr-2">Editar</a>
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
    @endif

@endsection
