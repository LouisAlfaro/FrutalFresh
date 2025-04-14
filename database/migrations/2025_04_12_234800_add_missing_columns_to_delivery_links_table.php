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
        if (!Schema::hasColumn('delivery_links', 'platform')) {
            $table->string('platform')->nullable();
        }
        if (!Schema::hasColumn('delivery_links', 'url')) {
            $table->string('url')->nullable();
        }
        if (!Schema::hasColumn('delivery_links', 'image')) {
            $table->string('image')->nullable();
        }
        if (!Schema::hasColumn('delivery_links', 'active')) {
            $table->boolean('active')->default(true);
        }
    });
}

public function down(): void
{
    Schema::table('delivery_links', function (Blueprint $table) {
        $table->dropColumn(['platform', 'url', 'image', 'active']);
    });
}

};
