<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'service',
        'phone',
        'phone_code',
        'country',
        'language',
        'reservation_date',
        'status',
    ];

    protected $casts = [
        'reservation_date' => 'datetime', // ✅ Convertir a objeto Carbon automáticamente
    ];
}
