<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminReservationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas Públicas
|--------------------------------------------------------------------------
*/
Route::view('/', 'home')->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

// ✅ Servicios disponibles para todos los usuarios
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

// ✅ Reservas accesibles sin autenticación
Route::prefix('reservations')->name('reservations.')->group(function () {
    Route::get('/create', [ReservationController::class, 'create'])->name('create');
    Route::post('/', [ReservationController::class, 'store'])->name('store');
});

/*
|--------------------------------------------------------------------------
| Rutas Protegidas para Usuarios Registrados
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
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
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // ✅ Gestión de usuarios
    Route::resource('users', UserController::class);

    // ✅ Gestión de reservas
    Route::resource('reservations', AdminReservationController::class);

    // ✅ Actualización del estado de reservas (POST o PATCH)
    Route::match(['post', 'patch'], '/reservations/{reservation}/update-status', 
        [AdminReservationController::class, 'updateStatus'])->name('reservations.updateStatus');
});

/*
|--------------------------------------------------------------------------
| Rutas de Autenticación
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Redirección Automática después del Login
|--------------------------------------------------------------------------
*/
Route::get('/redirect-after-login', function () {
    return auth()->user()->is_admin
        ? redirect()->route('admin.dashboard')
        : redirect()->route('home');
})->middleware('auth')->name('redirect.after.login');

/*
|--------------------------------------------------------------------------
| Página no encontrada (Fallback)
|--------------------------------------------------------------------------
*/
Route::fallback(fn() => view('errors.404') ?? abort(404));
