<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocalIdConstraintToCartasTable extends Migration
{
    public function up()
    {
        Schema::table('cartas', function (Blueprint $table) {
            // Agregar la columna sólo si no existe (opcional)
            if (!Schema::hasColumn('cartas', 'local_id')) {
                $table->unsignedBigInteger('local_id')->nullable()->after('id');
            }
            // Agregar la llave foránea
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
