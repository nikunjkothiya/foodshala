<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->enum('role_id', ['1','2'])->nullable()->comment('1=Customers,2=Restaurants');
            $table->longText('address')->nullable();
            $table->bigInteger('mobile')->nullable();
            $table->string('email')->unique();
            $table->string('open_time')->nullable();
            $table->string('close_time')->nullable();
            $table->string('password');
            $table->enum('food_type', ['1','2','3'])->nullable()->comment('1=Veg,2=Non-veg,3=Both');
            $table->tinyInteger('is_active')->default(1);
            $table->timestamp('email_verified_at')->nullable();
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
