@extends('layouts.app')

@section('title', 'Nuestros Servicios')

@section('content')
    <section class="relative bg-cover bg-center min-h-screen flex items-center justify-center"
        style="background-image: url('{{ asset('images/hero.jpg') }}');">
        <div class="bg-gray-800 bg-opacity-90 p-8 rounded-xl shadow-lg max-w-4xl w-full mx-auto">
            <h2 class="text-3xl font-bold text-white text-center mb-6">Nuestros Servicios</h2>
            <p class="text-lg text-gray-200 mb-6 text-center">
                En Khalas Solutions, ofrecemos una variedad de servicios diseñados para hacer tu transición a Dubái lo más sencilla y eficiente posible. 
                Nuestros expertos te guiarán en cada paso del proceso para que puedas tomar decisiones informadas y comenzar tu nueva vida sin preocupaciones.
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Servicio 1 -->
                <div class="bg-gray-700 p-6 rounded-lg shadow-xl hover:shadow-2xl transition-all">
                    <h3 class="text-2xl font-semibold text-white mb-4">Educación</h3>
                    <p class="text-gray-300 mb-4">
                        Te ayudamos a encontrar las mejores opciones educativas en Dubái, desde universidades hasta cursos especializados, 
                        asegurándonos de que puedas acceder a la educación que se adapta a tus necesidades y expectativas.
                    </p>
                    <a href="#"
                        class="inline-block bg-yellow-500 text-black font-semibold py-2 px-4 rounded-lg hover:bg-yellow-400 transition-all">
                        Más Información
                    </a>
                </div>
                
                <!-- Servicio 2 -->
                <div class="bg-gray-700 p-6 rounded-lg shadow-xl hover:shadow-2xl transition-all">
                    <h3 class="text-2xl font-semibold text-white mb-4">Visas</h3>
                    <p class="text-gray-300 mb-4">
                        Nuestro equipo te asesora en el proceso de obtención de visas, ayudándote a elegir la opción adecuada para tu caso, 
                        ya sea visa de trabajo, de estudio o de residencia. Nos encargamos de todo el papeleo para que tú no tengas que preocuparte.
                    </p>
                    <a href="#"
                        class="inline-block bg-yellow-500 text-black font-semibold py-2 px-4 rounded-lg hover:bg-yellow-400 transition-all">
                        Más Información
                    </a>
                </div>
                
                <!-- Servicio 3 -->
                <div class="bg-gray-700 p-6 rounded-lg shadow-xl hover:shadow-2xl transition-all">
                    <h3 class="text-2xl font-semibold text-white mb-4">Rentas</h3>
                    <p class="text-gray-300 mb-4">
                        Encontramos el lugar perfecto para ti. Ya sea que necesites una propiedad para vivir, para alquilar a corto o largo plazo, 
                        nuestro equipo te ayudará a encontrar las mejores opciones de renta en Dubái, adaptadas a tu presupuesto y preferencias.
                    </p>
                    <a href="#"
                        class="inline-block bg-yellow-500 text-black font-semibold py-2 px-4 rounded-lg hover:bg-yellow-400 transition-all">
                        Más Información
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
