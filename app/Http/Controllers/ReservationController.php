<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    /**
     * Muestra la lista de reservas.
     */
    public function index()
    {
        $reservations = Reservation::all(); // Obtiene todas las reservas
        return view('reservations.index', compact('reservations')); // Envía los datos a la vista
    }

    /**
     * Muestra el formulario para crear una nueva reserva.
     */
    public function create()
    {
        return view('reservations.create');
    }

    /**
     * Guarda una nueva reserva en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'service' => 'required|string|max:255',
            'country' => 'required|string|max:3',
            'phone_code' => 'required|string|max:10',
            'phone' => 'required|string|max:20',
            'reservation_date' => 'required|date',
        ]);

        // Crear una nueva reserva
        Reservation::create($request->all());

        // Redirigir a la lista de reservas con un mensaje de éxito
        return redirect()->route('reservations.index')->with('success', 'Reserva creada exitosamente.');
    }
}
