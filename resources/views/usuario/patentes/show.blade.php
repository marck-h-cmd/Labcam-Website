@extends('usuario.layout.plantilla')

@section('title', 'biblioteca')

@section('contenido')

    <style>
        .nosotros {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: white;
            padding: 20px;
            margin-top: 120px;
            font-family: "Garamond", "Times New Roman", serif;
        }


        .header {
            display: block;
            width: 100%;
            margin: 20px 0;
            max-width: 1000px;
            font-family: "Lato", "Helvetica", sans-serif;
        }


        .header-content {
            display: flex;
            gap: 10px;
            justify-content: space-between;
            margin: 15px;

        }

        .title {
            /* display: flex;
          flex-direction: column;  */
            display: block;
            text-align: center;
            align-items: center;
            margin-bottom: 10px;
        }

        .title-line {
            width: 100%;
            height: 2px;
            background-color: #2078bf;
            display: flex;
            justify-content: center;
        }

        .patente-title {
            font-size: 30px;
            color: #2e5382;
            margin: 10px 0;
            font-family: "Georgia", serif;
        }

        .additional-info p {
            font-size: 14px;
            font-weight: 500;
            margin: 5px 0;
        }

        .header-image {
            border-radius: 10px;
        }

        .abstract-container {
            text-align: left;
            margin: 20px 0;
            padding: 20px;
            border-radius: 10px;
            width: 90%;
            font-family: "Times New Roman", serif;
            color: #4d4d4d;
            max-width: 1000px;
            background-color: rgb(249, 245, 245, 0.7);
            position: relative;
        }

        .abstract-container p {
            margin: 15px 10px 5px 5px;
        }

        .abstract-container strong {
            color: #2e5382;
            font-family: "Garamond", "Times New Roman", serif;
        }

        .abstract-text {
            font-style: italic;
            font-weight: 200;
            margin: 10px 0;
            color: rgb(119, 119, 119);

        }

        .action-buttons {
            display: flex;
            gap: 10px;
            margin: 20px 0;
            justify-content: flex-end;

        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 18px;
            cursor: pointer;
            font-family: "Arial", sans-serif;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .btn-cita {
            background-color: #98c560;
        }

        .btn-pdf {
            background-color: #98c560;
        }

        .pdf-frame {
            width: 100%;
            max-width: 1000px;
            margin: 20px 0;
            height: 800px;
        }

        .header-image {
            width: 401px;
            height: 252px;
        }

        .cards {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            width: 90%;
            max-width: 1000px;
            margin-top: 20px;
        }

        .cards h3 {
            color: #0e72c4;
            font-size: 20px;
            margin: 5px 20px;
        }

        .card-item {
            text-align: left;
            flex: 1;
            padding: 20px 30px;
            background-color: #f8f8f8;
            border: 1px solid #2e5382;
            ;
            cursor: pointer;
            font-family: "Lato", "Helvetica", sans-serif;
            transition: all 0.3s ease-in-out;
            border-radius: 10px;
            position: relative;
        }

        .card-item.r {
            text-align: right;
        }

        .card-item svg {
            position: absolute;
            top: 45%;
            color: #2e5382;
        }

        .card-item.l svg {
            right: 5px;
        }

        .card-item.r svg {
            left: 5px;
        }

        .card-item.l {
            text-align: left;
        }

        .card-item:hover {
            background-color: #ebebeb;
            color: #1b79c7;
            border:#1b79c7 solid 0.5px;
        }


        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
            }

            .cards h3 {
                font-size: 14px;
            }

            .card-item {
                font-size: 11px;
                padding: 16px 8px;
            }
            .card-item p{
              display: none;

            }

            .pdf-frame {
                max-width: 500px;
            }

            .patente-title {
                font-size: 20px;
            }

            .header-content {
                font-size: 12px;
            }

            .abstract-container {
                font-size: 14px;
            }

            .cards {
                gap: 10px;
                flex-direction: column;

            }

            .card-item svg {
                width: 14px;
                height: 14px;
            }


        }

        .doi {
            margin-top: 20px;
        }

        .doi p {
            font-size: 14px;
        }

        .doi a {
            font-size: 14px;
            color: rgb(25, 130, 216);
            text-decoration: underline;

        }

        /*  icons */

        .social-links-container {
            align-items: flex-end;
            display: flex;
            margin: 5px;

        }

        .social-link {
            background-color: rgba(20, 168, 212, 0);
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            height: 50px;
            width: 50px;
        }

        .social-link:first-child {
            padding: 12px;
        }

        .social-link:hover {
            transform: scale(1.1);
            transition: all 0.5s;
        }

        .social-link:hover .social-icon path {
            color: rgb(7, 121, 173);
            background: rgb(12, 32, 207);
            fill: rgb(31, 194, 172);
            transition: all 0.5s;
        }

        /*  Shape  */
        .ribbon {
            background-color: #98c560;
            padding-left: 45px;
            height: 45px;
            line-height: 45px;
            width: 150px;
            margin: 15px 0;
            color: #fff;
            position: relative;
            left: 0;
        }

        .ribbon:after {
            content: "";
            height: 0;
            width: 0;
            border-left: 22.5px solid #98c560;
            border-top: 22.5px dashed transparent;
            border-bottom: 22.5px dashed transparent;
            position: absolute;
            top: 0;
            left: 100%;
        }

        .ribbon:before {
            content: "";
            height: 0;
            width: 0;
            border-left: 22.5px solid rgb(255, 245, 245);
            border-top: 22.5px dashed transparent;
            border-bottom: 22.5px dashed transparent;
            position: absolute;
            top: 0;
            left: 0;
        }

        .sharebtn {
            /* @apply relative flex z-10 bg-white border rounded-md p-2 opacity-50 hover:opacity-100 focus:outline-none focus:border-blue-400; */
        }

        .sharebtn:hover+.sharebtn-dropdown,
        .sharebtn:focus+.sharebtn-dropdown {
            display: block;
        }

        .sharebtn-dropdown {
            /* @apply absolute right-0 mt-0 w-48 bg-white rounded-sm overflow-hidden shadow-lg z-20 hidden border border-gray-100; */
        }
    </style>


    <div class="nosotros">

        <div class="header">
            <div class="title">
                <h1 class="patente-title">{{ $patente->titulo }}</h1>
                <div class="title-line"></div>
            </div>

            <div class="header-content">

                <div class="additional-info">
                    <p><strong>Autor publicación: </strong>{{ $patente->formatted_autores }}</p>
                    <p><strong>Fecha: </strong> {{ $patente->fecha_publicacion }}</p>
                </div>
                <div class="social-links-container">

                    <div class="relative ml-2">
                        <button type="button"
                            class="sharebtn relative flex z-10 bg-white border rounded-md p-2 opacity-70 hover:opacity-100 focus:outline-none focus:border-blue-400"
                            title="click to enable menu">
                            <span class="inline-block pr-4 text-gray-600 max-md:hidden">Share</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="h-5 w-6 my-1 text-blue-700">
                                <path fill="currentColor"
                                    d="M352 320c-22.608 0-43.387 7.819-59.79 20.895l-102.486-64.054a96.551 96.551 0 0 0 0-41.683l102.486-64.054C308.613 184.181 329.392 192 352 192c53.019 0 96-42.981 96-96S405.019 0 352 0s-96 42.981-96 96c0 7.158.79 14.13 2.276 20.841L155.79 180.895C139.387 167.819 118.608 160 96 160c-53.019 0-96 42.981-96 96s42.981 96 96 96c22.608 0 43.387-7.819 59.79-20.895l102.486 64.054A96.301 96.301 0 0 0 256 416c0 53.019 42.981 96 96 96s96-42.981 96-96-42.981-96-96-96z">
                                </path>
                            </svg>
                        </button>
                        <div
                            class="sharebtn-dropdown absolute left-0 mt-0 w-48 bg-white rounded-sm overflow-hidden shadow-lg z-20 hidden border border-gray-100">
                            <a href="#" title="Share on Facebook "
                                class="flex px-4 py-2 text-sm text-gray-800 border-b hover:bg-blue-100">
                                <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-messenger"
                                    class="w-5 h-5 mr-4 text-blue-500" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                        d="M256.55 8C116.52 8 8 110.34 8 248.57c0 72.3 29.71 134.78 78.07 177.94 8.35 7.51 6.63 11.86 8.05 58.23A19.92 19.92 0 0 0 122 502.31c52.91-23.3 53.59-25.14 62.56-22.7C337.85 521.8 504 423.7 504 248.57 504 110.34 396.59 8 256.55 8zm149.24 185.13l-73 115.57a37.37 37.37 0 0 1-53.91 9.93l-58.08-43.47a15 15 0 0 0-18 0l-78.37 59.44c-10.46 7.93-24.16-4.6-17.11-15.67l73-115.57a37.36 37.36 0 0 1 53.91-9.93l58.06 43.46a15 15 0 0 0 18 0l78.41-59.38c10.44-7.98 24.14 4.54 17.09 15.62z">
                                    </path>
                                </svg>
                                <span class="text-gray-600">Facebook</span>
                            </a>
                            <a href="#" title="Share on LinkedIn"
                                class="flex px-4 py-2 text-sm text-gray-800 border-b hover:bg-blue-100">
                                <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin"
                                    class="w-5 h-5 mr-4 text-blue-500" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512">
                                    <path fill="currentColor"
                                        d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z">
                                    </path>
                                </svg>
                                <span class="text-gray-600">LinkedIn</span>
                            </a>
                        </div>
                    </div>
                    <a href="#" target="_blank" class="social-link">
                        <svg class="social-icon" viewBox="0 0 30 30">
                            <path d="M16.108,8.215c-1.4,0-2.539,1.139-2.539,2.538v3.22h-1.715c-0.276,0-0.5,0.224-0.5,0.5s0.224,0.5,0.5,0.5h1.715v6.312
                      c0,0.276,0.224,0.5,0.5,0.5s0.5-0.224,0.5-0.5v-6.312h2.425c0.276,0,0.5-0.224,0.5-0.5s-0.224-0.5-0.5-0.5h-2.425v-3.22
                      c0-0.848,0.69-1.538,1.539-1.538c0.848,0,1.539,0.69,1.539,1.538c0,0.276,0.224,0.5,0.5,0.5s0.5-0.224,0.5-0.5
                      C18.646,9.353,17.508,8.215,16.108,8.215z">

                            </path>

                        </svg>

                    </a>

                    <a href="#" target="_blank" class="social-link">
                        <svg class="social-icon" viewBox="0 0 30 30">
                            <path
                                d="M21.2,22.7H8.8c-0.8,0-1.5-0.7-1.5-1.5V8.8C7.3,8,8,7.3,8.8,7.3h12.4c0.8,0,1.5,0.7,1.5,1.5v12.4C22.7,22,22,22.7,21.2,22.7
                            z M8.8,8.2c-0.3,0-0.6,0.3-0.6,0.6v12.4c0,0.3,0.3,0.6,0.6,0.6h12.4c0.3,0,0.6-0.3,0.6-0.6V8.8c0-0.3-0.3-0.6-0.6-0.6H8.8z">
                            </path>
                            <path d="M12,20.7H9.9c-0.2,0-0.4-0.2-0.4-0.4v-6.9c0-0.2,0.2-0.4,0.4-0.4H12c0.2,0,0.4,0.2,0.4,0.4v6.9C12.5,20.5,12.3,20.7,12,20.7
                            z M10.3,19.8h1.3v-6h-1.3V19.8z"></path>
                            <path
                                d="M11,12.4c-0.8,0-1.5-0.7-1.5-1.5c0-0.8,0.7-1.5,1.5-1.5s1.5,0.7,1.5,1.5C12.5,11.7,11.8,12.4,11,12.4z M11,10.2
                            c-0.4,0-0.6,0.3-0.6,0.6c0,0.4,0.3,0.6,0.6,0.6c0.4,0,0.6-0.3,0.6-0.6C11.6,10.5,11.3,10.2,11,10.2z">
                            </path>
                            <path d="M20.1,20.7H18c-0.2,0-0.4-0.2-0.4-0.4v-3.4c0-1.1-0.1-1.4-0.7-1.4c-0.6,0-0.8,0.2-0.8,1.3v3.4c0,0.2-0.2,0.4-0.4,0.4h-2.2
                            c-0.2,0-0.4-0.2-0.4-0.4v-6.9c0-0.2,0.2-0.4,0.4-0.4h2.1c0.2,0,0.4,0.1,0.4,0.3c0.4-0.3,1-0.5,1.6-0.5c2.7,0,3,2,3,3.7v3.8
                            C20.6,20.5,20.4,20.7,20.1,20.7z M18.4,19.8h1.3l0-3.4c0-2.1-0.6-2.9-2.1-2.9c-0.9,0-1.4,0.5-1.6,0.9c-0.1,0.1-0.2,0.2-0.4,0.2
                            c-0.2,0-0.5-0.2-0.5-0.4v-0.5h-1.2v6h1.3v-3c0-0.5,0-2.2,1.7-2.2c1.6,0,1.6,1.5,1.6,2.3V19.8z">
                            </path>
                        </svg>
                    </a>
                </div>

            </div>

        </div>

        <img class="header-image" src="{{ Storage::url('uploads/paper_img/' . $patente->img_filename) }}"
            alt="Header Image" />

        <!-- CONTENEDOR patente INFORMACIÓN --->
        <div class="abstract-container">

            <div class="ribbon">
                <h3>Abstract:</h3>
            </div>
            <p class="abstract-text">
                {{ $patente->descripcion }}
            </p>
            <p><strong>Autores: </strong><span class=" ml-2"> {{ $patente->formatted_autores }} </span></p>
            <p><strong>Área: </strong><span class=" ml-2"> {{ $patente->area ? $patente->area->nombre : 'No hay área asociada' }} </span></p>
            <p><strong>Fecha Publicación: </strong><span class=" ml-2">{{ $patente->fecha_publicacion }}</span></p>
            <div class="doi">
                <p><strong>DOI: </strong> <a class=" ml-2" href="{{ $patente->doi }}"
                        target="_blank">{{ $patente->doi }}</a></p>
            </div>
            <a href="{{ route('biblioteca.patentes.download.pdf', ['pdf_fileName' => $patente->pdf_filename]) }}"
                class="text-white absolute bottom-4 right-6 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-400 font-medium rounded-lg text-sm p-1.5 text-center inline-flex items-center me-2 ">
                <svg class="w-8 h-8" viewBox="-4 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M25.6686 26.0962C25.1812 26.2401 24.4656 26.2563 23.6984 26.145C22.875 26.0256 22.0351 25.7739 21.2096 25.403C22.6817 25.1888 23.8237 25.2548 24.8005 25.6009C25.0319 25.6829 25.412 25.9021 25.6686 26.0962ZM17.4552 24.7459C17.3953 24.7622 17.3363 24.7776 17.2776 24.7939C16.8815 24.9017 16.4961 25.0069 16.1247 25.1005L15.6239 25.2275C14.6165 25.4824 13.5865 25.7428 12.5692 26.0529C12.9558 25.1206 13.315 24.178 13.6667 23.2564C13.9271 22.5742 14.193 21.8773 14.468 21.1894C14.6075 21.4198 14.7531 21.6503 14.9046 21.8814C15.5948 22.9326 16.4624 23.9045 17.4552 24.7459ZM14.8927 14.2326C14.958 15.383 14.7098 16.4897 14.3457 17.5514C13.8972 16.2386 13.6882 14.7889 14.2489 13.6185C14.3927 13.3185 14.5105 13.1581 14.5869 13.0744C14.7049 13.2566 14.8601 13.6642 14.8927 14.2326ZM9.63347 28.8054C9.38148 29.2562 9.12426 29.6782 8.86063 30.0767C8.22442 31.0355 7.18393 32.0621 6.64941 32.0621C6.59681 32.0621 6.53316 32.0536 6.44015 31.9554C6.38028 31.8926 6.37069 31.8476 6.37359 31.7862C6.39161 31.4337 6.85867 30.8059 7.53527 30.2238C8.14939 29.6957 8.84352 29.2262 9.63347 28.8054ZM27.3706 26.1461C27.2889 24.9719 25.3123 24.2186 25.2928 24.2116C24.5287 23.9407 23.6986 23.8091 22.7552 23.8091C21.7453 23.8091 20.6565 23.9552 19.2582 24.2819C18.014 23.3999 16.9392 22.2957 16.1362 21.0733C15.7816 20.5332 15.4628 19.9941 15.1849 19.4675C15.8633 17.8454 16.4742 16.1013 16.3632 14.1479C16.2737 12.5816 15.5674 11.5295 14.6069 11.5295C13.948 11.5295 13.3807 12.0175 12.9194 12.9813C12.0965 14.6987 12.3128 16.8962 13.562 19.5184C13.1121 20.5751 12.6941 21.6706 12.2895 22.7311C11.7861 24.0498 11.2674 25.4103 10.6828 26.7045C9.04334 27.3532 7.69648 28.1399 6.57402 29.1057C5.8387 29.7373 4.95223 30.7028 4.90163 31.7107C4.87693 32.1854 5.03969 32.6207 5.37044 32.9695C5.72183 33.3398 6.16329 33.5348 6.6487 33.5354C8.25189 33.5354 9.79489 31.3327 10.0876 30.8909C10.6767 30.0029 11.2281 29.0124 11.7684 27.8699C13.1292 27.3781 14.5794 27.011 15.985 26.6562L16.4884 26.5283C16.8668 26.4321 17.2601 26.3257 17.6635 26.2153C18.0904 26.0999 18.5296 25.9802 18.976 25.8665C20.4193 26.7844 21.9714 27.3831 23.4851 27.6028C24.7601 27.7883 25.8924 27.6807 26.6589 27.2811C27.3486 26.9219 27.3866 26.3676 27.3706 26.1461ZM30.4755 36.2428C30.4755 38.3932 28.5802 38.5258 28.1978 38.5301H3.74486C1.60224 38.5301 1.47322 36.6218 1.46913 36.2428L1.46884 3.75642C1.46884 1.6039 3.36763 1.4734 3.74457 1.46908H20.263L20.2718 1.4778V7.92396C20.2718 9.21763 21.0539 11.6669 24.0158 11.6669H30.4203L30.4753 11.7218L30.4755 36.2428ZM28.9572 10.1976H24.0169C21.8749 10.1976 21.7453 8.29969 21.7424 7.92417V2.95307L28.9572 10.1976ZM31.9447 36.2428V11.1157L21.7424 0.871022V0.823357H21.6936L20.8742 0H3.74491C2.44954 0 0 0.785336 0 3.75711V36.2435C0 37.5427 0.782956 40 3.74491 40H28.2001C29.4952 39.9997 31.9447 39.2143 31.9447 36.2428Z"
                            fill="#ffffff"></path>
                    </g>
                </svg>
                <span class="sr-only">Download pdf</span>
            </a>
        </div>


        <!-- PDF FRAME --->
        <iframe class="pdf-frame" src="{{ Storage::url('uploads/pdf/' . $patente->pdf_filename) }}" alt="PDF" >
        </iframe>

        @if ($previousPatente || $nextPatente)
            <div class="cards">

                @if ($previousPatente)
                    <a class="card-item r" href="{{ route('biblioteca.patentes.show', $previousPatente->id) }}">
                           <p>Patente anterior</p>
                        <h3>{{ $previousPatente->titulo }}</h3>
                  
                        <svg width="24px" height="24px" class="icon fill-current text-gray-500 "  viewBox="0 0 1024 1024" class="icon" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" >
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M768 903.232l-50.432 56.768L256 512l461.568-448 50.432 56.768L364.928 512z"
                                    ></path>
                            </g>
                        </svg>
                    </a>
                @endif
                @if ($nextPatente)
                    <a class="card-item l" href="{{ route('biblioteca.patentes.show', $nextPatente->id) }}">
                            <p> Patente siguiente</p> 
                        <h3>{{ $nextPatente->titulo }}</h3>
                    
                        <svg width="24px" height="24px"  class="icon fill-current text-gray-500 " viewBox="0 0 1024 1024" class="icon" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" >
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M256 120.768L306.432 64 768 512l-461.568 448L256 903.232 659.072 512z"
                                   ></path>
                            </g>
                        </svg>
                    </a>
                @endif
            </div>
        @endif

    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const shareButtons = document.querySelectorAll('.sharebtn-dropdown a');
            const currentURL = encodeURIComponent(window.location.href);
            const shareText = encodeURIComponent('Check this out!');

            // Facebook
            shareButtons[0].href = `https://www.facebook.com/sharer/sharer.php?u=${currentURL}`;


            // LinkedIn
            shareButtons[1].href = `https://www.linkedin.com/sharing/share-offsite/?url=${currentURL}`;

            console.log(currentURL)

            shareButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const platform = this.querySelector('span').textContent.toLowerCase();
                    window.open(this.href, `${platform}-share`, 'width=600,height=400');
                });
            });
        });
    </script>

@endsection
