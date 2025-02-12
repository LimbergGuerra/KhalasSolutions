<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Khalas Solutions')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Eliminar márgenes y padding global */
        html, body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            min-height: 100%;
            background-color: #1a202c; /* Fondo global consistente */
        }

        /* Asegurar que todo el contenido respete el flujo */
        * {
            box-sizing: inherit;
        }

        /* Estilo del header para hacerlo fijo */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000; /* Asegura que el header esté encima de otros elementos */
            background-color: #1a202c; /* Fondo igual al del resto de la página */
        }

        /* Espacio adicional para el contenido debajo del header fijo */
        main {
            margin-top: 80px; /* Ajusta este valor según el tamaño de tu header */
        }

    </style>
</head>
<body class="bg-gray-900 text-white">
    <!-- Header -->
    <header class="bg-gray-900 text-white py-4">
        <div class="container mx-auto flex justify-between items-center px-4">
            <div class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 mr-3">
                <h1 class="text-3xl font-bold">Khalas Solutions</h1>
            </div>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="{{ route('home') }}" class="hover:text-yellow-500">HOME</a></li>
                    <li><a href="{{ route('services.index') }}" class="text-white hover:text-yellow-500">SERVICES</a></li>
                    <li><a href="{{ route('about.index') }}" class="text-white hover:text-yellow-500">ABOUT US</a></li>
                    <li><a href="#" class="hover:text-yellow-500">CONTACT</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Contenido Dinámico -->
    <main class="bg-gray-100">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 Khalas Solutions. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
