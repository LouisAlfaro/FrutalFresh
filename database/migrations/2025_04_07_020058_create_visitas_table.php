<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitasTable extends Migration
{
    public function up()
    {
        Schema::create('visitas', function (Blueprint $table) {
            $table->id();
            $table->string('ip')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('device')->nullable(); // Ej: móvil, escritorio, tablet
            $table->string('browser')->nullable();
            $table->timestamp('visitado_el')->useCurrent();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('visitas');
    }
}
