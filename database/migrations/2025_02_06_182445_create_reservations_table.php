<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->enum('service', ['education', 'visa', 'rent'])->default('education');
            $table->string('phone');
            $table->string('phone_code'); // Código del teléfono
            $table->string('country', 3); // Código del país (Ej: AE, US, ES)
            $table->string('language', 5)->default('es'); // Idioma preferido
            $table->dateTime('reservation_date');
            $table->enum('status', ['pending', 'in_process', 'confirmed', 'cancelled'])->default('pending'); // Se agregó "in_process"
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
