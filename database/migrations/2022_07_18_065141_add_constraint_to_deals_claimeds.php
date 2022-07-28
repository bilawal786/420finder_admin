<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintToDealsClaimeds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('deals_claimeds', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->change();
            $table->unsignedBigInteger('deal_id')->change();

            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade')->change();
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
        Schema::table('deals_claimeds', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
            $table->dropForeign(['deal_id']);

        });
    }
}
