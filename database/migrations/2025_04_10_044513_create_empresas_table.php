<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();      // Título opcional
            $table->text('content')->nullable();        // Contenido general
            $table->string('image')->nullable();        // Ruta de la imagen principal
            $table->text('mission')->nullable();        // Misión
            $table->text('vision')->nullable();         // Visión
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
