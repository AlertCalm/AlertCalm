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
        Schema::create('meditations', function (Blueprint $table) {
            $table->id(); 
            $table->string('titulo'); 
            $table->enum('categoria', ['relajacion', 'respiracion', 'mindfulness', 'dormir', 'activación','otra']);
            $table->string('file_url'); 
            $table->time('duracion'); 
            $table->string('lenguaje')->default('es');  
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meditations');
    }
};
