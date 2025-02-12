<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Primero, cambiar los valores incorrectos en la base de datos
        DB::statement("UPDATE reservations SET status = 'in_process' WHERE status = 'En proceso'");

        // Luego, modificar la estructura de la columna para aceptar 'in_process'
        Schema::table('reservations', function (Blueprint $table) {
            $table->enum('status', ['pending', 'in_process', 'confirmed', 'closed', 'cancelled'])
                  ->default('pending')
                  ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Restaurar los valores en la base de datos antes de cambiar la estructura
        DB::statement("UPDATE reservations SET status = 'En proceso' WHERE status = 'in_process'");

        // Restaurar la estructura original con 'En proceso'
        Schema::table('reservations', function (Blueprint $table) {
            $table->enum('status', ['pending', 'En proceso', 'confirmed', 'closed', 'cancelled'])
                  ->default('pending')
                  ->change();
        });
    }
};
