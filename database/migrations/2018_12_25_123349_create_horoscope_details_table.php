<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoroscopeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horoscope_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('raasi_sun')->nullable();
            $table->integer('raasi_moon')->nullable();
            $table->integer('raasi_mars')->nullable();
            $table->integer('raasi_mercury')->nullable();
            $table->integer('raasi_jupiter')->nullable();
            $table->integer('raasi_venus')->nullable();
            $table->integer('raasi_saturn')->nullable();
            $table->integer('raasi_raagu')->nullable();
            $table->integer('raasi_kethu')->nullable();
            $table->integer('raasi_lagna')->nullable();
            $table->integer('amsam_sun')->nullable();
            $table->integer('amsam_moon')->nullable();
            $table->integer('amsam_mars')->nullable();
            $table->integer('amsam_mercury')->nullable();
            $table->integer('amsam_jupiter')->nullable();
            $table->integer('amsam_venus')->nullable();
            $table->integer('amsam_saturn')->nullable();
            $table->integer('amsam_raagu')->nullable();
            $table->integer('amsam_kethu')->nullable();
            $table->integer('amsam_lagna')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horoscope_details');
    }
}
