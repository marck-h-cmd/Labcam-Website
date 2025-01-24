@extends('administrador.dashboard.plantilla')

@section('contenido')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold text-center mb-4 text-[#2e5382]">Editar Registro</h2>
    <form action="{{ route('capitales.update', $capital->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nombres" class="block font-medium">Nombres</label>
            <input type="text" id="nombres" name="nombres" class="w-full border px-3 py-2 rounded" value="{{ $capital->nombre }}" required>
        </div>
        <div class="mb-4">
            <label for="carrera" class="block font-medium">Carrera</label>
            <input type="text" id="carrera" name="carrera" class="w-full border px-3 py-2 rounded" value="{{ $capital->carrera }}" required>
        </div>
        <div class="mb-4">
            <label for="Area_de_Investigacion" class="block font-medium">Área de Investigación</label>
            <select id="Area_de_Investigacion" name="Area_de_Investigacion" class="w-full border px-3 py-2 rounded" required>
                @foreach($areas as $area)
                    <option value="{{ $area->id }}" {{ $capital->areaInvestigacion->id == $area->id ? 'selected' : '' }}>
                        {{ $area->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="correo" class="block font-medium">Correo</label>
            <input type="email" id="correo" name="correo" class="w-full border px-3 py-2 rounded" value="{{ $capital->correo }}" required>
        </div>
        <div class="mb-4">
            <label for="cv" class="block font-medium">CV</label>
            <input type="file" id="cv" name="cv" class="w-full border px-3 py-2 rounded">
        </div>
        <div class="mb-4">
            <label for="rol" class="block font-medium">Rol</label>
            <input type="text" id="rol" name="rol" class="w-full border px-3 py-2 rounded" value="{{ $capital->rol }}" required>
        </div>
        <div class="flex justify-between mt-6">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-700">
                Guardar Cambios
            </button>
            <a href="{{ route('capitales') }}" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-700">
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
