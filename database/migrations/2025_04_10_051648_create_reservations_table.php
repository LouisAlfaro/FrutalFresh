<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('sede')->nullable();
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->integer('numero_personas')->nullable();
            $table->string('tipo_contacto')->nullable(); // Ejemplo: Teléfono o Email
            $table->string('contacto')->nullable();      // Valor del contacto
            $table->string('motivo')->nullable();
            $table->text('mensaje')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
