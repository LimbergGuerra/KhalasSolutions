<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Permitir filtrar por estado (opcional)
        $statusFilter = $request->query('status');

        // Obtener reservas con filtro de estado si está presente
        $reservationsQuery = Reservation::latest();

        if ($statusFilter) {
            $reservationsQuery->where('status', $statusFilter);
        }

        // Paginación y carga de relaciones si existen (Ej: usuario)
        $reservations = $reservationsQuery->paginate(10);

        return view('admin.dashboard', compact('reservations'));
    }
}
