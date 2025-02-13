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
    .chart-container {
        width: 100%;
        max-width: 500px;
        height: 300px;
        margin: auto;
    }
</style>

<div class="container mx-auto px-4 py-8 bg-white bg-opacity-80 rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Panel de Administración</h1>

    <!-- SECCIÓN DE ESTADÍSTICAS -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-blue-500 text-white p-4 rounded-lg shadow-lg text-center">
            <h2 class="text-lg font-semibold">Total de Reservas</h2>
            <p class="text-3xl font-bold">{{ $totalReservations }}</p>
        </div>
        <div class="bg-yellow-500 text-black p-4 rounded-lg shadow-lg text-center">
            <h2 class="text-lg font-semibold">Pendientes</h2>
            <p class="text-3xl font-bold">{{ $pending }}</p>
        </div>
        <div class="bg-blue-400 text-white p-4 rounded-lg shadow-lg text-center">
            <h2 class="text-lg font-semibold">En Proceso</h2>
            <p class="text-3xl font-bold">{{ $inProcess }}</p>
        </div>
        <div class="bg-green-500 text-white p-4 rounded-lg shadow-lg text-center">
            <h2 class="text-lg font-semibold">Confirmados</h2>
            <p class="text-3xl font-bold">{{ $confirmed }}</p>
        </div>
    </div>

    <!-- GRÁFICOS -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <!-- Gráfico de distribución de reservas -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Distribución de Reservas</h2>
            <div class="chart-container">
                <canvas id="reservationsChart"></canvas>
            </div>
        </div>

        <!-- Gráfico de pendientes -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Reservas Pendientes</h2>
            <div class="chart-container">
                <canvas id="pendingChart"></canvas>
            </div>
        </div>
    </div>

    <!-- TABLA DE RESERVAS PENDIENTES -->
    <div class="bg-white p-6 rounded-lg shadow-lg overflow-x-auto">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Reservas Pendientes</h2>
        <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Nombre</th>
                    <th class="px-4 py-3">Correo Electrónico</th>
                    <th class="px-4 py-3">Teléfono</th>
                    <th class="px-4 py-3">Servicio</th>
                    <th class="px-4 py-3">Fecha</th>
                </tr>
            </thead>
            <tbody class="bg-gray-100 text-gray-800">
                @foreach ($pendingReservations as $reservation)
                    <tr class="border-b border-gray-300 text-center">
                        <td class="px-4 py-2">{{ $reservation->id }}</td>
                        <td class="px-4 py-2">{{ $reservation->name }}</td>
                        <td class="px-4 py-2">{{ $reservation->email }}</td>
                        <td class="px-4 py-2">{{ $reservation->phone_code }} {{ $reservation->phone }}</td>
                        <td class="px-4 py-2">{{ ucfirst($reservation->service) }}</td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
                @if ($pendingReservations->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-500">No hay reservas pendientes.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<!-- SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var ctx1 = document.getElementById('reservationsChart').getContext('2d');
        var reservationsChart = new Chart(ctx1, {
            type: 'doughnut',
            data: {
                labels: ['Pendientes', 'En Proceso', 'Confirmados', 'Cancelados'],
                datasets: [{
                    data: [{{ $pending }}, {{ $inProcess }}, {{ $confirmed }}, {{ $cancelled }}],
                    backgroundColor: ['#FACC15', '#3B82F6', '#10B981', '#EF4444'],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        var ctx2 = document.getElementById('pendingChart').getContext('2d');
        var pendingChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Pendientes'],
                datasets: [{
                    label: 'Reservas Pendientes',
                    data: [{{ $pending }}],
                    backgroundColor: '#FACC15'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection
