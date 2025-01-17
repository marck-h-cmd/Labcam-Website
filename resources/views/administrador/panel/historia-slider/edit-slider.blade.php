@extends('administrador.dashboard.plantilla')

@section('title', 'Crear Slider historia')

@section('contenido')
    <div class="slider-container max-w-screen-2xl flex flex-col items-center ">

        <div class="main-title flex flex-col items-center gap-3 mb-8">
            <div class="title text-2xl font-semibold text-[#2e5382]">Crear Slider de Momentos Importantes</div>
            <div class="blue-line w-1/5 h-0.5 bg-[#64d423]"></div>
        </div>
        <form class="md:px-20 px-40 py-10 " action="{{ route('h-slider.update',$slider->id) }}" method="post" id="form"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid gap-6 mb-6 md:grid-cols-1 bg-slate-200 p-4 rounded-lg">

                <div>

                    <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 ">Descripcion
                        Momento</label>
                    <textarea
                        class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none "
                        id="descripcion" name="descripcion" rows="3" placeholder="Message"></textarea>
                    <p class="block w-full text-sm text-green-500 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none p-2 mt-2"
                        id="char-count">200 caracteres restantes </p>

                </div>
                <div>
                    <label for="historia_img" class="block mb-2 text-sm font-medium text-gray-900">Imagen Slider</label>
                    <div class="flex items-center justify-center w-full">
                    <!--    <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50"> -->
                            <div class="relative">
                                <img id="img-preview" src="{{ Storage::url('uploads/imgs/' . $slider->historia_img) }}" alt="Foto 1"
                                    class="w-auto  h-auto object-cover rounded-md border border-gray-300" />
                                <input type="file" name="historia_img" id="dropzone-file"
                                    class="absolute z-20 bottom-0 w-full opacity-0 cursor-pointer" accept="image/png,image/jpg,image/jpeg"
                                   />
                                <label for="historia_img"
                                    class="absolute bottom-0 w-full text-center p-2 bg-blue-500 bg-opacity-50 text-white  cursor-pointer">
                                   Editar ✏️
                                </label>
                            </div>
                            
                  <!--      </label> -->
                    </div>
                    <div id="info-container" class="mt-2"></div>
                </div>

            </div>


            <div class="flex justify-center gap-2">
                <button type="submit"
                    class="focus:outline-none text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Guardar</button>

                <a href="{{ route('h-slider.create') }}"
                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 cursor-pointer ">Cancelar</a>
            </div>




        </form>

    </div>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Creado exitosamente!',
                text: 'Nuevo slider ha sido creado.',
                showConfirmButton: true,
                confirmButtonText: 'Aceptar',
                customClass: {
                    confirmButton: 'bg-green-500 text-white hover:bg-green-600 focus:ring-2 focus:ring-green-300 rounded-lg py-2 px-4'
                }
            });
        </script>
    @elseif (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: '¡Hubo un error!',
                text: 'Vuelve a intentar.',
                showConfirmButton: true,
                confirmButtonText: 'Aceptar',
                customClass: {
                    confirmButton: 'bg-red-500 text-white hover:bg-red-600 focus:ring-2 focus:ring-red-300 rounded-lg py-2 px-4'
                }
            });
        </script>
    @endif

@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const imgContainer = document.getElementById("info-container")
            const imgInput = document.getElementById("dropzone-file")
            const charCount = document.getElementById('char-count');
            const imgPreview = document.getElementById('img-preview')
            const maxChars = 200;
      

            const updateCount = () => {

                const content = tinymce.get('descripcion').getContent({
                    format: 'text'
                });
                const remainingChars = maxChars - content.length;

                if (remainingChars < 20) {
                    charCount.classList.add("text-red-500")
                } else {
                    charCount.classList.remove("text-red-500")
                }


                const formattedChars = remainingChars.toLocaleString('en-US').replace(/,/g, ' ');
                charCount.textContent = `${formattedChars} caracteres restantes`;
            };
            imgInput.addEventListener('change', (event) => {

                fileDisplay(event, imgContainer);
            });

            function fileDisplay(event, container) {
                const file = event.target.files[0];
                if (file) {
                    container.innerHTML =
                        `
      <label  class="block w-full text-sm text-green-500 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none p-2" id="file_display" >Archivo Seleccionado: ${file.name} </label>`;
                }
            }

            tinymce.init({
                selector: '#descripcion',
                language: 'es_MX',
                branding: false,
                menubar: false,
                toolbar: 'undo redo | forecolor | bold italic | alignleft aligncenter alignright alignjustify | outdent indent',
                statusbar: false,
                forced_root_block: 'p',
                forced_root_block_attrs: {
                    style: 'margin-bottom: 1em;'
                },
                height: 200,
                autoresize_max_width: 400,
                setup: (editor) => {

                    editor.on('init', () => {
                        editor.setContent(
                            `{!! $slider->descripcion !!}`); 
                        updateCount(); 
                    });

                    // Actualizar el contador al escribir
                    editor.on('input', updateCount);

                    editor.on('BeforeInput', (event) => {
                        const content = editor.getContent({
                            format: 'text'
                        });

                        // Prevenir escribir si el limite de caracteres es alcanzado
                        if (content.length >= maxChars && event.inputType !==
                            "deleteContentBackward") {
                            event.preventDefault();
                        }
                    });

                    editor.on('Paste', (event) => {
                        event.preventDefault();

                        const content = editor.getContent({
                            format: 'text'
                        });
                        const clipboardText = (event.clipboardData || window.clipboardData)
                            .getData('text');

                        // Calcula los caracteres restantes
                        const remainingChars = maxChars - content.length;

                        if (remainingChars > 0) {
                            const newText = clipboardText.substring(0,
                                remainingChars); // Recortar el texto pegado
                            editor.insertContent(
                            newText); // Para insertar solo la parte permitida
                            updateCount();
                        }
                    });
                }
            });

            imgInput.addEventListener("change",(event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imgPreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        });
    </script>

@endsection
