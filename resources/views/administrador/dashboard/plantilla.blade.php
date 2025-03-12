<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="/admin_dash/dist/css/style.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/admin_dash/dist/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <title>Dashboard</title>
</head>

<body class="text-gray-800 font-inter">
    <!-- start: Sidebar -->
    <aside
        class="fixed left-0 top-0 w-[300px] h-full bg-[#1E5397] p-4 z-50 sidebar-menu transition-transform overflow-y-auto shadow-2xl">
        <a href="{{ route('admin-principal') }}" class="flex items-center py-8 border-b border-b-[#98C560]">
            <img src="/user/template/images/logoLabCam.png" alt="logo_labcam" class="max-w-full">
        </a>
        <ul class="mt-8">
            <h4 class="text-[#98C560] text-sm font-bold uppercase mb-3">Administración general</h4>

            <li class="mb-1 group cursor-pointer">
                <a href="{{ route('admin-principal') }}"
                    class="flex items-center py-2 px-4 text-white hover:bg-[#98C560] rounded-md {{ request()->routeIs('admin-principal') ? 'bg-[#98C560]' : 'bg-transparent' }}">
                    <i class="ri-instance-line mr-3 text-lg"></i>
                    <span class="text-sm">Principal</span>
                </a>
            </li>

            <li class="mb-1 group cursor-pointer {{ request()->routeIs(['person', 'users']) ? 'active' : '' }}">
                <a
                    class="flex items-center py-2 px-4 text-white hover:bg-[#98C560] rounded-md group-[.active]:bg-[#98C560] group-[.active]:text-white sidebar-dropdown-toggle">
                    <i class="ri-instance-line mr-3 text-lg"></i>
                    <span class="text-sm">Usuarios</span>
                    <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                </a>
                <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                    <li class="mb-4">
                        <a href="{{ route('person') }}"
                            class="text-sm flex items-center py-2 px-4 rounded-md text-white">
                            <span
                                class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('person') ? 'bg-[#98C560]' : 'bg-gray-300' }}"></span>
                            Lista de Usuarios
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('users') }}"
                            class="text-sm flex items-center py-2 px-4 rounded-md text-white">
                            <span
                                class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('users') ? 'bg-[#98C560]' : 'bg-gray-300' }}"></span>
                            Registrar Usuario
                        </a>
                    </li>
                </ul>
            </li>

            <li class="mb-1 group cursor-pointer">
                <a href="{{ route('user.edit_user') }}"
                    class="flex items-center py-2 px-4 text-white hover:bg-[#98C560] rounded-md {{ request()->routeIs('user.edit_user') ? 'bg-[#98C560]' : 'bg-transparent' }}">
                    <i class="ri-instance-line mr-3 text-lg"></i>
                    <span class="text-sm">Mi Cuenta</span>
                </a>
            </li>


            <h4 class="text-[#98C560] text-sm font-bold uppercase mb-3 mt-8">Pestañas</h4>

            <li class="mb-1 group cursor-pointer">
                <a href="{{ route('admin-homeSlider') }}"
                    class="flex items-center py-2 px-4 text-white hover:bg-[#98C560] rounded-md {{ request()->routeIs('admin-homeSlider') ? 'bg-[#98C560]' : 'bg-transparent' }}">
                    <i class="ri-instance-line mr-3 text-lg"></i>
                    <span class="text-sm">Home Slider</span>
                </a>
            </li>

            <li
                class="mb-1 group cursor-pointer {{ request()->routeIs(['h-slider.create', 'h-sliders-panel', 'h-slider.edit']) ? 'active' : '' }}">
                <a
                    class="flex items-center py-2 px-4 text-white hover:bg-[#98C560] rounded-md group-[.active]:bg-[#98C560] group-[.active]:text-white sidebar-dropdown-toggle">
                    <i class="ri-instance-line mr-3 text-lg"></i>
                    <span class="text-sm">Nosotros</span>
                    <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                </a>
                <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                    <li class="mb-4">
                        <a href="{{ route('h-sliders-panel') }}"
                            class="text-sm flex items-center py-2 px-4 rounded-md text-white">
                            <span
                                class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs(['h-sliders-panel', 'h-slider.edit']) ? 'bg-[#98C560]' : 'bg-gray-300' }}"></span>
                            Panel Historia Slider</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('h-slider.create') }}"
                            class="text-sm flex items-center py-2 px-4 rounded-md text-white">
                            <span
                                class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('h-slider.create') ? 'bg-[#98C560]' : 'bg-gray-300' }}"></span>
                            Crear Historia Slider</a>
                    </li>
                </ul>
            </li>

            <li
                class="mb-1 group cursor-pointer {{ request()->routeIs(['papers.create', 'papers.index', 'papers.edit']) ? 'active' : '' }}">
                <a
                    class="flex items-center py-2 px-4 text-white hover:bg-[#98C560] rounded-md group-[.active]:bg-[#98C560] group-[.active]:text-white sidebar-dropdown-toggle">
                    <i class="ri-instance-line mr-3 text-lg"></i>
                    <span class="text-sm">Papers</span>
                    <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                </a>
                <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                    <li class="mb-4">
                        <a href="{{ route('papers.index') }}"
                            class="text-sm flex items-center py-2 px-4 rounded-md text-white">
                            <span
                                class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs(['papers.index', 'papers.edit']) ? 'bg-[#98C560]' : 'bg-gray-300' }}"></span>
                            Lista de Papers</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('papers.create') }}"
                            class="text-sm flex items-center py-2 px-4 rounded-md text-white">
                            <span
                                class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('papers.create') ? 'bg-[#98C560]' : 'bg-gray-300' }}"></span>
                            Crear Paper</a>
                    </li>
                </ul>
            </li>

            <li
                class="mb-1 group cursor-pointer {{ request()->routeIs(['areas-panel', 'areas.edit', 'topic-panel', 'topics.edit']) ? 'active' : '' }}">
                <a
                    class="flex items-center py-2 px-4 text-white hover:bg-[#98C560] rounded-md group-[.active]:bg-[#98C560] group-[.active]:text-white sidebar-dropdown-toggle">
                    <i class="ri-instance-line mr-3 text-lg"></i>
                    <span class="text-sm">Investigación</span>
                    <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                </a>
                <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                    <li class="mb-4">
                        <a href="{{ route('areas-panel') }}"
                            class="text-sm flex items-center py-2 px-4 rounded-md text-white">
                            <span
                                class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs(['areas-panel', 'areas.edit']) ? 'bg-[#98C560]' : 'bg-gray-300' }}"></span>Áreas
                            de Investigación</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('topic-panel') }}"
                            class="text-sm flex items-center py-2 px-4 rounded-md text-white">
                            <span
                                class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs(['topic-panel', 'topics.edit']) ? 'bg-[#98C560]' : 'bg-gray-300' }}"></span>Tópicos
                            Paper</a>

                    </li>
                </ul>
            </li>

            <li
                class="mb-1 group cursor-pointer {{ request()->routeIs(['capital_index', 'direccion_index']) ? 'active' : '' }}">
                <a
                    class="flex items-center py-2 px-4 text-white hover:bg-[#98C560] rounded-md group-[.active]:bg-[#98C560] group-[.active]:text-white sidebar-dropdown-toggle">
                    <i class="ri-instance-line mr-3 text-lg"></i>
                    <span class="text-sm">Organización</span>
                    <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                </a>
                <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                    <li class="mb-4">
                        <a href="{{ route('capital_index') }}"
                            class="text-sm flex items-center py-2 px-4 rounded-md text-white">
                            <span
                                class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('capital_index') ? 'bg-[#98C560]' : 'bg-gray-300' }}"></span>
                            Capital Humano
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('direccion_index') }}"
                            class="text-sm flex items-center py-2 px-4 rounded-md text-white">
                            <span
                                class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('direccion_index') ? 'bg-[#98C560]' : 'bg-gray-300' }}"></span>
                            Dirección
                        </a>
                    </li>
                </ul>
            </li>
            <li
                class="mb-1 group cursor-pointer {{ request()->routeIs(['notici', 'proyect', 'event']) ? 'active' : '' }}">
                <a
                    class="flex items-center py-2 px-4 text-white hover:bg-[#98C560] rounded-md group-[.active]:bg-[#98C560] group-[.active]:text-white sidebar-dropdown-toggle">
                    <i class="ri-instance-line mr-3 text-lg"></i>
                    <span class="text-sm">Novedades</span>
                    <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                </a>
                <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                    <li class="mb-4">
                        <a href="{{ route('notici') }}"
                            class="text-sm flex items-center py-2 px-4 rounded-md text-white">
                            <span
                                class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('notici') ? 'bg-[#98C560]' : 'bg-gray-300' }}"></span>
                            Noticias</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('proyect') }}"
                            class="text-sm flex items-center py-2 px-4 rounded-md text-white">
                            <span
                                class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('proyect') ? 'bg-[#98C560]' : 'bg-gray-300' }}"></span>
                            Proyectos</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('event') }}"
                            class="text-sm flex items-center py-2 px-4 rounded-md text-white">
                            <span
                                class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('event') ? 'bg-[#98C560]' : 'bg-gray-300' }}"></span>
                            Eventos</a>
                    </li>
                </ul>
            </li>
            <li class="mb-1 group cursor-pointer">
                <a href="{{ route('contactos') }}"
                    class="flex items-center py-2 px-4 text-white hover:bg-[#98C560] rounded-md {{ request()->routeIs('contactos') ? 'bg-[#98C560]' : 'bg-transparent' }}">
                    <i class="ri-instance-line mr-3 text-lg"></i>
                    <span class="text-sm">Contacto</span>
                </a>
            </li>


        </ul>
        <div class="fixed top-0 left-[300px] w-full h-full z-40 md:hidden sidebar-overlay backdrop-blur-sm"></div>
    </aside>
    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main class="w-full md:w-[calc(100%-300px)] md:ml-[300px] bg-gray-50 min-h-screen transition-all main">
        <section class="py-5 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
            <button type="button" class="text-2xl text-gray-600 sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>
            <ul class="ml-auto flex items-center">
                <li class="dropdown ml-3">
                    <button type="button"
                        class="dropdown-toggle flex items-center gap-x-2 hover:text-[#98C560] group">
                        <div
                            class="relative inline-block bg-white p-[2.5px] rounded-full border-[1px] border-black group-hover:border-[#98C560]">
                            @if (Auth::check() && Auth::user()->photo)
                                <img src="{{ Storage::url('' . Auth::user()->photo) }}" alt="Foto de perfil"
                                    class="w-12 h-12 rounded-full block object-cover">
                            @elseif(Auth::check())
                                <div
                                    class="w-12 h-12 bg-gray-300 text-gray-700 flex items-center justify-center rounded-full text-xl font-bold uppercase">
                                    {{ substr(Auth::user()->firstname, 0, 1) }}
                                </div>
                            @endif
                        </div>
                        @if (Auth::check())
                            <div>
                                <h4 class="text-[14.5px] font-medium">{{ Auth::user()->firstname }}
                                    {{ Auth::user()->lastname }}</h4>
                                <h4 class="text-[12.5px] font-normal">{{ Auth::user()->email }}</h4>
                            </div>
                        @endif
                    </button>
                    <ul
                        class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-2 rounded-md bg-white border border-gray-100 w-[140px] text-black text-[15px]">
                        <li>
                            <a href="{{ route('user.edit_user') }}"
                                class="flex items-center py-1.5 px-4 hover:text-[#98C560]">Mi Perfil</a>
                        </li>
                        <li>
                            <a href="#" onclick="confirmLogout()"
                                class="flex items-center py-1.5 px-4 hover:text-[#98C560]">Cerrar
                                Sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
        <section class="d-flex px-6 py-9">
            @yield('contenido')
        </section>
    </main>
    <!-- end: Main -->

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="/admin_dash/dist/js/script.js"></script>
    <script>
        function confirmLogout() {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "Se cerrará tu sesión",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Sí, salir",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('logout') }}";
                }
            });
        }
    </script>

    @yield('script')
</body>

</html>
