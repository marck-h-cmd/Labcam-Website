@extends('usuario.layout.plantilla')


@section('contenido')
<main class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="bg-white shadow rounded-lg">
            <h3 class="text-2xl font-bold text-center py-4 bg-gray-50 border-b">Registro de Usuario</h3>
            <div class="px-8 py-6">
                <form action="{{ route('register.custom') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <input type="text" placeholder="Nombre" id="firstname " 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            name="firstname" required autofocus>
                        @if ($errors->has('firstname'))
                        <span class="text-red-500 text-sm">{{ $errors->first('firstname') }}</span>
                        @endif
                    </div>

                    <div class="mb-4">
                        <input type="text" placeholder="Apellido" id="lastname" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            name="lastname" required autofocus>
                        @if ($errors->has('lastname'))
                        <span class="text-red-500 text-sm">{{ $errors->first('lastname') }}</span>
                        @endif
                    </div>

                    <div class="mb-4">
                        <input type="text" placeholder="Número de Teléfono" id="phone" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            name="phone" required autofocus>
                        @if ($errors->has('phone'))
                        <span class="text-red-500 text-sm">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>

                    <div class="mb-4">
                        <input type="text" placeholder="Dirección" id="address" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            name="address" required autofocus>
                        @if ($errors->has('address'))
                        <span class="text-red-500 text-sm">{{ $errors->first('address') }}</span>
                        @endif
                    </div>

                    <div class="mb-4">
                        <input type="text" placeholder="Carrera" id="career" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            name="career" required autofocus>
                        @if ($errors->has('career'))
                        <span class="text-red-500 text-sm">{{ $errors->first('career') }}</span>
                        @endif
                    </div>

                    <div class="mb-4">
                        <input type="text" placeholder="Email" id="email_address"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            name="email" required autofocus>
                        @if ($errors->has('email'))
                        <span class="text-red-500 text-sm">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="mb-4">
                        <div class="relative">
                            <input type="password" placeholder="Contraseña" id="password"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                name="password" required>
                            <div class="flex items-center mt-2">
                                <input type="checkbox" onclick="myFunction()" class="w-4 h-4 text-blue-500 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500">
                                <label class="ml-2 text-sm text-gray-600">Mostrar Contraseña</label>
                            </div>
                        </div>
                        @if ($errors->has('password'))
                        <span class="text-red-500 text-sm">La contraseña debe tener al menos 6 caracteres, una letra mayúscula y una letra minúscula.</span>
                        @endif
                        <script>
                            function myFunction() {
                                var x = document.getElementById("password");
                                if (x.type === "password") {
                                    x.type = "text";
                                } else {
                                    x.type = "password";
                                }
                            }
                        </script>
                    </div>

                    <div>
                        <button type="submit" class="w-full bg-gray-900 text-white py-2 px-4 rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                            Registrarse
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
