<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminReservationController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas Públicas
|--------------------------------------------------------------------------
*/
Route::view('/', 'home')->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

/*
|--------------------------------------------------------------------------
| Rutas Protegidas para Usuarios Registrados
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

    // ✅ Rutas de reservas solo para usuarios autenticados
    Route::prefix('reservations')->name('reservations.')->group(function () {
        Route::get('/create', [ReservationController::class, 'create'])->name('create');
        Route::post('/', [ReservationController::class, 'store'])->name('store');
    });

    // ✅ Perfil del usuario
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
});

/*
|--------------------------------------------------------------------------
| Rutas Protegidas para Administrador
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard'); // ✅ Corrección: Nombre correcto

    // ✅ Gestión de usuarios
    Route::resource('users', UserController::class)->except(['create', 'store']);

    // ✅ Gestión de reservas
    Route::resource('reservations', AdminReservationController::class);

    // ✅ Ruta para actualizar el estado de la reserva
    Route::post('/reservations/{reservation}/update-status', [AdminReservationController::class, 'updateStatus'])
        ->name('reservations.updateStatus');
});

/*
|--------------------------------------------------------------------------
| Rutas de Autenticación
|--------------------------------------------------------------------------
*/
require_once __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Página no encontrada (Fallback)
|--------------------------------------------------------------------------
*/
Route::fallback(fn() => abort(404));
