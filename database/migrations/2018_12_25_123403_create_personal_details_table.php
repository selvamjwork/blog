<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');            
            $table->string('gender')->length(10);
            $table->integer('age')->nullable();
            $table->integer('degree')->index()->default(0);
            $table->integer('profession')->index()->default(0);
            $table->integer('mother_tongue')->index()->default(0);
            $table->integer('district')->index()->default(0);
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('qualification')->nullable();
            $table->string('monthly_income')->nullable();
            $table->string('religion')->nullable();
            $table->string('gothram')->nullable();
            $table->integer('marital_status')->index()->default(0);
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
        Schema::dropIfExists('personal_details');
    }
}
