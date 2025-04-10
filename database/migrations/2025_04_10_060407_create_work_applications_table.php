<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('work_applications', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('especialidad')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->string('region')->nullable();
            $table->text('experiencia')->nullable();
            $table->text('comentario')->nullable();
            $table->string('attachment')->nullable(); // Para almacenar el nombre o path del archivo (CV)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('work_applications');
    }
}
