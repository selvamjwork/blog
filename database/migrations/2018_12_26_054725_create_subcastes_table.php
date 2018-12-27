<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcastes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subcaste_name');
            $table->integer('caste_id')->unsigned();
            $table->foreign('caste_id')->references('id')->on('castes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcastes');
    }
}
