<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStartingDateToDeals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deals', function (Blueprint $table) {
            $table->string('starting_date');
            $table->string('deal_price');
            $table->integer('tier_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deals', function (Blueprint $table) {
            $table->dropColumn('starting_date');
            $table->dropColumn('deal_price');
            $table->dropColumn('tier_id');
        });
    }
}
