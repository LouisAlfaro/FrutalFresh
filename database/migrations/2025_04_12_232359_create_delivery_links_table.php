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
    Schema::create('delivery_links', function (Blueprint $table) {
        $table->id();
        $table->string('platform');         // Nombre de la plataforma (Rappi, PedidosYa)
        $table->string('url');              // Enlace para pedir online
        $table->string('image')->nullable();
         // Logo (ruta al archivo)
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_links');
    }
};
