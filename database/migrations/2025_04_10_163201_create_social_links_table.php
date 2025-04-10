<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialLinksTable extends Migration
{
    public function up()
    {
        Schema::create('social_links', function (Blueprint $table) {
            $table->id();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('x')->nullable();         // Para Twitter/X
            $table->string('linkedin')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('social_links');
    }
}
