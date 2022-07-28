<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('retailer_id')->change();
            $table->unsignedBigInteger('customer_id')->change();

            $table->foreign('retailer_id')->references('id')->on('bussinesses')->onDelete('cascade')->change();
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade')->change();

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
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['retailer_id']);
            $table->dropForeign(['customer_id']);
        });
    }
}
