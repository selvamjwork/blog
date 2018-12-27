<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->nullable()->unique();
            $table->string('password');
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('profile_pic')->default('default.jpg')->length(200);
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('mobile_verified')->default(false);
            $table->boolean('payment_completed')->default(0);
            $table->timestamp('payment_expired_on')->nullable();
            $table->boolean('profile_completed')->default(0);
            $table->boolean('active')->default(true);
            $table->boolean('admin_id')->default(0);
            $table->boolean('is_registered_online')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
