@extends('layouts.admin')

@section('title', 'Panel de Reserva')

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
    <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Panel de Reserva</h1>

    <!-- FILTROS -->
    <div class="mb-4 flex flex-wrap justify-between items-center">
        <!-- FILTRO DE BÚSQUEDA -->
        <input type="text" id="searchInput" placeholder="Buscar reserva..." 
            class="px-4 py-2 border rounded-lg w-full max-w-lg shadow-md"
            onkeyup="filterTable()">

        <!-- FILTRO POR ESTADO -->
        <select id="statusFilter" class="px-4 py-2 border rounded-lg shadow-md ml-4" onchange="filterTable()">
            <option value="all">Todos</option>
            <option value="pending">Pendientes</option>
            <option value="in_process">En Proceso</option>
            <option value="confirmed">Confirmados</option>
            <option value="cancelled">Cancelados</option>
        </select>
    </div>

    <!-- TABLA DE RESERVAS -->
    <div class="bg-white p-6 rounded-lg shadow-lg overflow-x-auto">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Lista de Reservas</h2>

        <table class="w-full border border-gray-300 rounded-lg overflow-hidden" id="reservationsTable">
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
                    <tr class="border-b border-gray-300 text-center">
                        <td class="px-4 py-2">{{ $reservation->id }}</td>
                        <td class="px-4 py-2">{{ $reservation->name }}</td>
                        <td class="px-4 py-2">{{ $reservation->email }}</td>
                        <td class="px-4 py-2">{{ ucfirst($reservation->service) }}</td>
                        <td class="px-4 py-2">{{ $reservation->phone_code }} {{ $reservation->phone }}</td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d/m/Y') }}</td>
                        <td class="px-4 py-2 status-column" data-status="{{ strtolower($reservation->status) }}">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold whitespace-nowrap
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
                        <td class="px-4 py-2">
                            <form action="{{ route('admin.reservations.updateStatus', $reservation) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="px-3 py-1 rounded-lg text-sm bg-gray-200 border-none"
                                    onchange="this.form.submit()">
                                    <option value="pending" @if($reservation->status == 'pending') selected @endif>Pendiente</option>
                                    <option value="in_process" @if($reservation->status == 'in_process') selected @endif>En proceso</option>
                                    <option value="confirmed" @if($reservation->status == 'confirmed') selected @endif>Confirmado</option>
                                    <option value="cancelled" @if($reservation->status == 'cancelled') selected @endif>Cancelado</option>
                                </select>
                            </form>

                            @if(auth()->user()->role === 'admin')
    <!-- ✅ Botón habilitado solo para admin -->
    <form action="{{ route('admin.reservations.destroy', $reservation) }}" method="POST" class="inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg text-sm hover:bg-red-600"
            onclick="return confirm('¿Estás seguro de eliminar esta reserva?')">
            Eliminar
        </button>
    </form>
@else
    <!-- ❌ Botón deshabilitado para users -->
    <button class="bg-red-300 text-white px-3 py-1 rounded-lg text-sm opacity-50 cursor-not-allowed"
        onclick="return false;">
        Eliminar
    </button>
@endif

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

<!-- Script para Filtrar en la Tabla -->
<script>
    function filterTable() {
        let searchInput = document.getElementById("searchInput").value.toLowerCase();
        let statusFilter = document.getElementById("statusFilter").value;
        let table = document.getElementById("reservationsTable");
        let rows = table.getElementsByTagName("tr");

        for (let i = 1; i < rows.length; i++) {
            let row = rows[i];
            let text = row.innerText.toLowerCase();
            let statusCell = row.querySelector(".status-column"); // Busca la celda de estado
            let status = statusCell ? statusCell.getAttribute("data-status") : "";

            let matchesSearch = text.includes(searchInput);
            let matchesStatus = statusFilter === "all" || status === statusFilter;

            row.style.display = matchesSearch && matchesStatus ? "" : "none";
        }
    }
</script>

@endsection
