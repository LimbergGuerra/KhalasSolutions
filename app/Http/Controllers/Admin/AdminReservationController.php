<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    /**
     * Actualizar el estado de una reserva.
     */
    public function update(Request $request, Reservation $reservation)
    {
        // Validar que el estado sea correcto
        $request->validate([
            'status' => 'required|in:pending,in_process,confirmed,cancelled',
        ]);

        // No permitir cambios si la reserva ya está cerrada
        if ($reservation->status === 'closed') {
            return redirect()->route('admin.dashboard')->with('error', 'No puedes modificar una reserva cerrada.');
        }

        // Actualizar el estado
        $reservation->update(['status' => $request->status]);

        return redirect()->route('admin.dashboard')->with('success', 'Reserva actualizada correctamente.');
    }

    /**
     * Eliminar una reserva.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Reserva eliminada correctamente.');
    }

    /**
     * Cambiar el estado de una reserva automáticamente.
     */
    public function updateStatus(Reservation $reservation)
    {
        // Definir el flujo de estados válidos
        $statusFlow = [
            'pending' => 'in_process',
            'in_process' => 'confirmed',
            'confirmed' => 'closed',
            'closed' => 'closed', // Una vez cerrado, no puede cambiar más
        ];

        // Obtener el próximo estado
        $nextStatus = $statusFlow[$reservation->status] ?? 'pending';

        // Actualizar el estado
        $reservation->update(['status' => $nextStatus]);

        return redirect()->route('admin.dashboard')->with('success', 'Estado de la reserva actualizado.');
    }
}
