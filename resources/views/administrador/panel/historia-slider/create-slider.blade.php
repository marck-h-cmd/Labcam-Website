@extends('administrador.dashboard.plantilla')

@section('title', 'Crear Slider historia')

@section('contenido')
<div class="slider-container">

    <div class="main-title flex flex-col items-center gap-3 mb-8">
        <div class="title text-2xl font-semibold text-[#2e5382]">Crear Slider de Momentos Importantes</div>
        <div class="blue-line w-1/5 h-0.5 bg-[#64d423]"></div>
      </div>
    <form class="px-40 py-10" action="{{ route('h-slider.store') }}" method="post" id="form" enctype="multipart/form-data">
        @csrf
    <div class="grid gap-6 mb-6 md:grid-cols-1 bg-slate-200 p-4 rounded-lg">
       
    <div>

        <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 ">Descripcion Momento</label>
        <textarea
        class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none "
        id="descripcion" name="descripcion" rows="5" placeholder="Message"></textarea>
      
    </div>
    <div>
        <label for="historia_img" class="block mb-2 text-sm font-medium text-gray-900">Imagen Slider</label>
        <div class="flex items-center justify-center w-full">
            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16" aria-hidden="true">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                    <p class="text-xs text-gray-500">PNG, JPG (MAX. 800x400px)</p>
                </div>
                <input id="dropzone-file" name="historia_img" type="file"  class="hidden" accept="image/png,image/jpg,image/jpeg" />
            </label>
        </div>
        <div id="info-container" class="mt-2"></div>
    </div>
    
    </div>


    <div class="flex justify-center gap-2">
        <button type="submit" class="focus:outline-none text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Guardar</button>

        <a href="{{ route('h-slider.create') }}" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 cursor-pointer ">Cancelar</a>

   

    </div>


   

    </form>

  </div>
    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Creado exitosamente!',
            text: 'Nuevo slider ha sido creado.',
            showConfirmButton: true, 
            confirmButtonText: 'Aceptar',
            customClass: {
                confirmButton: 'bg-green-500 text-white hover:bg-green-600 focus:ring-2 focus:ring-green-300 rounded-lg py-2 px-4'
            }
        });
    </script>

   @elseif (session('error'))
    <script>
    Swal.fire({
        icon: 'error',
        title: '¡Hubo un error!',
        text: 'Vuelve a intentar.',
        showConfirmButton: true, 
        confirmButtonText: 'Aceptar',
        customClass: {
            confirmButton: 'bg-red-500 text-white hover:bg-red-600 focus:ring-2 focus:ring-red-300 rounded-lg py-2 px-4'
        }
    });
    </script>
    @endif
    
@endsection

