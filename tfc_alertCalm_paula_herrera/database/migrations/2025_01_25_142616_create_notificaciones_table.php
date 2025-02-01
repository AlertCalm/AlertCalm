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
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Relación con la tabla 'users'
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->unsignedBigInteger('alert_id')->nullable(); // Relación con la tabla 'alertas', nullable
            $table->foreign('alert_id')->references('id')->on('alertas')->onDelete('set null');
        
            $table->text('mensaje'); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificaciones');
    }
};
