<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintsToRetailOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('retail_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('brand_id')->change();
            $table->unsignedBigInteger('business_id')->change();

            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade')->change();
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade')->change();
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
        Schema::table('retail_orders', function (Blueprint $table) {
            $table->dropForeign(['brand_id']);
            $table->dropForeign(['business_id']);
        });
    }
}
