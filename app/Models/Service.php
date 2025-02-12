<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // Campos asignables en masa
    protected $fillable = [
        'name',
        'description',
    ];
    public function service()
{
    return $this->belongsTo(Service::class);
}

}


