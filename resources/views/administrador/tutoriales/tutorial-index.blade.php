@extends('administrador.dashboard.plantilla')

@section('title', 'Tutoriales')

@section('contenido')


<div class="max-w-screen-2xl mx-auto my-8 px-4">
    <!-- Sección de detalles de tutoriales -->
    <div class="text-center mb-6">
        <h1 class="text-2xl font-bold text-[#2e5382]">Tutoriales</h1>
        <div class="w-1/4 mx-auto h-0.5 bg-[#64d423]"></div>
    </div>


    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full text-sm text-left text-gray-600 table-fixed">
            <thead class="bg-blue-400 text-gray-50 uppercase">
                <tr>
                    <th class="px-4 py-3">Título</th>
                    <th class="px-2 py-3">Visualizar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tutorials as $tutorial)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-6 font-semibold">{{ $tutorial->titulo }}</td>
                        <td class="px-2 py-6 ">
                            <a href="{{ route('tutorials.show', $tutorial->id) }}"
                                class="text-gray-50 font-bold  hover:bg  bg-blue-500 hover:bg-blue-600 transition-all ease-out p-3 text-center rounded-md my-3 text-md  cursor-pointer">Acceder</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="flex justify-end text-sm mt-4">
        {{ $tutorials->links('pagination::tailwind') }}
    </div>
</div>
@endsection