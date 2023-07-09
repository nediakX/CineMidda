<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Validar Reservas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
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
                                Asientos</th>
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
                                        <form action="{{ route('Funciones.destroyReserva', $reserva->id) }}"
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
</x-app-layout>
