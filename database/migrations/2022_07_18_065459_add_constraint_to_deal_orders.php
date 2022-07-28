<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintToDealOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('deal_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('retailer_id')->change();
            $table->unsignedBigInteger('deal_id')->change();

            $table->foreign('retailer_id')->references('id')->on('businesses')->onDelete('cascade')->change();
            $table->foreign('deal_id')->references('id')->on('deals')->onDelete('cascade')->change();
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
        Schema::table('deal_orders', function (Blueprint $table) {
            $table->dropForeign(['retailer_id']);
            $table->dropForeign(['deal_id']);
        });
    }
}
