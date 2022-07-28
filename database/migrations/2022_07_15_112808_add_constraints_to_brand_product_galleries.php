<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintsToBrandProductGalleries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('brand_product_galleries', function (Blueprint $table) {
            $table->unsignedBigInteger('brand_product_id')->change();

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
        Schema::table('brand_product_galleries', function (Blueprint $table) {
            $table->dropForeign(['brand_product_id']);
        });
    }
}
