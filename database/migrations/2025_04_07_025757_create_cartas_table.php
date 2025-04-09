<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddLocalIdToCartasTable extends Migration
{
    public function up()
    {
        // Agregar la columna local_id si no existe
        Schema::table('cartas', function (Blueprint $table) {
            if (!Schema::hasColumn('cartas', 'local_id')) {
                $table->unsignedBigInteger('local_id')->nullable()->after('id');
            }
        });

        // Actualiza los registros existentes: asigna null a local_id para evitar problemas con claves foráneas.
        DB::table('cartas')->update(['local_id' => null]);

        // Agregar la restricción de clave foránea
        Schema::table('cartas', function (Blueprint $table) {
            $table->foreign('local_id')->references('id')->on('locals')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('cartas', function (Blueprint $table) {
            $table->dropForeign(['local_id']);
            $table->dropColumn('local_id');
        });
    }
}
