@extends('administrador.dashboard.plantilla')

@section('contenido')
<div class="container mx-auto p-6">
    <div class="main-title flex flex-col items-center gap-3 mb-8">
        <div class="title text-2xl font-semibold text-[#2e5382]">Editar Registro</div>
        <div class="blue-line w-2/5 h-0.5 bg-[#64d423]"></div>
    </div>

    <form action="{{ route('capitales.update', $capital->id) }}" method="POST" class="bg-white p-7 rounded shadow-lg max-w-4xl mx-auto">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nombre" class="block">Nombres</label>
            <input type="text" id="nombre" name="nombre" value="{{ $capital->nombre }}" class="w-full px-4 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="carrera" class="block">Carrera</label>
            <input type="text" id="carrera" name="carrera" value="{{ $capital->carrera }}" class="w-full px-4 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="area_investigacion" class="block">Área de Investigación</label>
            <select id="area_investigacion" name="area_investigacion" class="w-full px-4 py-2 border rounded" required>
                <option value="">Seleccione una opción</option>
                @foreach($areasInvestigacion as $area)
                    <option value="{{ $area->id }}" {{ $capital->area_investigacion == $area->id ? 'selected' : '' }}>
                        {{ $area->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="correo" class="block">Correo</label>
            <input type="email" id="correo" name="correo" value="{{ $capital->correo }}" class="w-full px-4 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="rol" class="block">Rol</label>
            <input type="text" id="rol" name="rol" value="{{ $capital->rol }}" class="w-full px-4 py-2 border rounded" required>
        </div>

        <div class="flex justify-center mt-6">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-700">Guardar</button>
            <a href="{{ route('capital_index') }}" class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-700 ml-4">Cancelar</a>
        </div>

        <div class="mb-4">
            <label for="cv" class="block">Currículum (PDF/Word)</label>
            <input type="file" id="cv" name="cv" class="w-full px-4 py-2 border rounded">
            @if($capital->cv)
                <a href="{{ asset('storage/' . $capital->cv) }}" target="_blank" class="text-blue-500 underline">Ver CV actual</a>
            @endif
        </div>
    
        <div class="mb-4">
            <label for="foto" class="block">Foto (JPG/PNG)</label>
            <input type="file" id="foto" name="foto" class="w-full px-4 py-2 border rounded">
            @if($capital->foto)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $capital->foto) }}" alt="Foto actual" class="h-20 w-20 rounded-full">
                </div>
            @endif
        </div>
    </form>
</div>
@endsection

