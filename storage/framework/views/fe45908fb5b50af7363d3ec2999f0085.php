<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-cover bg-center" 
      style="background-image: url('<?php echo e(asset('images/laboratorio-mecanica.png')); ?>');">

    <?php if(session('success')): ?>
                    <div class="mb-8 p-6 bg-white border border-green-400 font-bold text-black-900 rounded-lg text-center shadow-md">
                        <p><?php echo e(session('success')); ?></p>
                        <div class="mt-7 flex justify-center" >
                            <a href="<?php echo e(route('login')); ?>" class="bg-green-500 text-white px-5 py-2 rounded-lg text-lg font-semibold hover:bg-green-600 transition duration-300 flex items-center justify-center">
                                Iniciar sesión
                            </a>
                        </div>
                    </div>
    <?php else: ?>

    <div class="max-w-md w-full space-y-8">
        <div class="bg-white shadow rounded-lg">

            <h3 class="text-2xl font-bold text-center py-4 bg-gray-50 border-b">Registro de Usuario</h3>
            <div class="px-8 py-6">
                
                    <form action="<?php echo e(route('register.custom')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="mb-4">
                            <input type="text" placeholder="Nombre" id="firstname" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                name="firstname" required autofocus>
                            <?php if($errors->has('firstname')): ?>
                            <span class="text-red-500 text-sm"><?php echo e($errors->first('firstname')); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <input type="text" placeholder="Apellido" id="lastname" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                name="lastname" required>
                            <?php if($errors->has('lastname')): ?>
                            <span class="text-red-500 text-sm"><?php echo e($errors->first('lastname')); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <input type="text" placeholder="Número de Teléfono" id="phone" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                name="phone" required>
                            <?php if($errors->has('phone')): ?>
                            <span class="text-red-500 text-sm"><?php echo e($errors->first('phone')); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <input type="text" placeholder="Dirección" id="address" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                name="address" required>
                            <?php if($errors->has('address')): ?>
                            <span class="text-red-500 text-sm"><?php echo e($errors->first('address')); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <input type="text" placeholder="Carrera" id="career" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                name="career" required>
                            <?php if($errors->has('career')): ?>
                            <span class="text-red-500 text-sm"><?php echo e($errors->first('career')); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <input type="text" placeholder="Email" id="email_address"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                name="email" required>
                            <?php if($errors->has('email')): ?>
                            <span class="text-red-500 text-sm"><?php echo e($errors->first('email')); ?></span>
                            <?php endif; ?>
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
                            <?php if($errors->has('password')): ?>
                            <span class="text-red-500 text-sm">La contraseña debe tener al menos 6 caracteres, una letra mayúscula y una letra minúscula.</span>
                            <?php endif; ?>
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
    <?php endif; ?>
</body>
</html>
<?php /**PATH D:\CURSOS EXTRA ACADEMICOS\PAGINA LABCAM\PROYECTO\Labcam-Website\resources\views/usuario/auth/registration.blade.php ENDPATH**/ ?>