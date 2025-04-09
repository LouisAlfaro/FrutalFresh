<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGooglemapsWhatsappToLocalsTable extends Migration
{
    public function up()
    {
        Schema::table('locals', function (Blueprint $table) {
            $table->string('googlemaps')->nullable()->after('descripcion');
            $table->string('whatsapp')->nullable()->after('googlemaps');
        });
    }

    public function down()
    {
        Schema::table('locals', function (Blueprint $table) {
            $table->dropColumn(['googlemaps', 'whatsapp']);
        });
    }
}
