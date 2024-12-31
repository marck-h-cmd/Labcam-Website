@extends('administrador.dashboard.plantilla')

@section('title', 'biblioteca')

@section('contenido')
<div class="paper-container">

    <div class="main-title flex flex-col items-center gap-3 mb-8">
        <div class="title text-2xl font-semibold text-[#2e5382]">Crear Papers</div>
        <div class="blue-line w-1/5 h-0.5 bg-[#64d423]"></div>
      </div>
    <form class="p-10">

    <div class="grid gap-6 mb-6 md:grid-cols-2 bg-slate-200 p-4 rounded-lg">
        <div>
            <label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 align-baseline">Titulo</label>
            <input type="text" id="titulo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Titulo del paper" required />
        </div>
        <div>
            <label for="doi" class="block mb-2 text-sm font-medium text-gray-900 ">DOI</label>
            <input type="text" id="doi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="DOI" required />
        </div>
        <div>
            <label for="autores" class="block mb-2 text-sm font-medium text-gray-900 ">Autores</label>
            <input type="text" id="autores" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="autores" required />
        </div>  
        <div>
            <label for="publisher" class="block mb-2 text-sm font-medium text-gray-900 ">Publisher</label>
            <input type="text" id="publisher" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Nombre publisher" required />
        </div>
        <div>
            <label for="fecha-publicacion" class="block mb-2 text-sm font-medium text-gray-900 ">Fecha Publicación</label>
            <input type="date" id="fecha" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="    " required />
        </div>
        <div>
            <label for="area" class="block mb-2 text-sm font-medium text-gray-900 ">Area</label>
            <input type="text" id="visitors" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Area" required />
        </div>
    <div>

        <label for="abstract" class="block mb-2 text-sm font-medium text-gray-900 ">Abstract</label>
        <textarea
        class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none "
        id="exampleFormControlTextarea13" rows="5" placeholder="Message"></textarea>
        <div class="my-6">
        <label class="block mb-2 text-sm font-medium text-gray-900 " for="file_input">Upload file</label>
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none" id="file_input" type="file">
        </div>


    </div>
    <div>
     <label for="pdf" class="block mb-2 text-sm font-medium text-gray-900 ">Archivo pdf</label>
     <div class="flex items-center justify-center w-full">
        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 ">
          <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <svg class="w-8 h-8 mb-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
            </svg>
            <p class="mb-2 text-sm text-gray-500 "><span class="font-semibold">Click to upload</span> or drag and drop</p>
            <p class="text-xs text-gray-500 "> PNG(MAX. 800x400px)</p>
         </div>
        <input id="dropzone-file" type="file" class="hidden" />
         </label>
      </div> 
    </div>

    </div>

    </div>

    <div class="flex justify-center gap-2">
        <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Publicar</button>

        <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Cancelar</button>

    </div>

    </form>

    

    
  </div>
  


@endsection