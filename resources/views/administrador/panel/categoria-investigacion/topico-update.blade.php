@extends('administrador.dashboard.plantilla')

@section('title', 'topico')

@section('contenido')


    <section class="">
    
        <div class="mb-4 border-b-2 border-gray-200  ">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab"
                data-tabs-toggle="#default-styled-tab-content"
                data-tabs-active-classes="text-purple-600 hover:text-purple-600 "
                data-tabs-inactive-classes=" text-gray-500 hover:text-gray-600  border-gray-100 hover:border-gray-300 "
                role="tablist">
                <li class="me-2" role="presentation">
                    <a class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 cursor-pointer" id="area-styled-tab" role="tab"
                        aria-controls="area" aria-selected="false" data-tabs-target="#styled-area">Areas</a>
                </li>
                <li class="me-2" role="presentation">
                    <a class="inline-block p-4 border-b-2 rounded-t-lg  cursor-pointer border-[#64d423]"
                        data-tabs-target="#styled-topic" id="topic-styled-tab" role="tab" aria-controls="topic"
                        aria-selected="true">Topicos</a>
                </li>
            </ul>
        </div>
        
        <div id="default-styled-tab-content">
            <div class=" p-4 rounded-lg bg-gray-50" id="styled-topic" role="tabpanel" aria-labelledby="topic-tab">
                <div class="p-2">
                    <div class="max-w-[1200px] mx-auto sm:px-6 lg:px-8 space-y-6">
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <div class="w-full">
                                <div class="main-title flex flex-col items-center gap-3 mb-8">
                                    <div class="title text-2xl font-semibold text-[#2e5382]">Topicos</div>
                                    <div class="blue-line w-1/5 h-0 bg-[#64d423]"></div>
                                  </div>

                                <form class="sm:flex sm:items-center" action="{{ route('topics.update', $topico->id) }}" method="post"
                                    id="form">
                                    @csrf
                                    @method('PUT')
                                    <div class="sm:flex-auto">
                                        <div class="max-w-[500px]">
                                        <label for="nombre"
                                            class="block mb-2 text-sm font-medium text-gray-900 align-baseline">Nombre Topico</label>
                                        <input type="text" value="{{$topico->nombre}}" name="nombre" id="nombre"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            placeholder="Nombre del topico" required />
                                        </div>
                                    </div>
                                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none space-y-4">
                                        <button type="submit"
                                            class="mt-2 block rounded-md bg-blue-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-[#35a3e2] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                            Guardar Edicion</button>
                                        <a type="button" href="{{route('topic-panel')}}"
                                            class="block rounded-md bg-red-600 px-8 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                            Cancelar</a>

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
                                                            No</th>

                                                        <th scope="col"
                                                            class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                            Id</th>
                                                        <th scope="col"
                                                            class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                            Nombre</th>

                                                        <th scope="col"
                                                            class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-200 bg-white">
                                                    @foreach ($topicos as $topico)                                 
                                                        <tr class="even:bg-gray-50">
                                                            <td
                                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900">
                                                                {{ ++$i }}</td>

                                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                                {{ $topico->id }}</td>
                                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                                {{ $topico->nombre }}</td>

                                                            <td
                                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                                <form action="{{ route('topics.destroy', $topico->id) }}"
                                                                    method="POST">
                                                                    <a href="{{ route('topics.edit', $topico->id) }}"
                                                                        class="text-indigo-600 font-bold hover:text-indigo-900  mr-2">Editar</a>
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <a href="{{ route('topics.destroy', $topico->id) }}"
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
                                                {!! $topicos->withQueryString()->links() !!}
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


@endsection