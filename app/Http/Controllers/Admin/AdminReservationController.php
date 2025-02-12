<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    /**
     * Muestra la lista de reservas en el panel de administración.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Actualizar el estado de una reserva desde un formulario.
     */
    public function update(Request $request, Reservation $reservation)
    {
        // Validar que el estado sea un valor permitido
        $request->validate([
            'status' => 'required|string|in:pending,in_process,confirmed,closed,cancelled',
        ]);

        // Convertir el estado a minúsculas antes de guardarlo
        $reservation->update(['status' => strtolower($request->input('status'))]);

        return redirect()->back()->with('success', 'Reserva actualizada correctamente.');
    }

    /**
     * Eliminar una reserva.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->back()->with('success', 'Reserva eliminada correctamente.');
    }

    /**
     * Cambiar automáticamente el estado de una reserva.
     */
    public function updateStatus(Request $request, Reservation $reservation)
    {
        // Validar el estado
        $request->validate([
            'status' => 'required|string|in:pending,in_process,confirmed,closed,cancelled',
        ]);

        // Actualizar el estado de la reserva
        $reservation->update(['status' => strtolower($request->input('status'))]);

        return redirect()->back()->with('success', 'Estado de la reserva actualizado.');
    }
}
