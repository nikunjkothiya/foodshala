<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFoodQtyToFoodOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('food_order', function (Blueprint $table) {
            $table->integer('qty')->default(1)->after('restaurant_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('food_order', 'qty')) {
            Schema::table('food_order', function (Blueprint $table) {
                $table->dropColumn('qty');
            });
        }
    }
}
