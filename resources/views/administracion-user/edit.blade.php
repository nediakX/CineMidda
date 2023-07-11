<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Control de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Editar Usuario') }}</h3>

                    <form action="{{ route('administracion-user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Campos del formulario para editar los datos del usuario -->
                        <div class="mb-4">
                            <label for="name"
                                class="block text-gray-700 text-sm font-bold mb-2">{{ __('Nombre') }}</label>
                            <input type="text" name="name" id="name" value="{{ $user->name }}"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                        </div>

                        <div class="mb-4">
                            <label for="email"
                                class="block text-gray-700 text-sm font-bold mb-2">{{ __('Email') }}</label>
                            <input type="email" name="email" id="email" value="{{ $user->email }}"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                        </div>

                        @if ($user->role === 'admin')
                            <div class="mb-4">
                                <label for="current_password"
                                    class="block text-gray-700 text-sm font-bold mb-2">{{ __('Contraseña anterior') }}</label>
                                <input type="password" name="current_password" id="current_password"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" placeholder="Ingrese la contraseña anterior">
                                @error('current_password')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        @endif


                        <div class="mb-4">
                            <label for="password"
                                class="block text-gray-700 text-sm font-bold mb-2">{{ __('Contraseña') }}</label>
                            <input type="password" name="password" id="password"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                                placeholder="Ingrese una nueva contraseña">
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation"
                                class="block text-gray-700 text-sm font-bold mb-2">{{ __('Confirmar Contraseña') }}</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                                placeholder="Confirmar Contraseña">
                        </div>


                        <div class="mb-4">
                            <label for="role"
                                class="block text-gray-700 text-sm font-bold mb-2">{{ __('Rol') }}</label>
                            <select name="role" id="role"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>
                                    {{ __('Usuario') }}</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                                    {{ __('Administrador') }}</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <button type="submit"
                                class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">{{ __('Guardar') }}</button>
                            <a href="{{ route('administracion-user.index') }}"
                                class="text-gray-500 hover:text-gray-700 ml-2">{{ __('Cancelar') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
