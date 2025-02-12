<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation; // Asegúrate de importar el modelo

class ReservationController extends Controller
{
    // Método para mostrar el formulario
    public function create()
    {
        return view('reservations.create');
    }

    // Método para guardar los datos del formulario
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255', // Cambié a 'name' y otros campos
            'email' => 'required|email|max:255',
            'service' => 'required|string|max:255',
            'country' => 'required|string|max:3', // 'country' tiene un límite de 3 caracteres
            'phone_code' => 'required|string|max:10', // Validación para el código telefónico
            'phone' => 'required|string|max:20',
            'reservation_date' => 'required|date',
        ]);

        // Crear una nueva reserva en la base de datos
        Reservation::create([
            'name' => $request->name,
            'email' => $request->email,
            'service' => $request->service,
            'country' => $request->country,
            'phone_code' => $request->phone_code, // Guardando el código de teléfono
            'phone' => $request->phone,
            'reservation_date' => $request->reservation_date,
        ]);

        // Redireccionar con un mensaje de éxito
        return redirect()->route('reservations.create')->with('success', 'Reserva creada exitosamente.');
    }
}
