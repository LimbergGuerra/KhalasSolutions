@extends('layouts.app')

@section('title', 'Khalas Solutions')

@section('content')

<!-- SECCIÓN PRINCIPAL CON FONDO ESTÁTICO -->
<div class="relative w-full min-h-screen overflow-hidden">
    <!-- FONDO ESTÁTICO -->
    <div class="absolute top-0 left-0 w-full h-full bg-cover bg-center bg-fixed z-0" 
         style="background-image: url('{{ asset('images/hero.jpg') }}');">
    </div>

    <!-- CONTENIDO GENERAL -->
    <div class="relative z-10 flex flex-col items-center text-white text-center pt-32">
        <h1 class="text-6xl font-bold">Welcome to Dubai</h1>
        <p class="text-2xl mt-4">Experience the city of dreams with Khalas Solutions</p>

        <!-- BOTÓN PRINCIPAL DE RESERVA -->
        <a href="{{ route('reservations.create') }}" 
           class="mt-6 bg-yellow-500 text-black px-8 py-3 rounded-lg hover:bg-yellow-400 transition-all">
            Reserva tu asesoría
        </a>
    </div>

    <!-- TARJETAS DE SERVICIOS -->
    <div class="relative z-10 flex flex-col items-center mt-40 pb-32">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center max-w-screen-xl">

            <!-- TARJETA EDUCACIÓN -->
            <div class="bg-black bg-opacity-30 text-white p-8 rounded-2xl shadow-lg backdrop-blur-lg 
                        transform transition-transform duration-300 hover:scale-105">
                <img src="{{ asset('images/education-icon.png') }}" alt="Educación" class="h-24 mb-6 mx-auto">
                <h3 class="text-2xl font-bold mb-4">Educación</h3>
                <ul class="text-base leading-loose text-left">
                    <li>🌍 ¡Aprende Inglés en Dubái!</li>
                    <li>✨ Clases dinámicas y profesores expertos.</li>
                    <li>🎓 Certificaciones internacionales.</li>
                    <li>📍 Vive, estudia y crece en Dubái. 🚀</li>
                </ul>
                <a href="{{ route('reservations.create', ['type' => 'education']) }}"
                   class="mt-6 inline-block bg-yellow-500 text-black px-6 py-3 rounded-lg hover:bg-yellow-400 transition-all">
                    Reservar Asesoría
                </a>
            </div>

            <!-- TARJETA VISAS -->
            <div class="bg-black bg-opacity-30 text-white p-8 rounded-2xl shadow-lg backdrop-blur-lg 
                        transform transition-transform duration-300 hover:scale-105">
                <img src="{{ asset('images/visa-icon.png') }}" alt="Visas" class="h-24 mb-6 mx-auto">
                <h3 class="text-2xl font-bold mb-4">Visas</h3>
                <ul class="text-base leading-loose text-left">
                    <li>🌍 ¡Tu Visa para Dubái, Hecha a Tu Medida!</li>
                    <li>✔️ Visa Freelancer: trabaja de forma independiente.</li>
                    <li>✔️ Visa por Propiedad: invierte y obtén residencia.</li>
                    <li>✔️ Visa de Negocios: expande tu empresa globalmente.</li>
                </ul>
                <a href="{{ route('reservations.create', ['type' => 'visa']) }}"
                   class="mt-6 inline-block bg-yellow-500 text-black px-6 py-3 rounded-lg hover:bg-yellow-400 transition-all">
                    Reservar Asesoría
                </a>
            </div>

            <!-- TARJETA RENTAS -->
            <div class="bg-black bg-opacity-30 text-white p-8 rounded-2xl shadow-lg backdrop-blur-lg 
                        transform transition-transform duration-300 hover:scale-105">
                <img src="{{ asset('images/rent-icon.png') }}" alt="Rentas" class="h-24 mb-6 mx-auto">
                <h3 class="text-2xl font-bold mb-4">Rentas</h3>
                <ul class="text-base leading-loose text-left">
                    <li>🏡 ¡Encuentra tu Hogar Ideal en Dubái!</li>
                    <li>✅ Opciones para todos los presupuestos.</li>
                    <li>✅ Asesoría personalizada.</li>
                    <li>✅ Ubicaciones estratégicas y seguras.</li>
                </ul>
                <a href="{{ route('reservations.create', ['type' => 'rent']) }}"
                   class="mt-6 inline-block bg-yellow-500 text-black px-6 py-3 rounded-lg hover:bg-yellow-400 transition-all">
                    Reservar Asesoría
                </a>
            </div>

        </div>
    </div>
</div>

@endsection



