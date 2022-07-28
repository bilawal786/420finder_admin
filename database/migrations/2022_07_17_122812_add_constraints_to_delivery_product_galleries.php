<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintsToDeliveryProductGalleries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('delivery_product_galleries', function (Blueprint $table) {
            $table->unsignedBigInteger('delivery_product_id')->change();

            $table->foreign('delivery_product_id')->references('id')->on('delivery_products')->onDelete('cascade')->change();
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
        Schema::table('delivery_product_galleries', function (Blueprint $table) {
            $table->dropForeign(['delivery_product_id']);
        });
    }
}
