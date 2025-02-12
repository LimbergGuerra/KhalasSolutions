@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
<!-- SECCIÓN PRINCIPAL CON FONDO ESTÁTICO -->
<div class="relative w-full min-h-screen flex items-center justify-center bg-cover bg-center"
     style="background-image: url('{{ asset('images/hero.jpg') }}');">

    <!-- CONTENEDOR DEL FORMULARIO -->
    <div class="bg-black bg-opacity-70 p-8 rounded-2xl shadow-lg backdrop-blur-lg w-full max-w-md">
        
        <!-- LOGO -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-16">
        </div>

        <!-- FORMULARIO -->
        <h2 class="text-white text-center text-2xl font-bold mb-4">Iniciar Sesión</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- EMAIL -->
            <div class="mb-4">
                <label for="email" class="block text-white text-lg">Correo Electrónico</label>
                <input id="email" type="email" name="email" required autofocus autocomplete="username"
                    class="w-full p-3 rounded-lg bg-gray-800 text-white border border-gray-600 focus:ring-yellow-500">
                <x-input-error :messages="$errors->get('email')" />
            </div>

            <!-- CONTRASEÑA -->
            <div class="mb-4">
                <label for="password" class="block text-white text-lg">Contraseña</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="w-full p-3 rounded-lg bg-gray-800 text-white border border-gray-600 focus:ring-yellow-500">
                <x-input-error :messages="$errors->get('password')" />
            </div>

            <!-- RECORDAR SESIÓN -->
            <div class="flex items-center mb-4">
                <input id="remember_me" type="checkbox" name="remember"
                    class="h-4 w-4 text-yellow-500 border-gray-600 rounded focus:ring-yellow-400">
                <label for="remember_me" class="ml-2 text-white">Recuérdame</label>
            </div>

            <!-- BOTÓN DE INICIO -->
            <button type="submit"
                class="w-full bg-yellow-500 text-black font-bold py-3 rounded-lg hover:bg-yellow-400 transition-all">
                Iniciar Sesión
            </button>
        </form>
    </div>
</div>
@endsection
