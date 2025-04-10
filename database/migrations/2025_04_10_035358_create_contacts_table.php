<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('attention_hours')->nullable(); // Ej. "12:00 pm a 11:00 pm"
            $table->string('phone')->nullable();           // Ej. "924 068 913"
            $table->string('email')->nullable();           // Ej. "jefecomercial@frutalfresh.com"
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
