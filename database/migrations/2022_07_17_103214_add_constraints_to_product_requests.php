<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintsToProductRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('product_requests', function (Blueprint $table) {
            $table->unsignedBigInteger('retailer_id')->change();
            $table->unsignedBigInteger('brand_id')->change();

            $table->foreign('retailer_id')->references('id')->on('businesses')->onDelete('cascade')->change();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade')->change();
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
        Schema::table('product_requests', function (Blueprint $table) {
            $table->dropForeign(['retailer_id']);
            $table->dropForeign(['brand_id']);
        });
    }
}
