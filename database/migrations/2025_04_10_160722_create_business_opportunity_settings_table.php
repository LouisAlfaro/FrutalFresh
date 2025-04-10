<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('business_opportunity_settings', function (Blueprint $table) {
        $table->id();
        $table->string('image')->nullable();  // Ruta de la imagen (editable en backoffice)
        $table->string('title')->nullable();  // Por si quieres un título opcional
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_opportunity_settings');
    }
};
