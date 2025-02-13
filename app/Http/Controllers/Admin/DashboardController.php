<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener estadísticas de reservas
        $totalReservations = Reservation::count();
        $pending = Reservation::where('status', 'pending')->count();
        $inProcess = Reservation::where('status', 'in_process')->count();
        $confirmed = Reservation::where('status', 'confirmed')->count();
        $cancelled = Reservation::where('status', 'cancelled')->count();

        // Obtener solo las reservas pendientes para mostrarlas en la tabla
        $pendingReservations = Reservation::where('status', 'pending')
            ->orderBy('reservation_date', 'asc')
            ->get();

        return view('admin.dashboard', compact(
            'totalReservations',
            'pending',
            'inProcess',
            'confirmed',
            'cancelled',
            'pendingReservations'
        ));
    }
}
