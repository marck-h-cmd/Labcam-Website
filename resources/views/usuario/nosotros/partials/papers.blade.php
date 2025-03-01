@foreach ($papers as $paper)
    <div
        class="flex flex-col md:flex-row overflow-hidden relative                                          rounded-lg shadow-xl   mt-4  mx-2  bg-[#f4f4f4] max-w-6xl py-2 h-auto">                                 
        <p class="absolute right-6 px-2 md:top-2   font-semibold bg-gray-200 p-1 text-gray-600 rounded-lg text-sm"> {{ $paper->area ? $paper->area->nombre : 'N.A' }}</p>
        <!-- información del paper -->
        <div class="max-h-96 max-w-[400px] overflow-hidden  md:w-1/2 p-4">
            <a href="{{ route('biblioteca.papers.show', $paper->id) }}"
                class=" cursor-pointer hover:underline max-md:text-center ">
                <h3 class="font-semibold text-lg mt-4 text-blue-400 text-justify ">
                    {{ $paper->titulo }}</h3>
            </a>
            <div class="mt-5">
                <p class="text-gray-600 ">Autores:</p>
                <p class="autores italic text-base mb-3">
                    {{ $paper->formatted_autores }}</p>
            </div>
            <p class="doi mt-3"><span class="text-gray-600">
                    Publisher: </span><span
                    class="doi-link  text-gray-500 text-base">{{ $paper->publisher }}</span>
            </p>
            <p class="text-base  mt-3">
                <span class="text-gray-600  ">Publicado: </span>
                <strong class="text-gray-700 uppercase font-semibold text-sm ">
                    {{ $paper->fecha_publicacion }} </strong>
            </p>
            <a href="{{ route('biblioteca.papers.show', $paper->id) }}"
                class="mt-2 flex gap-2 cursor-pointer font-bold">
                <svg width="24px" height="24px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"
                    fill="none">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path fill="#98c560" fill-rule="evenodd"
                            d="M8 3.517a1 1 0 011.62-.784l5.348 4.233a1 1 0 010 1.568l-5.347 4.233A1 1 0 018 11.983v-1.545c-.76-.043-1.484.003-2.254.218-.994.279-2.118.857-3.506 1.99a.993.993 0 01-1.129.096.962.962 0 01-.445-1.099c.415-1.5 1.425-3.141 2.808-4.412C4.69 6.114 6.244 5.241 8 5.042V3.517zm1.5 1.034v1.2a.75.75 0 01-.75.75c-1.586 0-3.066.738-4.261 1.835a8.996 8.996 0 00-1.635 2.014c.878-.552 1.695-.916 2.488-1.138 1.247-.35 2.377-.33 3.49-.207a.75.75 0 01.668.745v1.2l4.042-3.2L9.5 4.55z"
                            clip-rule="evenodd"></path>
                    </g>
                </svg>
                <p class=" text-[#98c560] text-base">Redirigir</p>
            </a>
        </div>
        <div class="w-full p-6 max-md:py-2 text-gray-800 flex flex-col justify-between  ">
          
            <p class="mt-4  text-justify text-gray-500 text-sm ">
                {{ $paper->descripcion }}
            </p>
        </div>
       
    </div>
@endforeach
