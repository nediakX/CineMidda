<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Reservas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    @if ($reservas->isEmpty())
                        <p>No tienes reservas asociadas.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">RUT</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Función</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Número de asiento</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código de validación</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($reservas as $reserva)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $reserva->nombre }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $reserva->rut }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $reserva->funcion->titulo }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $reserva->asientos }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $reserva->codigo_validacion }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
