<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintsToDispensaryProductGalleries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('dispensery_product_galleries', function (Blueprint $table) {
            $table->unsignedBigInteger('dispensery_product_id')->change();

            $table->foreign('dispensery_product_id')->references('id')->on('dispensery_products')->onDelete('cascade')->change();
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
        Schema::table('dispensery_product_galleries', function (Blueprint $table) {
            $table->dropForeign(['dispensery_product_id']);
        });
    }
}
