@extends('layouts.admin')

@section('title', 'Panel de Administración')

@section('content')
<style>
    body {
        background-image: url('{{ asset('images/fondo.jpg') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
</style>

<div class="container mx-auto px-4 py-8 bg-white bg-opacity-80 rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Panel de Administración</h1>

    <!-- BOTONES DE GESTIÓN -->
    <div class="grid grid-cols-3 gap-6 mb-8">
        <a href="{{ route('admin.users.index') }}" class="p-6 bg-blue-600 text-white rounded-lg shadow-lg hover:bg-blue-700 transition">
            <h2 class="text-xl font-semibold">Gestión de Usuarios</h2>
            <p class="text-sm">Ver y administrar los usuarios del sistema.</p>
        </a>

        <a href="{{ route('admin.reservations.index') }}" class="p-6 bg-green-600 text-white rounded-lg shadow-lg hover:bg-green-700 transition">
            <h2 class="text-xl font-semibold">Gestión de Reservas</h2>
            <p class="text-sm">Ver y administrar las reservas de los usuarios.</p>
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="p-6 bg-red-600 text-white rounded-lg shadow-lg hover:bg-red-700 transition w-full">
                <h2 class="text-xl font-semibold">Cerrar Sesión</h2>
                <p class="text-sm">Salir del panel de administración.</p>
            </button>
        </form>
    </div>

    <!-- TABLA DE RESERVAS -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Lista de Reservas</h2>

        <div class="overflow-x-auto">
            <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Nombre</th>
                        <th class="px-4 py-3">Correo Electrónico</th>
                        <th class="px-4 py-3">Servicio</th>
                        <th class="px-4 py-3">Teléfono</th>
                        <th class="px-4 py-3">Fecha</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-100 text-gray-800">
                    @foreach ($reservations as $reservation)
                        <tr class="border-b border-gray-300">
                            <td class="px-4 py-2 text-center">{{ $reservation->id }}</td>
                            <td class="px-4 py-2 text-center">{{ $reservation->name }}</td>
                            <td class="px-4 py-2 text-center">{{ $reservation->email }}</td>
                            <td class="px-4 py-2 text-center">{{ ucfirst($reservation->service) }}</td>
                            <td class="px-4 py-2 text-center">{{ $reservation->phone_code }} {{ $reservation->phone }}</td>
                            <td class="px-4 py-2 text-center">{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d/m/Y') }}</td>
                            <td class="px-4 py-2 text-center">
                                <span class="px-2 py-1 rounded-full text-xs font-semibold
                                    @if ($reservation->status == 'pending') bg-yellow-500 text-black
                                    @elseif ($reservation->status == 'in_process') bg-blue-500 text-white
                                    @elseif ($reservation->status == 'confirmed') bg-green-500 text-white
                                    @else bg-red-500 text-white @endif">
                                    @if ($reservation->status == 'pending') Pendiente
                                    @elseif ($reservation->status == 'in_process') En proceso
                                    @elseif ($reservation->status == 'confirmed') Confirmado
                                    @else Cancelado @endif
                                </span>
                            </td>
                            <td class="px-4 py-2 text-center">
                                <!-- ✅ Formulario para cambiar estado -->
                                <form action="{{ route('admin.reservations.updateStatus', $reservation) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="status" value="next">
                                    <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded-lg text-sm hover:bg-blue-600">
                                        Cambiar Estado
                                    </button>
                                </form>

                                <!-- ✅ Botón para eliminar -->
                                <form action="{{ route('admin.reservations.destroy', $reservation) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg text-sm hover:bg-red-600"
                                        onclick="return confirm('¿Estás seguro de eliminar esta reserva?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if ($reservations->isEmpty())
                        <tr>
                            <td colspan="8" class="text-center py-4 text-gray-500">No hay reservas registradas.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
