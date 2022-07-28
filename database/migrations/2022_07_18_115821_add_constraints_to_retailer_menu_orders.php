<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintsToRetailerMenuOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('retailer_menu_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('retailer_id')->change();

            $table->foreign('retailer_id')->references('id')->on('businesses')->onDelete('cascade')->change();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('retailer_menu_orders', function (Blueprint $table) {
            $table->dropForeign(['retailer_id']);
        });
    }
}
