@extends('usuario.layout.plantilla')

@section('contenido')

<section class="pt-16 pb-2">
    <div class="text-center">
        <h2 class="text-blue-800 font-semibold text-5xl mt-20">Próximos Eventos</h2>
        <div class="w-[500px] h-[1.1px] bg-green-400 mx-auto mt-1"></div>
    </div>

     <!-- Mes, Año y Navegación -->
    <div class="flex items-center justify-center mt-6">
        <!-- Botón de mes anterior -->
        <a href="{{ route('eventos', ['month' => $month == 1 ? 12 : $month - 1, 'year' => $month == 1 ? $year - 1 : $year]) }}" class="text-gray-500 hover:text-gray-800 transition mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </a>

        <!-- Mostrar mes y año actual -->
        <span class="text-lg font-semibold text-gray-700">{{ \Carbon\Carbon::createFromDate($year, $month, 1)->format('F, Y') }}</span>

        <!-- Botón de mes siguiente -->
        <a href="{{ route('eventos', ['month' => $month == 12 ? 1 : $month + 1, 'year' => $month == 12 ? $year + 1 : $year]) }}" class="text-gray-500 hover:text-gray-800 transition ml-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </a>
    </div>

    <!-- Botones de categoría -->
    <div class="flex justify-center mt-4 space-x-4">
        <!-- Botón de categoría "Todo" -->
        <a href="{{ route('eventos', ['category' => 'todo', 'month' => $month, 'year' => $year]) }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-blue-500 hover:text-white transition">Todo</a>

        <!-- Botón de categoría "Pasados" -->
        <a href="{{ route('eventos', ['category' => 'pasado', 'month' => $month, 'year' => $year]) }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-blue-500 hover:text-white transition">Pasados</a>

        <!-- Botón de categoría "Futuros" -->
        <a href="{{ route('eventos', ['category' => 'futuro', 'month' => $month, 'year' => $year]) }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-blue-500 hover:text-white transition">Futuros</a>
    </div>


    <div class="bb ye ki xn vq jb jo">
        <div class="wc qf pn xo zf iq">
          @foreach ($eventos as $evento)
                <div class="animate_top sg vk rm xm">
                    <div class="c rc i z-1 pg">
                        <img class="w-full" src="{{ asset('storage/' . $evento->imagen) }}" alt="Blog" />

                        <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                            <a href="{{ route('eventos.show', $evento->id) }}" class="vc ek rg lk gh sl ml il gi hi">Leer más</a>
                        </div>
                    </div>

                    <div class="yh">
                        <div class="tc uf wf ag jq">
                            <div class="tc wf ag">
                                <img src="/user/template/images/icon-man.svg" alt="User" />
                                <p>{{ $evento->autor }}</p>
                            </div>
                            <div class="tc wf ag">
                                <img src="/user/template/images/icon-calender.svg" alt="Calender" />
                                <p>{{ \Carbon\Carbon::parse($evento->fecha)->format('d/m/Y') }}
                                </p>
                            </div>
                        </div>
                        <h4 class="ek tj ml il kk wm xl eq lb">
                            <a href="{{ route('eventos.show', $evento->id) }}">{{ $evento->titulo }}</a>
                        </h4>
                        <p class="text-sm text-gray-600 mt-1">
                           Categoría:
                            @if ($evento->categoria === 'pasado')
                                <span class="text-red-500 font-medium">{{ $evento->categoria }}</span>
                            @elseif ($evento->categoria === 'futuro')
                                <span class="text-green-500 font-medium">{{ $evento->categoria }}</span>
                             @endif
                        </p>
                   </div>
                </div>

          @endforeach
        </div>
    </div>
    <!-- Paginación -->
    <div class="flex justify-center mt-8">
            {{ $eventos->links() }}
     </div>
</section>


@endsection
