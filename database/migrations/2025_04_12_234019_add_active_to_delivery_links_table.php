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
            $table->boolean('active')->default(true);
        });
    }

public function down(): void
    {
        Schema::table('delivery_links', function (Blueprint $table) {
            $table->dropColumn('active');
        });
    }

};
