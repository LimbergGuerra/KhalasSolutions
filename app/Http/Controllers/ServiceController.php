<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Método para mostrar los servicios
    public function index()
    {
        return view('services'); // Retorna la vista 'services'
    }
}
