<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalsTable extends Migration
{
    public function up()
    {
        Schema::create('locals', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');         // Nombre del local
            $table->string('direccion');      // Dirección del local
            $table->string('telefono')->nullable();  // Teléfono (opcional)
            $table->string('horario')->nullable();   // Horario (opcional)
            $table->text('descripcion')->nullable(); // Información adicional
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('locals');
    }
}
