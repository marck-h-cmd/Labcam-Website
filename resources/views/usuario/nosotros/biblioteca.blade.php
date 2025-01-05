

@extends('usuario.layout.plantilla')

@section('title', 'paper')


@section('contenido')

<section>

<header class="home bg-cover mb-4 bg-center text-white" style="background-image: url('https://fondosmil.co/fondo/110721.jpg');">
  <div class="header-mask bg-[rgba(3,91,136,0.8)]">
    <div class="container mx-auto px-4">
      <div class="jumbo text-center py-40">
        <h1 class="text-6xl text-left">Biblioteca</h1>
      </div>
    </div>

    <div class="nav">
      <div class="container mx-auto px-4 flex items-center justify-between">
       

        <nav role="navigation mt-4">
          <ul class="hor--nav flex space-x-4">
            <li><a href="#" class="text-gray-300 hover:text-white">Biblioteca</a></li>
            <li><a href="#" class="text-white font-bold">Inteligencia Artificial</a></li>
            <li><a href="#" class="text-gray-300 hover:text-white">Robotica</a></li>
            <li><a href="#" class="text-gray-300 hover:text-white">Sistemas de Control</a></li>
            <li><a href="#" class="text-gray-300 hover:text-white">Estructuras</a></li>
            <li><a href="#" class="text-gray-300 hover:text-white">Química Orgánica</a></li>
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

  <div class="flex justify-start">
    <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Your Email</label>
    <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 " type="button">All categories <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
</svg></button>
    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
        <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdown-button">
        <li>
            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 ">Titulo</button>
        </li>
        <li>
            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 ">Autor</button>
        </li>
        <li>
            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 ">Fecha</button>
        </li>
        </ul>
    </div>
    <div class="relative ">
        <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Search Title..." required />
        <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  ">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
            <span class="sr-only">Search</span>
        </button>
    </div>
</div>

  <div class="flex justify-center items-start ">
   <div class="bg-gray-100 p-4 w-60 mx-6 mt-32 shadow-md rounded  max-lg:absolute h-auto">
    <ul class="space-y-2">
        <li>
            <a  class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded cursor-pointer">Inteligencia Artificial</a>
        </li>
        <li>
            <a  class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded cursor-pointer">Robotica</a>
        </li>
        <li>
             <a  class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded cursor-pointer">Sistemas de Control</a>
        </li>
        <li>
            <a class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded cursor-pointer">Estructuras</a>
        </li>
        <li>
            <a  class="bloque block w-full text-left px-4 py-2 hover:bg-gray-300 rounded cursor-pointer">Química Orgánica</a>
        </li>
    </ul>
</div>


  <div class="w-auto mx-2">

    <div class="pt-6 pb-12">  
      <div id="card" class="">
        <!-- container for all cards -->
        <div id="papers-container"class="container w-100 lg:w-4/5  mx-auto flex flex-col">
          <!-- card -->
          @foreach($papers as $paper)
          <div  class="flex flex-col md:flex-row overflow-hidden
                                             rounded-lg shadow-xl  mt-4 w-auto mx-2  bg-[#f4f4f4] max-w-6xl py-2">
            <!-- media -->
            <div class="h-64 w-72 md:w-1/2 p-4">
            <a href="{{route('papers.show',$paper->id)}}" class=" cursor-pointer">  <h3 class="font-semibold text-lg mt-4 text-blue-400">{{ $paper->titulo}}</h3> </a>
              <div class="mt-5">
                <p class="text-gray-600 ">Autores:</p>
                <p class="autores italic text-base mb-3">{{ $paper->autores }}</p>
              </div>
          
            <p class="doi text-sm mt-3"><span class="text-gray-600">
              DOI: </span><span class="doi-link underline text-gray-500 text-xs">{{ $paper->doi }}</span>
            </p>

          
              <p class="text-base  mt-4">
                <span class="text-gray-600  ">Publicado: </span>
              <strong class="text-gray-700 uppercase font-semibold text-sm ">  {{ $paper->fecha_publicacion }} </strong>
              </p>
              <a href="{{route('papers.show',$paper->id)}}" class="mt-2 flex gap-2 cursor-pointer font-bold">
                <svg width="24px" height="24px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="none"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#98c560" fill-rule="evenodd" d="M8 3.517a1 1 0 011.62-.784l5.348 4.233a1 1 0 010 1.568l-5.347 4.233A1 1 0 018 11.983v-1.545c-.76-.043-1.484.003-2.254.218-.994.279-2.118.857-3.506 1.99a.993.993 0 01-1.129.096.962.962 0 01-.445-1.099c.415-1.5 1.425-3.141 2.808-4.412C4.69 6.114 6.244 5.241 8 5.042V3.517zm1.5 1.034v1.2a.75.75 0 01-.75.75c-1.586 0-3.066.738-4.261 1.835a8.996 8.996 0 00-1.635 2.014c.878-.552 1.695-.916 2.488-1.138 1.247-.35 2.377-.33 3.49-.207a.75.75 0 01.668.745v1.2l4.042-3.2L9.5 4.55z" clip-rule="evenodd"></path></g></svg>
                <p class=" text-[#98c560] text-base">Redirigir</p>
              </a>       
            </div>
          
            <div class="w-full p-6 text-gray-800 flex flex-col justify-between  ">
            
              <p class="mt-2 text-justify text-gray-500 text-sm ">
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
        VER MÁS PUBLICACIONES
      </button>
    </div>

  </div>
  </div>
</div>

</section>

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