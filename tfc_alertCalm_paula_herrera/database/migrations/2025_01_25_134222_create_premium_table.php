<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('premium', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');  // Clave foránea referenciando a la tabla users
            $table->boolean('activo')->default(true);  // Estado de la suscripción
            $table->timestamp('fecha_inicio'); 
            $table->timestamp('fecha_expiracion')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('premium');
    }
};
