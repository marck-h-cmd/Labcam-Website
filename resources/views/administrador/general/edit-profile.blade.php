@extends('administrador.dashboard.plantilla')

@section('title', 'Ficha de Datos Personales')

@section('contenido')
    <div class="flex flex-col md:flex-row gap-6 p-6 bg-gray-100 min-h-screen">
      
        <div class="w-full md:w-1/3 bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Administrador</h2>
            <div class="space-y-4">
                <div>
                    <h3 class="text-sm text-gray-600 font-medium">FOTO</h3>
                    <p class="text-gray-800">{{ Auth::user()->photo}}</p>
                    <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Foto de perfil" class="w-16 h-16 rounded-full object-cover">
                </div>
                <div>
                    <h3 class="text-sm text-gray-600 font-medium">NOMBRES Y APELLIDOS</h3>
                    <p class="text-gray-800">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</p>
                </div>
                <div>
                    <h3 class="text-sm text-gray-600 font-medium">CORREO</h3>
                    <p class="text-gray-800">{{ Auth::user()->email }}</p>
                </div>
                <div>
                    <h3 class="text-sm text-gray-600 font-medium">CARRERA</h3>
                    <p class="text-gray-800">{{ Auth::user()->career }}</p>
                </div>
                <div>
                    <h3 class="text-sm text-gray-600 font-medium">CONTACTO</h3>
                    <p class="text-gray-800">{{ Auth::user()->phone }}</p>
                </div>
                <div>
                    <h3 class="text-sm text-gray-600 font-medium">DIRECCIÓN</h3>
                    <p class="text-gray-800">{{ Auth::user()->address }}</p>
                </div>
            </div>
            <p class="text-sm text-gray-500 mt-4">Datos personales del Administrador</p>
        </div>

      
        <div class="w-full md:w-2/3 bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Ficha de Datos Personales</h2>
        
            <div class="border-b border-gray-300 mb-6">
                <nav class="flex space-x-4" aria-label="Tabs">
                    <button class="tab px-3 py-2 text-sm font-medium text-indigo-600 border-b-2 border-indigo-600" data-tab="datos">
                        Datos del Administrador
                    </button>
                    <button class="tab px-3 py-2 text-sm font-medium text-gray-500 hover:text-indigo-600 hover:border-indigo-600" data-tab="foto">
                        Foto
                    </button>
                    <button class="tab px-3 py-2 text-sm font-medium text-gray-500 hover:text-indigo-600 hover:border-indigo-600" data-tab="configuracion">
                        Configuración
                    </button>
                </nav>
            </div>

         
            <div id="datos" class="tab-content">
                <form action="{{ route('user.update', Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="firstname" class="block text-sm font-medium text-gray-700">Nombres</label>
                            <input type="text" id="firstname" name="firstname" value="{{ old('firstname', Auth::user()->firstname) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="lastname" class="block text-sm font-medium text-gray-700">Apellidos</label>
                            <input type="text" id="lastname" name="lastname" value="{{ old('lastname', Auth::user()->lastname) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                            <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Teléfono</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone', Auth::user()->phone) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Dirección</label>
                            <input type="text" id="address" name="address" value="{{ old('address', Auth::user()->address) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="career" class="block text-sm font-medium text-gray-700">Carrera</label>
                            <input type="text" id="career" name="career" value="{{ old('career', Auth::user()->career) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-700">
                            Actualizar
                        </button>
                    </div>
                </form>
            </div>

            <div id="foto" class="tab-content hidden">
                <h3 class="text-lg font-medium text-gray-800">Foto</h3>
                <form action="{{ route('user.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mt-4 flex items-center space-x-4">
                        <!-- Si el usuario tiene una foto, mostrarla -->
                        @if(Auth::user()->photo)
                             <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Foto de perfil" class="w-16 h-16 rounded-full object-cover">
                        @endif

                        <!-- Campo para subir una nueva imagen -->
                        <input type="file" id="photo" name="photo"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100">
                    </div>
                    <div class="flex justify-end mt-6 space-x-4">
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-700">
                            Guardar Foto
                        </button>
                        <a href="{{ url()->previous() }}" 
                            class="bg-gray-500 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-600">
                                Cancelar
                        </a>
                    </div>
                </form>

            </div>

            <div id="configuracion" class="tab-content hidden">
                <h3 class="text-lg font-medium text-gray-800">Configuración</h3>
                <form action="{{ route('user.update', Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mt-2">Nueva Contraseña</label>
                        <input type="password" id="password" name="password"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Repita Contraseña</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <div class="flex justify-end mt-6 space-x-4">
                         <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-700">
                            Guardar Contraseña
                        </button>
                        <a href="{{ url()->previous() }}"
                            class="bg-gray-500 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-600">
                               Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        
        document.querySelectorAll('.tab').forEach(button => {
            button.addEventListener('click', () => {
                const tab = button.dataset.tab;

                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.add('hidden');
                });

                document.querySelector(`#${tab}`).classList.remove('hidden');

                document.querySelectorAll('.tab').forEach(tab => {
                    tab.classList.remove('text-indigo-600', 'border-indigo-600');
                    tab.classList.add('text-gray-500');
                });

                button.classList.add('text-indigo-600', 'border-indigo-600');
                button.classList.remove('text-gray-500');
            });
        });
    </script>
@endsection
