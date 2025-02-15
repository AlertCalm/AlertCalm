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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // ID del usuario, lo crea Laravel automáticamente
            $table->string('name'); // Nombre del usuario (en vez de username)
            $table->string('email')->unique(); // Email (predeterminado en Laravel)
            $table->timestamp('email_verified_at')->nullable(); // Verificación de email (predeterminado en Laravel)
            $table->string('password'); // Contraseña (predeterminada en Laravel)
            $table->rememberToken(); // Token de "recordarme" (predeterminado en Laravel)
            $table->string('localizacion')->nullable(); // Localización personalizada
            $table->integer('edad')->nullable(); // Edad personalizada
            $table->text('preferencias')->nullable(); // Preferencias del usuario
            $table->string('lenguaje')->default('es'); // Lenguaje por defecto
            $table->timestamps(); // Campos de created_at y updated_at (predeterminados en Laravel)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

