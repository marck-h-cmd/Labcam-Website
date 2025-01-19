@extends('usuario.layout.plantilla')

@section('contenido')

<section class="pt-16 pb-2">
    <div class="text-center">
        <h2 class="text-blue-800 font-semibold text-5xl mt-20">Noticias</h2>
        <div class="w-72 h-[1.1px] bg-green-400 mx-auto mt-1"></div>
    </div>

    <div class="bb ye ki xn vq jb jo">
        <div class="wc qf pn xo zf iq">
          @foreach ($noticias as $noticia)
            <div class="animate_top sg vk rm xm">
                    <div class="c rc i z-1 pg">
                        <img class="w-full" src="{{ asset('storage/' . $noticia->imagen) }}" alt="Blog" />

                        <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                            <a href="{{ route('noticias.show', $noticia->id) }}" class="vc ek rg lk gh sl ml il gi hi">Leer más</a>
                        </div>
                    </div>

                    <div class="yh">
                        <div class="tc uf wf ag jq">
                            <div class="tc wf ag">
                                <img src="/user/template/images/icon-man.svg" alt="User" />
                                <p>{{ $noticia->autor }}</p>
                            </div>
                            <div class="tc wf ag">
                                <img src="/user/template/images/icon-calender.svg" alt="Calender" />
                                <p>{{ \Carbon\Carbon::parse($noticia->fecha)->format('d/m/Y') }}</p>
                            </div>
                        </div>
                        <h4 class="ek tj ml il kk wm xl eq lb">
                            <a href="{{ route('noticias.show', $noticia->id) }}">{{ $noticia->titulo }}</a>
                        </h4>
                    </div>
            </div>
          @endforeach
        </div>

         <!-- Paginación -->
         <div class="flex justify-center mt-8">
            {{ $noticias->links() }}
        </div>
    </div>
</section>


@endsection
