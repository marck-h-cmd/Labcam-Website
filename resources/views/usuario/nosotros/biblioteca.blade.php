

@extends('usuario.layout.plantilla')

@section('title', 'paper')


@section('contenido')

<header class="home bg-cover mb-4 bg-center text-white" style="background-image: url('https://fondosmil.co/fondo/110721.jpg');">
  <div class="header-mask bg-[rgba(3,91,136,0.8)]">
    <div class="container mx-auto px-4">
      <div class="jumbo text-center py-40">
   <!--     <div class="logo text-2xl font-sans mb-12">
          <i class="fa fa-globe"></i> <b>Some</b>Logo
        </div>  -->
        <h1 class="text-6xl text-left">Biblioteca</h1>
      </div>
    </div>

    <div class="nav">
      <div class="container mx-auto px-4 flex items-center justify-between">
       

        <nav role="navigation mt-4">
          <ul class="hor--nav flex space-x-4">
            <li><a href="#" class="text-gray-300 hover:text-white">Home</a></li>
            <li><a href="#" class="text-white font-bold">Papers</a></li>
            <li><a href="#" class="text-gray-300 hover:text-white">Robotica</a></li>
            <li><a href="#" class="text-gray-300 hover:text-white">Ciencia</a></li>
          </ul>
        </nav>

        
      </div>
    </div>
  </div>
</header>



<div class="Nosotros w-full px-5 mt-36">
     
  <div class="main-title flex flex-col items-center gap-3 mb-8">
    <div class="title text-2xl font-semibold text-[#2e5382]">Publicaciones-papers</div>
    <div class="blue-line w-1/5 h-1 bg-[#2371d4]"></div>
  </div>

  <div class="container flex justify-center items-center flex-wrap gap-5 mb-5 mx-auto">
 
    <div class="card flex flex-col w-4/5 max-w-96 bg-white shadow-lg rounded-lg">
      <div class="image h-52 bg-[#d9d9d9] rounded-t-lg"></div>
      <div class="content p-4">
        <h3 class="titulo text-lg font-medium mb-2 text-gray-500"><span class="text-gray-500">Titulo: Placeholder titulo</span></h3>
        <p class="autores italic text-base mb-3"><span class="text-gray-600">AUTORES: </span> autor 1, autor 2</p>
        <p class="descripcion text-base mb-3 text-justify">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
        </p>
        <p class="doi text-sm mb-3"><span class="text-gray-600">
          DOI: </span><span class="doi-link underline text-gray-700">10.1109/INTERCON52678.2021.9532881</span>
        </p>
      </div>
      <a href="{{ route('biblioteca.paper') }}" class="detalles text-lg text-white italic font-bold bg-[#98c560] p-4 text-center rounded-b-lg hover:bg-[#66b308] transition-all duration-400 cursor-pointer">
        Más detalles ->
      </a>
    </div>

    <div class="card flex flex-col w-4/5 max-w-96 bg-white shadow-lg rounded-lg">
      <div class="image h-52 bg-[#d9d9d9] rounded-t-lg"></div>
      <div class="content p-4">
        <h3 class="titulo text-lg font-medium mb-2"><span class="text-gray-500"> Titulo:</span></h3>
        <p class="autores italic text-base mb-3"><span class="text-gray-600">AUTORES: </span> autor 1, autor 2</p>
        <p class="descripcion text-base mb-3 text-justify">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
        </p>
        <p class="doi text-sm mb-3"> <span class="text-gray-600">
          DOI: </span><span class="doi-link underline text-gray-700">10.1109/INTERCON52678.2021.9532881</span>
        </p>
      </div>
      <a class="detalles text-lg text-white italic font-bold bg-[#98c560] p-4 text-center rounded-b-lg hover:bg-[#66b308] transition-all duration-400 cursor-pointer">
        Más detalles ->
      </a>
    </div>

 
    <div class="card flex flex-col w-4/5 max-w-96 bg-white shadow-lg rounded-lg">
      <div class="image h-52 bg-[#d9d9d9] rounded-t-lg"></div>
      <div class="content p-4">
        <h3 class="titulo text-lg font-medium mb-2"><span class="text-gray-500"> Titulo: </span></h3>
        <p class="autores italic text-base mb-3"><span class="text-gray-600">AUTORES: </span> autor 1, autor 2</p>
        <p class="descripcion text-base mb-3 text-justify">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
        </p>
        <p class="doi text-sm mb-3"> <span class="text-gray-600">
          DOI: </span><span class="doi-link underline text-gray-700">10.1109/INTERCON52678.2021.9532881</span>
        </p>
      </div>
      <a class="detalles text-lg text-white italic font-bold bg-[#98c560] p-4 text-center rounded-b-lg hover:bg-[#66b308] transition-all duration-400 cursor-pointer">
        Más detalles ->
      </a>
    </div>
  </div>

  <div class="flex justify-center mt-5 p-6 ">
      <button class="bg-[#98c560] text-white text-lg font-bold py-3 px-6 rounded-lg hover:bg-[#66b308] transition-all duration-300">
        VER PUBLICACIONES
      </button>
    </div>
  
@endsection