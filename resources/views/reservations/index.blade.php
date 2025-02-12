<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Reservas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-gray-900 text-white py-4">
        <div class="container mx-auto flex justify-between items-center px-4">
            <div class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 mr-3">
                <h1 class="text-3xl font-bold">Khalas Solutions</h1>
            </div>
        </div>
    </header>

    <section class="py-12 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-8">Listado de Reservas</h2>
            <table class="table-auto w-full bg-white shadow-lg rounded">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Correo</th>
                        <th class="px-4 py-2">Teléfono</th>
                        <th class="px-4 py-2">Idioma</th>
                        <th class="px-4 py-2">Fecha de Reserva</th>
                        <th class="px-4 py-2">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        <tr class="text-center">
                            <td class="border px-4 py-2">{{ $reservation->name }}</td>
                            <td class="border px-4 py-2">{{ $reservation->email }}</td>
                            <td class="border px-4 py-2">{{ $reservation->phone }}</td>
                            <td class="border px-4 py-2">{{ $reservation->language }}</td>
                            <td class="border px-4 py-2">{{ $reservation->reservation_date }}</td>
                            <td class="border px-4 py-2">{{ $reservation->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <footer class="bg-gray-900 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 Khalas Solutions. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
