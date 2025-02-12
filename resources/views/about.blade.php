@extends('layouts.app')

@section('title', 'Sobre Nosotros')

@section('content')
    <section class="relative bg-cover bg-center min-h-screen flex items-center justify-center"
        style="background-image: url('{{ asset('images/hero.jpg') }}');">
        <div class="bg-gray-800 bg-opacity-90 p-8 rounded-xl shadow-lg max-w-3xl w-full mx-auto">
            <h2 class="text-3xl font-bold text-white text-center mb-6">Sobre Nosotros</h2>
            <p class="text-lg text-gray-200">
                Bienvenidos a Khalas Solutions, una empresa dedicada a brindar asesorías personalizadas para la migración a Dubái. 
                Contamos con un equipo de expertos con experiencia en diferentes áreas como educación, visas y alquileres. 
                Nuestro objetivo es hacer tu proceso de migración lo más sencillo y seguro posible.
            </p>
            <div class="mt-6">
                <h3 class="text-2xl font-semibold text-white mb-4">Nuestra Misión</h3>
                <p class="text-lg text-gray-200">
                    Ayudar a los profesionales, estudiantes y empresarios a establecerse en Dubái brindándoles servicios
                    especializados y asesoramiento detallado para que puedan tomar decisiones informadas.
                </p>
            </div>
            <div class="mt-6">
                <h3 class="text-2xl font-semibold text-white mb-4">Nuestra Visión</h3>
                <p class="text-lg text-gray-200">
                    Ser la empresa líder en asesorías de migración a Dubái, siendo reconocidos por nuestro enfoque personalizado y eficiente.
                </p>
            </div>
        </div>
    </section>
@endsection
