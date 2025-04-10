<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('reservation_settings', function (Blueprint $table) {
            $table->id();
            $table->string('banner_10_20')->nullable();    // Texto para "10 a 20 personas"
            $table->string('banner_20_30')->nullable();    // Texto para "20 a 30 personas"
            $table->string('banner_30_plus')->nullable();  // Texto para "30 a más personas"
            $table->string('title_form')->nullable();      // Título del formulario, por ejemplo "Elige cuando realizar tu reserva"
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservation_settings');
    }
}
