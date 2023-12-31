<!-- resources/views/funciones/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de la función') }}
        </h2>
    </x-slot>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2"></script>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mx-auto p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h1 class="text-3xl font-bold">{{ $funcion->titulo }}</h1>
                            <p class="text-gray-600">{{ $funcion->descripcion }}</p>
                            <p><strong>Fecha de la función:</strong> {{ $funcion->fecha }}</p>
                            <p><strong>Horario:</strong> {{ $funcion->hora }}</p>
                            <p><strong>Número total de reservas:</strong> {{ $funcion->numero_reservas }}</p>
                            <p><strong>Asientos disponibles:</strong> {{ $asientosDisponibles }}</p>
                        </div>
                        <div>
                            @if ($funcion->imagen)
                                <img class="image mx-auto" src="{{ '/storage/imagen/' . $funcion->imagen }}"
                                    alt="Imagen de la función" width="520">
                            @else
                                <p>No se ha cargado una imagen para esta película.</p>
                            @endif
                        </div>
                    </div>
                    <div class="mt-4 flex justify-center">
                        <form action="{{ route('funciones.destroy', $funcion->id) }}" method="POST"
                            class="formEliminar" data-titulo="{{ $funcion->titulo }}">
                            @csrf
                            @method('DELETE')
                            <div class="space-x-2">
                                <a href="{{ route('funciones.index') }}"
                                    class="rounded bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 md-1">Volver</a>
                                <a href="{{ route('funciones.edit', $funcion->id) }}"
                                    class="rounded bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4">Editar Función</a>
                                <button type="submit"
                                    class="rounded bg-red-600 hover:bg-red-600 text-white font-bold py-2 px-4 mt-4">Eliminar Función</button>
                            </div>
                        </form>
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
                    text: 'Titulo de la función: ' + tituloFuncion,
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
