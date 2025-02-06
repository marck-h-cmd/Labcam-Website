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

        /*
    .container {
      margin-bottom: 20px;
      display: flex;
      flex-direction: column;
      
    }
    */


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

        .paper-title {
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
            border: 1px solid rgb(114, 114, 114, 0.7);
            cursor: pointer;
            font-family: "Lato", "Helvetica", sans-serif;
            transition: background-color 0.3s ease-in-out;
        }

        .card-item.r {
            text-align: right;
        }

        .card-item:hover {

            background-color: #ebebeb;

        }


        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
            }

            .cards h3 {
                font-size: 14px;
            }

            .card-item {
                font-size: 8px;
                padding: 8px;
            }

            .pdf-frame {
                max-width: 500px;
            }

            .paper-title {
                font-size: 20px;
            }

            .header-content {
                font-size: 12px;
            }

            .abstract-container {
                font-size: 14px;
            }

            .cards {
                gap: 0px;
                width: 80%;

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
            border-left: 22.5px solid #fff;
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
                <h1 class="paper-title">{{ $paper->titulo }}</h1>
                <div class="title-line"></div>
            </div>

            <div class="header-content">

                <div class="additional-info">
                    <p><strong>Autor publicación: </strong>{{ $paper->formatted_autores }}</p>
                    <p><strong>Fecha: </strong> {{ $paper->fecha_publicacion }}</p>
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
                            <path d="M11,12.4c-0.8,0-1.5-0.7-1.5-1.5c0-0.8,0.7-1.5,1.5-1.5s1.5,0.7,1.5,1.5C12.5,11.7,11.8,12.4,11,12.4z M11,10.2
                        c-0.4,0-0.6,0.3-0.6,0.6c0,0.4,0.3,0.6,0.6,0.6c0.4,0,0.6-0.3,0.6-0.6C11.6,10.5,11.3,10.2,11,10.2z">
                            </path>
                            <path d="M20.1,20.7H18c-0.2,0-0.4-0.2-0.4-0.4v-3.4c0-1.1-0.1-1.4-0.7-1.4c-0.6,0-0.8,0.2-0.8,1.3v3.4c0,0.2-0.2,0.4-0.4,0.4h-2.2
                        c-0.2,0-0.4-0.2-0.4-0.4v-6.9c0-0.2,0.2-0.4,0.4-0.4h2.1c0.2,0,0.4,0.1,0.4,0.3c0.4-0.3,1-0.5,1.6-0.5c2.7,0,3,2,3,3.7v3.8
                        C20.6,20.5,20.4,20.7,20.1,20.7z M18.4,19.8h1.3l0-3.4c0-2.1-0.6-2.9-2.1-2.9c-0.9,0-1.4,0.5-1.6,0.9c-0.1,0.1-0.2,0.2-0.4,0.2
                        c-0.2,0-0.5-0.2-0.5-0.4v-0.5h-1.2v6h1.3v-3c0-0.5,0-2.2,1.7-2.2c1.6,0,1.6,1.5,1.6,2.3V19.8z"></path>
                        </svg>
                    </a>
                </div>

            </div>

        </div>

        <img class="header-image" src="{{ Storage::url('uploads/paper_img/' . $paper->img_filename) }}"
            alt="Header Image" />

        <!-- CONTENEDOR PAPER INFORMACIÓN --->
        <div class="abstract-container">

            <div class="ribbon">
                <h3>Abstract:</h3>
            </div>
            <p class="abstract-text">
                {{ $paper->descripcion }}
            </p>
            <p><strong>Autores: </strong><span class=" ml-2"> {{ $paper->formatted_autores }} </span></p>
            <p><strong>Área: </strong><span class=" ml-2"> {{ $paper->area->nombre }} </span></p>
            <p><strong>Fecha Publicación: </strong><span class=" ml-2">{{ $paper->fecha_publicacion }}</span></p>
            <p><strong>Publisher: </strong><span class=" ml-2"> {{ $paper->publisher }}</span></p>
            <div class="doi">
                <p><strong>DOI: </strong> <a class=" ml-2" href="{{ $paper->doi }}" target="_blank">{{ $paper->doi }}</a></p>
            </div>
        </div>


        <!-- PDF FRAME --->
        <iframe class="pdf-frame" src="{{ Storage::url('uploads/pdf/' . $paper->pdf_filename) }}" alt="PDF">
        </iframe>

        @if ($previousPaper || $nextPaper)
            <div class="cards">

                @if ($previousPaper)
                    <a class="card-item r" href="{{ route('biblioteca.papers.show', $previousPaper->id) }}">
                        <h3>{{ $previousPaper->titulo }}</h3>
                        <p>Paper anterior</p>
                    </a>
                @endif
                @if ($nextPaper)
                    <a class="card-item" href="{{ route('biblioteca.papers.show', $nextPaper->id) }}">
                        <h3>{{ $nextPaper->titulo }}</h3>
                        <p> Paper siguiente</p>
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
