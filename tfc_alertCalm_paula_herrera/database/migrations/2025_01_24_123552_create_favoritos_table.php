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
        Schema::create('favoritos', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('user_id'); //  como clave foránea
            $table->enum('tipo_fav', ['music', 'meditation']);
            $table->unsignedBigInteger('item_id'); // Relación con el ID del element favorito
            $table->timestamps();  
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Relacionando con `id` de `users`
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favoritos');
    }
};
