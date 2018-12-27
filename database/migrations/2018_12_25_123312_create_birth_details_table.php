<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBirthDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('birth_details', function (Blueprint $table) 
        {            
            $table->increments('id');
            $table->integer('user_id');
            $table->string('dob')->nullable();
            $table->timestamp("tob")->nullable();
            $table->string('moonsign')->nullable();
            $table->string('pob')->nullable();
            $table->string('dosham')->nullable();
            $table->string('dosatype')->nullable();
            $table->integer('dasha_month')->nullable();
            $table->integer('dasha_day')->nullable();
            $table->integer('dasha_year')->nullable();
            $table->string('aboutyourself')->nullable();
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
        Schema::dropIfExists('birth_details');
    }
}
