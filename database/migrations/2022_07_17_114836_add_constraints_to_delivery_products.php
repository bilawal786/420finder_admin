<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintsToDeliveryProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('delivery_products', function (Blueprint $table) {
            $table->unsignedBigInteger('delivery_id')->change();
            $table->unsignedBigInteger('category_id')->change();
            $table->unsignedBigInteger('strain_id')->change();
            $table->unsignedBigInteger('genetic_id')->change();
            $table->unsignedBigInteger('brand_product_id')->change();

            $table->foreign('delivery_id')->references('id')->on('bussinesses')->onDelete('cascade')->change();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->change();
            $table->foreign('strain_id')->references('id')->on('strains')->onDelete('cascade')->change();
            $table->foreign('genetic_id')->references('id')->on('genetics')->onDelete('cascade')->change();
            $table->foreign('brand_product_id')->references('id')->on('brand_products')->onDelete('cascade')->change();
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
        Schema::table('delivery_products', function (Blueprint $table) {
            $table->dropForeign(['delivery_id']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['strain_id']);
            $table->dropForeign(['genetic_id']);
            $table->dropForeign(['brand_product_id']);
        });
    }
}
