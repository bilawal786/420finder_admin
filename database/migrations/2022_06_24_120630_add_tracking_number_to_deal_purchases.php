<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrackingNumberToDealPurchases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deal_purchases', function (Blueprint $table) {
            $table->string('tracking_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deal_purchases', function (Blueprint $table) {
            $table->string('tracking_number');
        });
    }
}
