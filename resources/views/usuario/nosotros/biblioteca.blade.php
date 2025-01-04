

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
    @foreach($papers as $paper)
    <div class="card flex flex-col w-4/5 max-w-96 bg-white shadow-lg rounded-lg">
      <img class="image h-52 bg-[#d9d9d9] rounded-t-lg" src="/images/{{ $paper->img_filename }}">
      <div class="content p-4">
        <h3 class="titulo text-lg font-medium mb-2 text-gray-500"><span class="text-gray-500">Titulo: </span>{{ $paper->titulo }}</h3>
        <p class="autores italic text-base mb-3"><span class="text-gray-600">AUTORES: </span> {{ $paper->autores }}</p>
        <p class="descripcion text-base mb-3 text-justify">
          {{ $paper->descripcion }}
        </p>
        <p class="doi text-sm mb-3"><span class="text-gray-600">
          DOI: </span><span class="doi-link underline text-gray-700">10.1109/INTERCON52678.2021.9532881</span>
        </p>
      </div>
      <a href="{{ route('biblioteca.paper') }}" class="detalles text-lg text-white italic font-bold bg-[#98c560] p-4 text-center rounded-b-lg hover:bg-[#66b308] transition-all duration-400 cursor-pointer">
        Más detalles ->
      </a>
    </div>

    @endforeach

  </div>


  <div class="flex justify-center mt-5 p-6 ">
      <button class="bg-[#98c560] text-white text-lg font-bold py-3 px-6 rounded-lg hover:bg-[#66b308] transition-all duration-300">
        VER MÁS PUBLICACIONES
      </button>
    </div>

    <div class="pt-6 pb-12">  
      <div id="card" class="">
        <h2 class="text-center font-serif  uppercase text-4xl xl:text-5xl">Papers</h2>
        <!-- container for all cards -->
        <div id="papers-container"class="container w-100  lg:w-4/6 mx-auto flex flex-col">
          <!-- card -->
          @foreach($papers as $paper)
          <div  class="flex flex-col md:flex-row overflow-hidden
                                             rounded-lg shadow-xl  mt-4 w-100 mx-2 bg-gray-100">
            <!-- media -->
            <div class="h-64 w-72 md:w-1/2 p-4">
            <a href="{{route('papers.show',$paper->id)}}" class=" cursor-pointer">  <h3 class="font-semibold text-lg mt-4 text-blue-400">{{ $paper->titulo}}</h3> </a>
              <div class="mt-5">
                <p class="text-gray-600 ">Autores:</p>
                <p class="autores italic text-base mb-3">{{ $paper->autores }}</p>
              </div>
          
            <p class="doi text-sm mt-3"><span class="text-gray-600">
              DOI: </span><span class="doi-link underline text-gray-500">10.1109/INTERCON52678.2021.9532881</span>
            </p>

          
              <p class="text-base  mt-4">
                <span class="text-gray-600  ">Publicado: </span>
              <strong class="text-gray-700 uppercase font-semibold text-sm ">  {{ $paper->fecha_publicacion }} </strong>
              </p>

            
            </div>
          
            <div class="w-full py-8 px-6 text-gray-800 flex flex-col justify-between">
            
              <p class="mt-2  text-justify text-gray-500 text-sm">
                {{ $paper->descripcion}}
              </p>
             
            </div>

          </div>

          @endforeach
        </div>
      </div>
    </div>

    <div class="flex justify-center mt-5 p-6 ">
      <button id="load-more" class="bg-[#98c560] text-white text-lg font-bold py-3 px-6 rounded-lg hover:bg-[#66b308] transition-all duration-300">
        VER {{ $displayCount}} MÁS PUBLICACIONES
      </button>
    </div>


    <script>
      document.addEventListener('DOMContentLoaded', function () {
          let offset = {{ $papers->count() }};
          console.log(offset)
          const limit = 3;

          const button =  document.getElementById('load-more');
  
           button.addEventListener('click', function () {
              fetch(`/nosotros/biblioteca/fetch-more?offset=${offset}&limit=${limit}`)
                  .then(response => response.json())
                  .then(data => {
                    const { papers, total, remaining } = data;

                     if (papers.length >0) {
                          const container = document.getElementById('papers-container');
                          papers.forEach(paper => {
                              const card = `
                                  <div class="flex flex-col md:flex-row overflow-hidden rounded-lg shadow-xl mt-4 w-100 mx-2 bg-gray-100">
                                      <div class="h-64 w-72 md:w-1/2 p-4">
                                          <a class="cursor-pointer">
                                              <h3 class="font-semibold text-lg mt-4 text-blue-400">${paper.titulo}</h3>
                                          </a>
                                          <div class="mt-5">
                                              <p class="text-gray-600">Autores:</p>
                                              <p class="autores italic text-base mb-3">${paper.autores}</p>
                                          </div>
                                          <p class="doi text-sm mt-3">
                                              <span class="text-gray-600">DOI: </span>
                                              <span class="doi-link underline text-gray-500">10.1109/INTERCON52678.2021.9532881</span>
                                          </p>
                                          <p class="text-base mt-4">
                                              <span class="text-gray-600">Publicado: </span>
                                              <strong class="text-gray-700 uppercase font-semibold text-sm">${paper.fecha_publicacion}</strong>
                                          </p>
                                      </div>
                                      <div class="w-full py-8 px-6 text-gray-800 flex flex-col justify-between">
                                          <p class="mt-2 text-justify text-gray-500 text-sm">${paper.descripcion}</p>
                                      </div>
                                  </div>`;
                              container.insertAdjacentHTML('beforeend', card);
                          });
  
                     
                          offset += papers.length;
                          if(remaining > 0){
                            button.textContent = ` VER ${remaining} MÁS PUBLICACIONES`;

                          } else{
                         button.style.display = 'none';
                         }
                      
                        } else{
                          button.style.display = 'none';
                         }
                        
                      
                  })
                  .catch(error => console.error('Error fetching data:', error));
          });
      });
  </script>
  
  
@endsection