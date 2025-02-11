@extends('usuario.layout.plantilla')

@section('title', 'paper')


@section('contenido')

    <style>
        .nosotros-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            padding: 20px;
            background: white;
            margin-top: 150px
        }

        .main-title {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .main-title .blue-line {
            width: 80%;
        }

        .title {
            font-size: 30px;
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            color: #2e5382;
        }


        .subtitle {
            display: block;
        }

        .blue-line {
            width: 150px;
            height: 2px;
            background: #2371d4;
        }



        .sub-text {
            font-size: 24px;
            font-family: 'Inter', sans-serif;
            font-weight: 400;
            color: #30588b;
            margin-left: 20px;
        }

        .content-section {
            display: flex;
            flex-direction: column;
            gap: 20px;
            max-width: 800px;
            text-align: left;
        }

        .text-content {
            font-family: Inter, sans-serif;
            font-size: 18px;
            font-style: italic;
            font-weight: 300;
            color: black;
            word-wrap: break-word;
            margin-top: 5px;
        }

        .separator {
            width: 100%;
            height: 2px;
            background: #2371D4;
        }

        .social-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .icon-container {
            display: flex;
            gap: 10px;
        }

        .footer-text {
            text-align: center;
            font-size: 18px;
            font-weight: 700;
            color: white;
            background: #2462B2;
            padding: 10px;
        }

        .image-section {
            width:100vh;
            max-width: 800px;
            height: auto;
            color:#fff;         
        }


        #slider {
            width: 100%;
            height: 350px;
            position: relative;
            overflow: hidden;
            float: left;
            padding: 0;
            border: #666 solid 2px;
            border-radius: 5px;
        }

        .img {
            width: 100%;
            height: 350px;
            margin: 0;
            padding: 0;
        }


        .slide {
            position: absolute;
            width: 100%;
            height: 100%;
            transition: opacity 0.8s ease-in-out, transform 0.8s ease-in-out;
        }

        .description{
            margin:0;
            padding:0 35px 0 0;
        }


        .slide-copy {
            position: absolute;
            bottom: 0;
            left: 0;
            padding: 10px 20px 20px 20px;
            background: rgba(0, 0, 0, 0.5);
            background: rgba(0, 0, 0, 0.5);
            width: 100%;
            max-height: 32%;
        }

        #prev,
        #next {
            cursor: pointer;
            z-index: 100;
            background: #666;
            height: 50px;
            width: 50px;
            display: inline-block;
            position: relative;
            top: 197px;
            margin: 0;
            padding: 0;
            opacity: 0.7;
            filter: alpha(opacity=70);
        }

        #next {
            float: right;
            right: -2px;
        }

        #prev {
            float: left;
            left: 0;
        }

        .arrow-right {
            width: 0;
            height: 0;
            border-top: 15px solid transparent;
            border-bottom: 15px solid transparent;
            border-left: 15px solid #fff;
            position: relative;
            top: 20%;
            right: -40%;
        }

        .arrow-left {
            width: 0;
            height: 0;
            border-top: 15px solid transparent;
            border-bottom: 15px solid transparent;
            border-right: 15px solid #fff;
            position: relative;
            top: 20%;
            left: 30%;
        }
    </style>

    <div class="nosotros-container">

        <div class="main-title">

            <div class="title">Historia</div>
            <div class="blue-line"></div>
        </div>

        <div class="content-section">
            <p class="text-content">
                Lorem ipsum odor amet, consectetuer adipiscing elit. Felis eleifend nam convallis mus vehicula at. Ad mauris
                est parturient varius molestie condimentum eleifend sit. Parturient phasellus augue auctor conubia lacus
                netus sociosqu montes. Fusce mauris quisque nisl nisi nam per aenean. Aliquam montes euismod turpis in proin
                eleifend hac pharetra. Tempor mus curabitur interdum interdum sociosqu.
            </p>

            <div class="subtitle">

                <div class="sub-text">Subtitle 1</div>
                <div class="blue-line"></div>
            </div>

            <p class="text-content">
                Lorem ipsum odor amet, consectetuer adipiscing elit. Felis eleifend nam convallis mus vehicula at. Ad mauris
                est parturient varius molestie condimentum eleifend sit. Parturient phasellus augue auctor conubia lacus
                netus sociosqu montes. Fusce mauris quisque nisl nisi nam per aenean. Aliquam montes euismod turpis in proin
                eleifend hac pharetra.
            </p>

            <div class="subtitle">

                <div class="sub-text">Subtitle 1</div>
                <div class="blue-line"></div>
            </div>

            <p class="text-content">
                Lorem ipsum odor amet, consectetuer adipiscing elit. Felis eleifend nam convallis mus vehicula at. Ad mauris
                est parturient varius molestie condimentum eleifend sit. Parturient phasellus augue auctor conubia lacus
                netus sociosqu montes. Fusce mauris quisque nisl nisi nam per aenean. Aliquam montes euismod turpis in proin
                eleifend hac pharetra.
            </p>

            <div class="separator"></div>
        </div>

        @if (!$sliders->isEmpty())

            <div class="image-section">
                <div id="next" alt="Next" title="Next">
                    <div class="arrow-right"></div>
                </div>
                <div id="prev" alt="Prev" title="Prev">
                    <div class="arrow-left"></div>
                </div>
                <div id="slider">
                    @foreach ($sliders as $slider)
                        <div class="slide">
                            <div class="slide-copy">
                                <p class="description"  >{!! $slider->descripcion !!}</p>
                            </div>
                            <img class="img" src="{{ Storage::url('uploads/imgs/' . $slider->historia_img) }}"
                                alt="imagegen {{ $slider->id }}">
                        </div>
                    @endforeach

                </div>
            </div>
        @endif
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const speed = 500; // Velocidad de transition (ms)
            const autoswitch = true; // Activar el cambio automatico
            const autoswitchSpeed = 9000; // Intervalo de cambio slider automatico (ms)

            const slides = document.querySelectorAll(".slide");
            const nextButton = document.getElementById("next");
            const prevButton = document.getElementById("prev");
            let currentSlide = 0;

            // Inicializar slider
            function initSlider() {
                slides.forEach((slide, index) => {
                    slide.style.display = index === 0 ? "block" : "none";
                });
            }

            // Mostrar por indice
            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.style.display = i === index ? "block" : "none";
                });
            }

            // Ir al siguiente
            function nextSlide() {
                currentSlide = (currentSlide + 1) % slides.length;
                showSlide(currentSlide);
            }

            // Ir al anterior
            function prevSlide() {
                currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                showSlide(currentSlide);
            }

     
            nextButton.addEventListener("click", nextSlide);
            prevButton.addEventListener("click", prevSlide);

            // Auto slider
            if (autoswitch) {
                setInterval(nextSlide, autoswitchSpeed);
            }

            // Initializar al cargar
            initSlider();
        });
    </script>






@endsection
