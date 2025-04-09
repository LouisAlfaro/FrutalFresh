<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagenToLocalsTable extends Migration
{
    public function up()
    {
        Schema::table('locals', function (Blueprint $table) {
            // Agrega la columna 'imagen' que almacenará la ruta de la imagen, permite valores nulos
            $table->string('imagen')->nullable()->after('telefono');
        });
    }

    public function down()
    {
        Schema::table('locals', function (Blueprint $table) {
            // Elimina la columna en caso de revertir la migración
            $table->dropColumn('imagen');
        });
    }
}
