@extends('administrador.dashboard.plantilla')

@section('title', 'Editar Usuario')

@section('contenido')
    <div class="max-w-screen-2xl mx-auto my-8 px-4">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-[#2e5382]">Editar Usuario</h1>
            <div class="w-1/4 mx-auto h-0.5 bg-[#64d423]"></div>
        </div>

        <form action="{{ route('users.update', $users->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                    <label for="firstname" class="block">Nombre</label>
                    <input type="text" id="firstname" name="firstname" value="{{ $users->firstname }}" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                    <label for="lastname" class="block">Apellido</label>
                    <input type="text" id="lastname" name="lastname" value="{{ $users->lastname }}" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                    <label for="email" class="block">Email</label>
                    <input type="email" id="email" name="email" value="{{ $users->email }}" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                    <label for="career" class="block">Carrera</label>
                    <input type="text" id="career" name="career" value="{{ $users->career }}" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                    <label for="phone" class="block">Teléfono</label>
                    <input type="text" id="phone" name="phone" value="{{ $users->phone }}" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                    <label for="address" class="block">Dirección</label>
                    <input type="text" id="address" name="address" value="{{ $users->address }}" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                    <label for="photo" class="block">Foto (opcional)</label>
                    <input type="file" id="photo" name="photo" class="w-full px-2 py-1 border rounded">
            </div>
         
            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Actualizar
                </button>
                <a href="{{ route('users') }}" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-700">
                    Volver
                </a>
            </div>
        </form>
    </div>
@endsection