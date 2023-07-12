<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenid@ a la Administracion de Funciones!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex justify-center items-center py-4">
                    <a href="{{ route('funciones.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                        Crear Nueva Función
                    </a>
                </div>

                <div class="flex justify-center">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full text-left text-sm font-light">
                                    <thead class="border-b font-medium dark:border-neutral-500 text-center">
                                        <tr>
                                            <th scope="col" class="px-6 py-4">ID</th>
                                            <th scope="col" class="px-6 py-4">Titulo</th>
                                            <th scope="col" class="px-6 py-4">Descripcion</th>
                                            <th scope="col" class="px-10 py-4">Fecha de la funcion</th>
                                            <th scope="col" class="px-6 py-4">Horario de la funcion</th>
                                            <th scope="col" class="px-6 py-4">Imagen</th>
                                            <th scope="col" class="px-6 py-4">Numero de Reservas</th>
                                            <th scope="col" class="px-6 py-4">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($funciones->isEmpty())
                                            <tr>
                                                <td colspan="8" class="px-6 py-4 text-center">No hay funciones
                                                    disponibles.</td>
                                            </tr>
                                        @else
                                            @foreach ($funciones as $funcion)
                                                <tr
                                                    class="text-center border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-300">
                                                    <td class="px-6 py-4">{{ $funcion->id }}</td>
                                                    <td class="px-6 py-4">{{ $funcion->titulo }}</td>
                                                    <td class="px-6 py-4 break-words">{{ $funcion->descripcion }}</td>
                                                    <td class="px-6 py-4">{{ $funcion->fecha }}</td>
                                                    <td class="px-6 py-4">{{ $funcion->hora }}</td>
                                                    <td class="px-6 py-4">
                                                        <img src="{{ asset('storage/imagen/' . $funcion->imagen) }}"
                                                            alt="Imagen de la película" width="100">
                                                    </td>
                                                    <td class="px-6 py-4">{{ $funcion->numero_reservas }}</td>
                                                    <td class="px-6 py-4">
                                                        <div class="flex justify-center items-center">
                                                            <!--Ver Funcion -->
                                                            <a href="{{ route('funciones.show', $funcion->id) }}"
                                                                class="mr-3 rounded bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4">Ver
                                                                Detalles</a>
                                                            <!-- Editar -->
                                                            <a href="{{ route('funciones.edit', $funcion->id) }}"
                                                                class="rounded bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4">Editar
                                                                Funcion</a>
                                                            <!-- Borrar -->
                                                            <form
                                                                action="{{ route('funciones.destroy', $funcion->id) }}"
                                                                method="POST" class="formEliminar"
                                                                data-titulo="{{ $funcion->titulo }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="ml-3 rounded bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4">Eliminar
                                                                    Funcion</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>

                                </table>
                                <div>
                                    {{ $funciones->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    (function() {
        'use strict';
        // Fetch all the forms we want to apply custom validation to
        var forms = document.querySelectorAll('.formEliminar');
        Array.prototype.slice.call(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                event.stopPropagation();

                var tituloFuncion = this.dataset.titulo;

                Swal.fire({
                    title: '¿Desea eliminar la función?',
                    text: 'Titulo de la funcion: ' + tituloFuncion,
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#20c997',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Confirmar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                        Swal.fire('¡Ha sido eliminado!',
                            'La función ha sido eliminada correctamente.', 'success');
                    }
                });
            }, false);
        });
    })();
</script>
