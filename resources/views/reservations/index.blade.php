<!DOCTYPE html>
<html lang="es">
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

            <!-- Mostrar mensajes de éxito/error -->
            @if(session('success'))
                <div class="bg-green-500 text-white text-center py-2 mb-4 rounded">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="bg-red-500 text-white text-center py-2 mb-4 rounded">{{ session('error') }}</div>
            @endif

            <table class="table-auto w-full bg-white shadow-lg rounded">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Correo</th>
                        <th class="px-4 py-2">Teléfono</th>
                        <th class="px-4 py-2">Idioma</th>
                        <th class="px-4 py-2">Fecha de Reserva</th>
                        <th class="px-4 py-2">Estado</th>
                        <th class="px-4 py-2">Acciones</th>
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
                            <td class="border px-4 py-2">
                                <span class="px-2 py-1 rounded {{ $reservation->status === 'pending' ? 'bg-yellow-500' : ($reservation->status === 'in_process' ? 'bg-blue-500' : ($reservation->status === 'confirmed' ? 'bg-green-500' : 'bg-red-500')) }} text-white">
                                    {{ $reservation->status }}
                                </span>
                            </td>
                            <td class="border px-4 py-2">
                                <!-- Formulario para actualizar estado -->
                                <form action="{{ route('admin.reservations.updateStatus', $reservation->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <select name="status" class="px-2 py-1 border rounded">
                                        <option value="pending" {{ $reservation->status === 'pending' ? 'selected' : '' }}>Pendiente</option>
                                        <option value="in_process" {{ $reservation->status === 'in_process' ? 'selected' : '' }}>En Proceso</option>
                                        <option value="confirmed" {{ $reservation->status === 'confirmed' ? 'selected' : '' }}>Confirmado</option>
                                        <option value="closed" {{ $reservation->status === 'closed' ? 'selected' : '' }}>Cerrado</option>
                                    </select>
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-3 py-1 rounded ml-2">Actualizar</button>
                                </form>

                                <!-- Formulario para eliminar reserva -->
                                <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de eliminar esta reserva?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white px-3 py-1 rounded ml-2">Eliminar</button>
                                </form>
                            </td>
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
