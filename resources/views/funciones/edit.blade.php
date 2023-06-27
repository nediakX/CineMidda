    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Editar Función') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6">
                        <form action="{{ route('Funciones.update', $funcion->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="titulo" class="block text-sm font-medium text-gray-700">Cambiar Título</label>
                                <input type="text" name="titulo" value="{{ $funcion->titulo }}" class="border-gray-300 focus:ring-blue-500 focus:border-blue-500 block w-full rounded-md shadow-sm">
                            </div>

                            <div class="mb-4">
                                <label for="descripcion" class="block text-sm font-medium text-gray-700">Cambiar Descripción</label>
                                <textarea name="descripcion" class="border-gray-300 focus:ring-blue-500 focus:border-blue-500 block w-full rounded-md shadow-sm" rows="4" style="padding-left: 10px;">{{ $funcion->descripcion }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="fecha" class="block text-sm font-medium text-gray-700">Cambiar Fecha</label>
                                <input type="date" name="fecha" value="{{ $funcion->fecha }}" class="border-gray-300 focus:ring-blue-500 focus:border-blue-500 block w-full rounded-md shadow-sm">
                            </div>

                            <div class="mb-4">
                                <label for="hora" class="block text-sm font-medium text-gray-700">Cambiar Hora</label>
                                <input type="time" name="hora" value="{{ $funcion->hora }}" class="border-gray-300 focus:ring-blue-500 focus:border-blue-500 block w-full rounded-md shadow-sm">
                            </div>

                            <div class="mb-4">
                                <img src="{{ asset('storage/imagen/' . $funcion->imagen) }}"
                                alt="Imagen de la película" width="300" id="imagenSeleccionada">
                            </div>

                            <div class="mb-4">
                                <label for="imagen" class="block text-sm font-medium text-gray-700">Cambiar Imagen</label>
                                <input type="file" name="imagen" id="imagen" class="border-gray-300 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm">
                            </div>

                            <div class="mb-4">
                                <label for="numero_reservas" class="block text-sm font-medium text-gray-700">Cambiar el Número de Reservas</label>
                                <input type="number" name="numero_reservas" value="{{ $funcion->numero_reservas }}" class="border-gray-300 focus:ring-blue-500 focus:border-blue-500 block w-full rounded-md shadow-sm">
                            </div>

                            <div class="mt-6">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Guardar</button>
                                <a href="{{ route('Funciones.index') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2.5 px-4 rounded-full">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function (e) {
            $('#imagen').change(function() {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagenSeleccionada').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
