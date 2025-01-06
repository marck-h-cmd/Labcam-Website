@extends('administrador.dashboard.plantilla')

@section('title', 'biblioteca')

@section('contenido')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Papers
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="w-full">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Panel papers</h1>
                        <p class="mt-2 text-sm text-gray-700">Lista de todos los papers registrados.</p>
                    </div>
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <a type="button" href="{{ route('papers.create') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Crear Nuevo</a>
                    </div>
                </div>

                <div class="flow-root">
                    <div class="mt-8 overflow-x-auto">
                        <div class="inline-block min-w-full py-2 align-middle">
                            <table class="w-full divide-y divide-gray-300">
                                <thead>
                                <tr>
                                    <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">No</th>
                                    
                                <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Titulo</th>
                                <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Area</th>
                                <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Descripcion</th>
                                <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Autores</th> 
                                <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Publisher</th>               
                                <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Doi</th>
                                <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Fecha Publicación</th>

                                    <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500"></th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($papers as $paper)
                                    <tr class="even:bg-gray-50">
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900">{{ ++$i }}</td>
                                        
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $paper->titulo }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $paper->area }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 overflow-hidden max-w-96">{{ $paper->descripcion }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $paper->formatted_autores }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $paper->publisher }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $paper->doi }}</td>                                                                  
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $paper->fecha_publicacion }}</td>
                                    

                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                            <form action="{{ route('papers.destroy', $paper->id) }}" method="POST">
                                                <a href="{{ route('papers.show', $paper->id) }}" class="text-gray-600 font-bold hover:text-gray-900 mr-2">Mostrar</a>
                                                <a href="{{ route('papers.edit', $paper->id) }}" class="text-indigo-600 font-bold hover:text-indigo-900  mr-2">Editar</a>
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('papers.destroy', $paper->id) }}" class="text-red-600 font-bold hover:text-red-900" onclick="event.preventDefault(); confirm('Estas seguro que quieres eliminarlo?') ? this.closest('form').submit() : false;">Eliminar</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="mt-4 px-4">
                                {!! $papers->withQueryString()->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection