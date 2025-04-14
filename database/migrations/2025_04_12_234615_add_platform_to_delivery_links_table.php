<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('delivery_links', function (Blueprint $table) {
        $table->string('platform')->after('id');
    });
}

public function down(): void
{
    Schema::table('delivery_links', function (Blueprint $table) {
        $table->dropColumn('platform');
    });
}

};
