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
        Schema::create('business_opportunity_applications', function (Blueprint $table) {
            $table->id();
            $table->string('empresa')->nullable();
            $table->string('rubro')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->string('region')->nullable();
            $table->string('provincia')->nullable();
            $table->string('distrito')->nullable();
            $table->text('comentario')->nullable();
            $table->string('attachment')->nullable(); // Archivo subido
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_opportunity_applications');
    }
};
