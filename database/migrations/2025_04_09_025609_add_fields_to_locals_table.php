<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToLocalsTable extends Migration
{
    public function up()
    {
        Schema::table('locals', function (Blueprint $table) {
           
            $table->string('pdf_carta')->nullable()->after('whatsapp');
        });
    }

    public function down()
    {
        Schema::table('locals', function (Blueprint $table) {
            $table->dropColumn([ 'pdf_carta']);
        });
    }
}
