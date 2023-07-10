<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nueva Función') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('Funciones.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
                            <input type="text" name="titulo" id="titulo"
                                class="border-gray-300 focus:ring-blue-500 focus:border-blue-500 block w-full rounded-md shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                            <textarea name="descripcion" id="descripcion" rows="4"
                                class="border-gray-300 focus:ring-blue-500 focus:border-blue-500 block w-full rounded-md shadow-sm"
                                style="padding-left: 10px;" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                            <input type="date" name="fecha" id="fecha"
                                class="border-gray-300 focus:ring-blue-500 focus:border-blue-500 block w-full rounded-md shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="hora" class="block text-sm font-medium text-gray-700">Hora</label>
                            <input type="time" name="hora" id="hora"
                                class="border-gray-300 focus:ring-blue-500 focus:border-blue-500 block w-full rounded-md shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <img id="imagenSeleccionada" style="max-height: 300px;">
                        </div>

                        <div class="mb-4">
                            <label for="imagen" class="block text-sm font-medium text-gray-700">Elegir Imagen</label>
                            <input type="file" name="imagen" id="imagen"
                                class="border-gray-300 focus:ring-blue-500 focus:border-blue-500 block w-full  shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="numero_reservas" class="block text-sm font-medium text-gray-700">Número de
                                Reservas</label>
                            <input type="number" name="numero_reservas" id="numero_reservas"
                                class="border-gray-300 focus:ring-blue-500 focus:border-blue-500 block w-full rounded-md shadow-sm" required>
                        </div>

                        <div class="mt-6">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(e) {
        $('#imagen').change(function() {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#imagenSeleccionada').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
