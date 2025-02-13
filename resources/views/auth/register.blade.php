@extends('layouts.admin')

@section('title', 'Registrar Usuario')

@section('content')
<div class="relative w-full min-h-screen">
    <!-- Fondo Hero -->
    <style>
    body {
        background-image: url('{{ asset('images/fondo.jpg') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
</style>


    <!-- Contenedor del Formulario -->
    <div class="relative z-10 flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md bg-white bg-opacity-90 p-8 rounded-lg shadow-lg backdrop-blur-md border border-gray-300">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-6">Registrar Nuevo Usuario</h2>

            <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-4">
                @csrf

                <!-- Nombre -->
                <div>
                    <label for="name" class="block text-gray-700 font-semibold">Nombre</label>
                    <input id="name" type="text" name="name" required autofocus
                        class="w-full mt-1 p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                    @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Correo Electrónico -->
                <div>
                    <label for="email" class="block text-gray-700 font-semibold">Correo Electrónico</label>
                    <input id="email" type="email" name="email" required
                        class="w-full mt-1 p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                    @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Contraseña -->
                <div>
                    <label for="password" class="block text-gray-700 font-semibold">Contraseña</label>
                    <input id="password" type="password" name="password" required
                        class="w-full mt-1 p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                    @error('password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Confirmar Contraseña -->
                <div>
                    <label for="password_confirmation" class="block text-gray-700 font-semibold">Confirmar Contraseña</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="w-full mt-1 p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                    @error('password_confirmation') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Rol (Oculto, siempre "user") -->
                <input type="hidden" name="role" value="user">

                <!-- Botones -->
                

                    <button type="submit" 
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">
                        Registrar
                    </button>
                
            </form>
        </div>
    </div>
</div>
@endsection
