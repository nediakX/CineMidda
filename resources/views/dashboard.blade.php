<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Validar Reservas') }}
        </h2>
    </x-slot>
    <script src="https://cdn.tailwindcss.com"></script>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('dashboard') }}" method="GET" id="filter-form">
                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="rut"
                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">RUT</label>
                                <input type="text" id="rut" name="rut" placeholder="Buscar por RUT"
                                    value="{{ request('rut') }}"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="funcion_id"
                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Función</label>
                                <select id="funcion_id" name="funcion_id"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="">Todas las funciones</option>
                                    @foreach ($funciones as $funcion)
                                        <option value="{{ $funcion->id }}"
                                            {{ request('funcion_id') == $funcion->id ? 'selected' : '' }}>
                                            {{ $funcion->titulo }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex items-center justify-end">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Buscar
                            </button>
                            <button type="button" onclick="limpiarFiltro()"
                                class="ml-2 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Limpiar filtro
                            </button>
                        </div>
                    </form>
                </div>

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                RUT</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Función</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Numero de asientos</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if ($reservas->isEmpty())
                            <tr>
                                <td colspan="8" class="px-6 py-4 text-center">No hay reservas
                                    disponibles.</td>
                            </tr>
                        @else
                            @foreach ($reservas as $reserva)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $reserva->nombre }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $reserva->rut }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $reserva->funcion->titulo }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $reserva->asientos }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('funciones.destroyReserva', $reserva->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#rut').on('input', function() {
                var rut = $(this).val().trim();
                if (rut.length > 0) {
                    filterByRutPrefix(rut);
                }
            });
        });

        function filterByRutPrefix(rut) {
            var tableRows = $('.min-w-full tbody tr');
            tableRows.hide();
            tableRows.each(function() {
                var currentRut = $(this).find('td:nth-child(2)').text();
                if (currentRut.startsWith(rut)) {
                    $(this).show();
                }
            });
        }

        function limpiarFiltro() {
            document.getElementById('rut').value = '';
            document.getElementById('funcion_id').selectedIndex = 0;
            document.getElementById('filter-form').submit();
        }
    </script>
</x-app-layout>
