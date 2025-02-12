@extends('layouts.app')

@section('title', 'Reserva una Asesoría')

@section('content')
    <section class="relative bg-cover bg-center min-h-screen flex items-center justify-center" 
        style="background-image: url('{{ asset('images/hero.jpg') }}');">
        <div class="bg-gray-800 bg-opacity-90 p-8 rounded-xl shadow-lg max-w-lg w-full mx-auto">
            <h2 class="text-3xl font-bold text-white text-center mb-6">Completa tu Reserva</h2>
            <form action="{{ route('reservations.store') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Nombre Completo -->
                <div>
                    <label for="name" class="block text-lg font-bold text-gray-200 mb-2">Nombre Completo</label>
                    <input type="text" name="name" id="name" placeholder="Ingresa tu nombre completo" 
                        class="w-full p-3 border border-gray-600 rounded-lg bg-gray-700 text-white focus:ring-yellow-500" required>
                </div>

                <!-- Correo Electrónico -->
                <div>
                    <label for="email" class="block text-lg font-bold text-gray-200 mb-2">Correo Electrónico</label>
                    <input type="email" name="email" id="email" placeholder="Ingresa tu correo electrónico" 
                        class="w-full p-3 border border-gray-600 rounded-lg bg-gray-700 text-white focus:ring-yellow-500" required>
                </div>

                <!-- Servicio -->
                <div>
                    <label for="service" class="block text-lg font-bold text-gray-200 mb-2">Servicio</label>
                    <select name="service" id="service" 
                        class="w-full p-3 border border-gray-600 rounded-lg bg-gray-700 text-white focus:ring-yellow-500" 
                        {{ request('type') ? 'disabled' : '' }}>
                        <option value="education" {{ request('type') == 'education' ? 'selected' : '' }}>Educación</option>
                        <option value="visa" {{ request('type') == 'visa' ? 'selected' : '' }}>Visas</option>
                        <option value="rent" {{ request('type') == 'rent' ? 'selected' : '' }}>Rentas</option>
                    </select>
                    @if(request('type'))
                        <input type="hidden" name="service" value="{{ request('type') }}">
                    @endif
                </div>

                <!-- País -->
                <div>
                    <label for="country" class="block text-lg font-bold text-gray-200 mb-2">País</label>
                    <select name="country" id="country" onchange="updatePhoneCode()" 
                        class="w-full p-3 border border-gray-600 rounded-lg bg-gray-700 text-white focus:ring-yellow-500" required>
                        <option value="AE" data-code="+971">🇦🇪 Emiratos Árabes Unidos</option>
                        <option value="ES" data-code="+34">🇪🇸 España</option>
                        <option value="US" data-code="+1">🇺🇸 Estados Unidos</option>
                        <option value="MX" data-code="+52">🇲🇽 México</option>
                        <option value="AR" data-code="+54">🇦🇷 Argentina</option>
                        <option value="CO" data-code="+57">🇨🇴 Colombia</option>
                    </select>
                </div>

                <!-- Teléfono con Código -->
                <div>
                    <label for="phone" class="block text-lg font-bold text-gray-200 mb-2">Teléfono</label>
                    <div class="flex">
                        <input type="text" id="phone_code" name="phone_code" readonly 
                            class="w-1/4 p-3 border border-gray-600 rounded-l-lg bg-gray-700 text-gray-400">
                        <input type="text" id="phone" name="phone" placeholder="Ingresa tu número" 
                            class="w-3/4 p-3 border border-gray-600 rounded-r-lg bg-gray-700 text-white focus:ring-yellow-500" required>
                    </div>
                </div>

                <!-- Fecha de la Reserva -->
                <div>
                    <label for="reservation_date" class="block text-lg font-bold text-gray-200 mb-2">Fecha de la Reserva</label>
                    <input type="datetime-local" name="reservation_date" id="reservation_date" 
                        class="w-full p-3 border border-gray-600 rounded-lg bg-gray-700 text-white focus:ring-yellow-500" required>
                </div>

                <!-- Botón Enviar -->
                <div class="text-center">
                    <button type="submit" 
                        class="bg-yellow-500 text-black font-bold py-3 px-6 rounded-lg hover:bg-yellow-400 transition-all">
                        Reservar
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- Script para actualizar el código del país en el teléfono -->
    <script>
        function updatePhoneCode() {
            var countrySelect = document.getElementById("country");
            var phoneCodeInput = document.getElementById("phone_code");
            var selectedOption = countrySelect.options[countrySelect.selectedIndex];
            var phoneCode = selectedOption.getAttribute("data-code");

            phoneCodeInput.value = phoneCode;
        }

        // Establecer el código de país al cargar la página
        document.addEventListener("DOMContentLoaded", function () {
            updatePhoneCode();
        });
    </script>
@endsection
