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
        Schema::create('protocolos', function (Blueprint $table) {
            $table->id();  // Laravel asigna automáticamente 'id' como clave primaria
            $table->enum('tipo_emergencia', ['inundacion', 'terremoto', 'incendio', 'otro']);
            $table->text('descripcion_protocolo');
            $table->foreignId('alert_id')->constrained('alertas')->onDelete('cascade');  // Esto se encarga de la relación con 'alertas'
            $table->string('documento_url')->nullable();  // URL a un documento relacionado con el protocolo (PDF)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('protocolos');
    }
};
