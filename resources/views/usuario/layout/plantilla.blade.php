<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up | Base - Tailwind CSS Startup Template</title>

    <link rel="icon" href="favicon.ico">
    <link href="/user/template/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://cdn.tailwindcss.com"></script>



    @vite(['resources/css/app.css', 'resources/css/about.css', 'resources/js/app.js'])

    @stack('styles')

</head>

<body x-data="{ page: 'signup', 'darkMode': true, 'stickyMenu': false, 'navigationOpen': false, 'scrollTop': false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'b eh': darkMode === true }">
    <!-- ===== Header Start ===== -->
    {{-- <header class="g s r vd ya cj bg-[#1E5397]" :class="{ 'hh sm _k dj bl ll': stickyMenu }"
        @scroll.window="stickyMenu = (window.pageYOffset > 20) ? true : false">
        <div class="bb ze ki xn 2xl:ud-px-0 oo wf yf i">
            <div class="vd to/2 tc wf yf">
                <a href="{{ route('home') }}">
                    <img class="w-96" src="/user/template/images/logoLabCam.png" alt="Logo" />
                </a>

                <!-- Hamburger Toggle BTN -->
                <button class="po rc" @click="navigationOpen = !navigationOpen">
                    <span class="rc i pf re pd">
                        <span class="du-block h q vd yc">
                            <span class="rc i r s eh um tg te rd eb ml jl dl"
                                :class="{ 'ue el': !navigationOpen }"></span>
                            <span class="rc i r s eh um tg te rd eb ml jl fl"
                                :class="{ 'ue qr': !navigationOpen }"></span>
                            <span class="rc i r s eh um tg te rd eb ml jl gl"
                                :class="{ 'ue hl': !navigationOpen }"></span>
                        </span>
                        <span class="du-block h q vd yc lf">
                            <span class="rc eh um tg ml jl el h na r ve yc"
                                :class="{ 'sd dl': !navigationOpen }"></span>
                            <span class="rc eh um tg ml jl qr h s pa vd rd"
                                :class="{ 'sd rr': !navigationOpen }"></span>
                        </span>
                    </span>
                </button>
                <!-- Hamburger Toggle BTN -->
            </div>

            <div class="vd wo/4 sd qo f ho oo wf yf ml-44" :class="{ 'd hh rm sr td ud qg ug jc yh': navigationOpen }">
                <nav>
                    <ul class="tc _o sf yo cg ep">
                        <li><a href="{{ route('home') }}" class="xl text-white"
                                :class="{ 'mk': page === 'home' }">Home</a>
                        </li>
                        <li class="c i" x-data="{ dropdown: false }">
                            <a href="#" class="xl tc wf yf bg text-white" @click.prevent="dropdown = !dropdown"
                                :class="{
                                    'mk': page === 'blog-grid' || page === 'blog-single' || page === 'signin' ||
                                        page === 'signup' || page === '404'
                                }">
                                Nosotros

                                <svg :class="{ 'wh': dropdown }" class="th mm we fd pf text-white fill-current"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z" />
                                </svg>
                            </a>

                            <!-- Dropdown Start -->
                            <ul class="a" :class="{ 'tc': dropdown }">
                                <li><a href="blog-grid.html" class="xl"
                                        :class="{ 'mk': page === 'blog-grid' }">Acerca</a></li>
                                <li><a href="blog-single.html" class="xl"
                                        :class="{ 'mk': page === 'blog-single' }">Historia</a></li>
                                <li><a href="404.html" class="xl"
                                        :class="{ 'mk': page === '404' }">Biblioteca</a>
                                </li>
                            </ul>
                            <!-- Dropdown End -->
                        </li>
                        <li class="c i" x-data="{ dropdown: false }">
                            <a href="#" class="xl tc wf yf bg text-white" @click.prevent="dropdown = !dropdown"
                                :class="{
                                    'mk': page === 'blog-grid' || page === 'blog-single' || page === 'signin' ||
                                        page === 'signup'
                                }">
                                Organización
                                <svg :class="{ 'wh': dropdown }" class="th mm we fd pf text-white fill-current"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z" />
                                </svg>

                            </a>

                            <!-- Dropdown Start -->
                            <ul class="a" :class="{ 'tc': dropdown }">
                                <li><a href="{{route('direccion')}}" class="xl"
                                        :class="{ 'mk': page === 'blog-grid' }">Dirección</a></li>
                                <li><a href="{{route('capital')}}" class="xl"
                                        :class="{ 'mk': page === 'blog-single' }">Capital Humano</a></li>
                            </ul>
                            <!-- Dropdown End -->
                        </li>
                        <li class="c i" x-data="{ dropdown: false }">
                            <a href="#" class="xl tc wf yf bg text-white" @click.prevent="dropdown = !dropdown"
                                :class="{
                                    'mk': page === 'blog-grid' || page === 'blog-single' || page === 'signin' ||
                                        page === 'signup' || page === '404'
                                }">
                                Investigación
                                <svg :class="{ 'wh': dropdown }" class="th mm we fd pf text-white fill-current"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z" />
                                </svg>
                            </a>

                            <!-- Dropdown Start -->
                            <ul class="a" :class="{ 'tc': dropdown }">
                                <li><a href="{{route('noticias')}}" class="xl"
                                        :class="{ 'mk': page === 'blog-grid' }">Noticias</a></li>
                                <li><a href="{{route('proyectos')}}" class="xl"
                                        :class="{ 'mk': page === 'blog-single' }">Proyectos</a></li>
                                <li><a href="{{route('eventos')}}" class="xl"
                                        :class="{ 'mk': page === 'signup' }">Eventos</a></li>
                            </ul>
                            <!-- Dropdown End -->
                        </li>
                    </ul>
                </nav>




                <a href="{{ route('contacto') }}"
                    :class="{ 'hh/[0.15]': page === 'home', 'sh': page === 'home' && stickyMenu }"
                    class="bg-[#98C560] dk rg tc wf xf _l gi hi text-white px-6 py-2 rounded-lg">Contacto</a>
            </div>
        </div>
        </div>
    </header> --}}

    <header class="g s r vd ya cj bg-[#1E5397] transition-all duration-300"
        :class="{ 'hh sm _k dj bl ll bg-transparent opacity-0': stickyMenu, 'bg-[#1E5397] opacity-100': !stickyMenu }"
        @scroll.window="stickyMenu = (window.pageYOffset > 20) ? true : false" @mouseenter="stickyMenu = false"
        @mouseleave="stickyMenu = (window.pageYOffset > 20)">
        <div class="bb ze ki xn 2xl:ud-px-0 oo wf yf i">
            <div class="vd to/2 tc wf yf">
                <a href="{{ route('home') }}">
                    <img class="w-96" src="/user/template/images/logoLabCam.png" alt="Logo" />
                </a>


                <!-- Hamburger Toggle BTN -->
                <button class="po rc" @click="navigationOpen = !navigationOpen">
                    <span class="rc i pf re pd">
                        <span class="du-block h q vd yc">
                            <span class="rc i r s eh um tg te rd eb ml jl dl"
                                :class="{ 'ue el': !navigationOpen }"></span>
                            <span class="rc i r s eh um tg te rd eb ml jl fl"
                                :class="{ 'ue qr': !navigationOpen }"></span>
                            <span class="rc i r s eh um tg te rd eb ml jl gl"
                                :class="{ 'ue hl': !navigationOpen }"></span>
                        </span>
                        <span class="du-block h q vd yc lf">
                            <span class="rc eh um tg ml jl el h na r ve yc"
                                :class="{ 'sd dl': !navigationOpen }"></span>
                            <span class="rc eh um tg ml jl qr h s pa vd rd"
                                :class="{ 'sd rr': !navigationOpen }"></span>
                        </span>
                    </span>
                </button>
                <!-- Hamburger Toggle BTN -->
            </div>


            <div class="vd wo/4 sd qo f ho oo wf yf ml-44"
                :class="{ 'd hh rm sr td ud qg ug jc yh': navigationOpen, 'opacity-0': stickyMenu }">
                <nav>
                    <ul class="tc _o sf yo cg ep">
                        <li><a href="{{ route('home') }}" class="xl text-white"
                                :class="{ 'mk': page === 'home' }">Home</a>
                        </li>
                        <li class="c i" x-data="{ dropdown: false }">
                            <a href="#" class="xl tc wf yf bg text-white" @click.prevent="dropdown = !dropdown"
                                :class="{
                                    'mk': page === 'blog-grid' || page === 'blog-single' || page === 'signin' ||
                                        page === 'signup' || page === '404'
                                }">
                                Nosotros

                                <svg :class="{ 'wh': dropdown }" class="th mm we fd pf text-white fill-current"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z" />
                                </svg>
                            </a>

                            <!-- Dropdown Start -->
                            <ul class="a" :class="{ 'tc': dropdown }">
                                <li><a href="{{ route('about') }}" class="xl"
                                        :class="{ 'mk': page === 'blog-grid' }">Acerca</a></li>
                                <li><a href="{{ route('historia') }}" class="xl"
                                        :class="{ 'mk': page === 'blog-single' }">Historia</a></li>
                                <li><a href="{{ route('biblioteca') }}" class="xl"
                                        :class="{ 'mk': page === '404' }">Biblioteca</a>
                                </li>
                            </ul>
                            <!-- Dropdown End -->
                        </li>
                        <li class="c i" x-data="{ dropdown: false }">
                            <a href="#" class="xl tc wf yf bg text-white" @click.prevent="dropdown = !dropdown"
                                :class="{
                                    'mk': page === 'blog-grid' || page === 'blog-single' || page === 'signin' ||
                                        page === 'signup'
                                }">
                                Organización
                                <svg :class="{ 'wh': dropdown }" class="th mm we fd pf text-white fill-current"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z" />
                                </svg>

                            </a>

                            <!-- Dropdown Start -->
                            <ul class="a" :class="{ 'tc': dropdown }">
                                <li><a href="{{ route('direccion') }}" class="xl"
                                        :class="{ 'mk': page === 'blog-grid' }">Dirección</a></li>
                                <li><a href="{{ route('capital') }}" class="xl"
                                        :class="{ 'mk': page === 'blog-single' }">Capital Humano</a></li>
                            </ul>
                            <!-- Dropdown End -->
                        </li>
                        <li class="c i" x-data="{ dropdown: false }">
                            <a href="#" class="xl tc wf yf bg text-white" @click.prevent="dropdown = !dropdown"
                                :class="{
                                    'mk': page === 'blog-grid' || page === 'blog-single' || page === 'signin' ||
                                        page === 'signup' || page === '404'
                                }">
                                Investigación
                                <svg :class="{ 'wh': dropdown }" class="th mm we fd pf text-white fill-current"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z" />
                                </svg>
                            </a>

                            <!-- Dropdown Start -->
                            <ul class="a" :class="{ 'tc': dropdown }">
                                <li><a href="blog-grid.html" class="xl"
                                        :class="{ 'mk': page === 'blog-grid' }">Noticias</a></li>
                                <li><a href="blog-single.html" class="xl"
                                        :class="{ 'mk': page === 'blog-single' }">Proyectos</a></li>
                                <li><a href="signup.html" class="xl"
                                        :class="{ 'mk': page === 'signup' }">Eventos</a></li>
                            </ul>
                            <!-- Dropdown End -->
                        </li>
                    </ul>
                </nav>

                <a href="{{ route('contacto') }}"
                    :class="{ 'hh/[0.15]': page === 'home', 'sh': page === 'home' && stickyMenu }"
                    class="bg-[#98C560] dk rg tc wf xf _l gi hi text-white px-6 py-2 rounded-lg">Contacto</a>
            </div>
        </div>
    </header>



    <!-- ===== Header End ===== -->

    <main>
        @yield('contenido')
    </main>


    <!-- ===== Footer Start ===== -->
    <footer class="bg-[#1E5397]">
        <div class="bb ze ki xn 2xl:ud-px-0">
            <!-- Footer Top -->

            <div class="ji gp">
                <div class="tc uf ap gg fp">
                    {{-- primera columna --}}
                    <div class="animate_top zd/2 to/4">
                        <a href="https://www.unitru.edu.pe/">
                            <img src="/user/template/images/logo_unt.png" alt="Logo" class="w-60" />
                        </a>

                        <p class="lc fb text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                        <ul class="tc wf cg">
                            <li>
                                <a href="#">
                                    <svg class="vh ul cl il" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_48_1499)">
                                            <path
                                                d="M14 13.5H16.5L17.5 9.5H14V7.5C14 6.47 14 5.5 16 5.5H17.5V2.14C17.174 2.097 15.943 2 14.643 2C11.928 2 10 3.657 10 6.7V9.5H7V13.5H10V22H14V13.5Z"
                                                fill="" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_48_1499">
                                                <rect width="24" height="24" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <svg class="vh ul cl il" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_48_1502)">
                                            <path
                                                d="M22.162 5.65593C21.3985 5.99362 20.589 6.2154 19.76 6.31393C20.6337 5.79136 21.2877 4.96894 21.6 3.99993C20.78 4.48793 19.881 4.82993 18.944 5.01493C18.3146 4.34151 17.4803 3.89489 16.5709 3.74451C15.6615 3.59413 14.7279 3.74842 13.9153 4.18338C13.1026 4.61834 12.4564 5.30961 12.0771 6.14972C11.6978 6.98983 11.6067 7.93171 11.818 8.82893C10.1551 8.74558 8.52832 8.31345 7.04328 7.56059C5.55823 6.80773 4.24812 5.75098 3.19799 4.45893C2.82628 5.09738 2.63095 5.82315 2.63199 6.56193C2.63199 8.01193 3.36999 9.29293 4.49199 10.0429C3.828 10.022 3.17862 9.84271 2.59799 9.51993V9.57193C2.59819 10.5376 2.93236 11.4735 3.54384 12.221C4.15532 12.9684 5.00647 13.4814 5.95299 13.6729C5.33661 13.84 4.6903 13.8646 4.06299 13.7449C4.32986 14.5762 4.85 15.3031 5.55058 15.824C6.25117 16.345 7.09712 16.6337 7.96999 16.6499C7.10247 17.3313 6.10917 17.8349 5.04687 18.1321C3.98458 18.4293 2.87412 18.5142 1.77899 18.3819C3.69069 19.6114 5.91609 20.2641 8.18899 20.2619C15.882 20.2619 20.089 13.8889 20.089 8.36193C20.089 8.18193 20.084 7.99993 20.076 7.82193C20.8949 7.2301 21.6016 6.49695 22.163 5.65693L22.162 5.65593Z"
                                                fill="" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_48_1502">
                                                <rect width="24" height="24" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <svg class="vh ul cl il" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_48_1505)">
                                            <path
                                                d="M6.94 5.00002C6.93974 5.53046 6.72877 6.03906 6.35351 6.41394C5.97825 6.78883 5.46944 6.99929 4.939 6.99902C4.40857 6.99876 3.89997 6.78779 3.52508 6.41253C3.1502 6.03727 2.93974 5.52846 2.94 4.99802C2.94027 4.46759 3.15124 3.95899 3.5265 3.5841C3.90176 3.20922 4.41057 2.99876 4.941 2.99902C5.47144 2.99929 5.98004 3.21026 6.35492 3.58552C6.72981 3.96078 6.94027 4.46959 6.94 5.00002ZM7 8.48002H3V21H7V8.48002ZM13.32 8.48002H9.34V21H13.28V14.43C13.28 10.77 18.05 10.43 18.05 14.43V21H22V13.07C22 6.90002 14.94 7.13002 13.28 10.16L13.32 8.48002Z"
                                                fill="" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_48_1505">
                                                <rect width="24" height="24" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>


                    <div class="vd ro tc sf rn un gg vn">
                        {{-- segunda columna --}}
                        <div class="animate_top">
                            <h4 class="kk wm tj ec text-[#FFFF] font-bold">Contacto</h4>

                            <ul class="text-white">
                                <li><a href="#" class="sc xl vb">Correo</a></li>
                                <li><a href="#" class="sc xl vb">Celular</a></li>
                                <li><a href="#" class="sc xl vb">Dirección</a></li>
                            </ul>
                        </div>

                        {{-- tercera columna --}}
                        <div class="animate_top zd/2 to/3">
                            <a href="{{ route('home') }}">
                                <img src="/user/template/images/logoLabCam.png" alt="Logo" class="w-96" />
                            </a>

                            <p class="lc fb text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                            <ul class="tc wf cg">
                                <li>
                                    <a href="#">
                                        <svg class="vh ul cl il" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_48_1499)">
                                                <path
                                                    d="M14 13.5H16.5L17.5 9.5H14V7.5C14 6.47 14 5.5 16 5.5H17.5V2.14C17.174 2.097 15.943 2 14.643 2C11.928 2 10 3.657 10 6.7V9.5H7V13.5H10V22H14V13.5Z"
                                                    fill="" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_48_1499">
                                                    <rect width="24" height="24" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <svg class="vh ul cl il" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_48_1502)">
                                                <path
                                                    d="M22.162 5.65593C21.3985 5.99362 20.589 6.2154 19.76 6.31393C20.6337 5.79136 21.2877 4.96894 21.6 3.99993C20.78 4.48793 19.881 4.82993 18.944 5.01493C18.3146 4.34151 17.4803 3.89489 16.5709 3.74451C15.6615 3.59413 14.7279 3.74842 13.9153 4.18338C13.1026 4.61834 12.4564 5.30961 12.0771 6.14972C11.6978 6.98983 11.6067 7.93171 11.818 8.82893C10.1551 8.74558 8.52832 8.31345 7.04328 7.56059C5.55823 6.80773 4.24812 5.75098 3.19799 4.45893C2.82628 5.09738 2.63095 5.82315 2.63199 6.56193C2.63199 8.01193 3.36999 9.29293 4.49199 10.0429C3.828 10.022 3.17862 9.84271 2.59799 9.51993V9.57193C2.59819 10.5376 2.93236 11.4735 3.54384 12.221C4.15532 12.9684 5.00647 13.4814 5.95299 13.6729C5.33661 13.84 4.6903 13.8646 4.06299 13.7449C4.32986 14.5762 4.85 15.3031 5.55058 15.824C6.25117 16.345 7.09712 16.6337 7.96999 16.6499C7.10247 17.3313 6.10917 17.8349 5.04687 18.1321C3.98458 18.4293 2.87412 18.5142 1.77899 18.3819C3.69069 19.6114 5.91609 20.2641 8.18899 20.2619C15.882 20.2619 20.089 13.8889 20.089 8.36193C20.089 8.18193 20.084 7.99993 20.076 7.82193C20.8949 7.2301 21.6016 6.49695 22.163 5.65693L22.162 5.65593Z"
                                                    fill="" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_48_1502">
                                                    <rect width="24" height="24" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <svg class="vh ul cl il" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_48_1505)">
                                                <path
                                                    d="M6.94 5.00002C6.93974 5.53046 6.72877 6.03906 6.35351 6.41394C5.97825 6.78883 5.46944 6.99929 4.939 6.99902C4.40857 6.99876 3.89997 6.78779 3.52508 6.41253C3.1502 6.03727 2.93974 5.52846 2.94 4.99802C2.94027 4.46759 3.15124 3.95899 3.5265 3.5841C3.90176 3.20922 4.41057 2.99876 4.941 2.99902C5.47144 2.99929 5.98004 3.21026 6.35492 3.58552C6.72981 3.96078 6.94027 4.46959 6.94 5.00002ZM7 8.48002H3V21H7V8.48002ZM13.32 8.48002H9.34V21H13.28V14.43C13.28 10.77 18.05 10.43 18.05 14.43V21H22V13.07C22 6.90002 14.94 7.13002 13.28 10.16L13.32 8.48002Z"
                                                    fill="" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_48_1505">
                                                    <rect width="24" height="24" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>


                        {{-- cuarto columna --}}
                        <div class="animate_top">
                            <h4 class="kk wm tj ec text-[#FFFF] font-bold">Contacto</h4>

                            <ul class="text-white">
                                <li><a href="#" class="sc xl vb">Correo</a></li>
                                <li><a href="#" class="sc xl vb">Celular</a></li>
                                <li><a href="#" class="sc xl vb">Dirección</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Footer Top -->

            <!-- Footer Bottom -->
            <div class="bh ch pm tc uf sf yo wf xf ap cg fp bj">
                <div class="animate_top">
                    <ul class="tc wf gg text-white">
                        <li><a href="#" class="xl">English</a></li>
                        <li><a href="#" class="xl">Privacy Policy</a></li>
                        <li><a href="#" class="xl">Support</a></li>
                    </ul>
                </div>

                <div class="animate_top text-white">
                    <p>&copy; 2025 LabCam. All rights reserved</p>
                </div>
            </div>
            <!-- Footer Bottom -->
        </div>
    </footer>

    <!-- ===== Footer End ===== -->

    <!-- ====== Back To Top Start ===== -->
    <button class="xc wf xf ie ld vg sr gh tr g sa ta _a" @click="window.scrollTo({top: 0, behavior: 'smooth'})"
        @scroll.window="scrollTop = (window.pageYOffset > 50) ? true : false" :class="{ 'uc': scrollTop }">
        <svg class="uh se qd" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path
                d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z" />
        </svg>
    </button>

    <!-- ====== Back To Top End ===== -->

    <script>
        //  Pricing Table
        const setup = () => {
            return {
                isNavOpen: false,

                billPlan: 'monthly',

                plans: [{
                        name: 'Starter',
                        price: {
                            monthly: 29,
                            annually: 29 * 12 - 199,
                        },
                        features: ['400 GB Storaget', 'Unlimited Photos & Videos', 'Exclusive Support'],
                    },
                    {
                        name: 'Growth Plan',
                        price: {
                            monthly: 59,
                            annually: 59 * 12 - 100,
                        },
                        features: ['400 GB Storaget', 'Unlimited Photos & Videos', 'Exclusive Support'],
                    },
                    {
                        name: 'Business',
                        price: {
                            monthly: 139,
                            annually: 139 * 12 - 100,
                        },
                        features: ['400 GB Storaget', 'Unlimited Photos & Videos', 'Exclusive Support'],
                    },
                ],
            };
        };
    </script>
    <script defer src="/user/template/bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    @stack('scripts')
</body>

</html>
