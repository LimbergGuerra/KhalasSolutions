<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khalas Solutions - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- NAVBAR SUPERIOR -->
    <nav class="bg-gray-900 p-4 flex justify-between items-center">
        <!-- LOGO -->
        <div class="flex items-center space-x-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8">
            <span class="text-white font-bold text-xl">Khalas Solutions - Admin</span>
        </div>

        <!-- MENÚ DE USUARIO -->
        <div class="relative">
            <button id="userMenuButton" class="flex items-center space-x-2 text-white focus:outline-none">
                <img src="{{ asset('images/adminlg.png') }}" alt="Usuario" class="h-8 w-8 rounded-full">
                <span>{{ Auth::user()->name }}</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" 
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <!-- Menú desplegable -->
            <div id="userDropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden">
                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Perfil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-red-600 hover:bg-gray-200">
                        Cerrar Sesión
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- LAYOUT PRINCIPAL -->
    <div class="flex">
        <!-- BARRA LATERAL -->
        <aside class="w-64 bg-gray-900 text-white min-h-screen p-6">
            <h2 class="text-xl font-bold mb-4">Menú de Administración</h2>
            <nav>
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center px-4 py-3 mb-2 bg-gray-800 rounded hover:bg-gray-700">
                    📊 Dashboard
                </a>
                <a href="{{ route('admin.users.index') }}" 
                   class="flex items-center px-4 py-3 mb-2 bg-gray-800 rounded hover:bg-gray-700">
                    👥 Gestión de Usuarios
                </a>
                <a href="{{ route('admin.reservations.index') }}" 
                   class="flex items-center px-4 py-3 bg-gray-800 rounded hover:bg-gray-700">
                    📅 Gestión de Reservas
                </a>
            </nav>
        </aside>

        <!-- CONTENIDO PRINCIPAL -->
        <main class="flex-1 p-10">
            @yield('content')
        </main>
    </div>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-white text-center py-4 mt-10">
        &copy; 2025 Khalas Solutions. All Rights Reserved.
    </footer>

    <!-- SCRIPT PARA EL MENÚ DE USUARIO -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const userMenuButton = document.getElementById("userMenuButton");
            const userDropdown = document.getElementById("userDropdown");

            userMenuButton.addEventListener("click", function () {
                userDropdown.classList.toggle("hidden");
            });

            document.addEventListener("click", function (event) {
                if (!userMenuButton.contains(event.target) && !userDropdown.contains(event.target)) {
                    userDropdown.classList.add("hidden");
                }
            });
        });
    </script>

</body>
</html>

