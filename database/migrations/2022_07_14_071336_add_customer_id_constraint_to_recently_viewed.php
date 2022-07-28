<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomerIdConstraintToRecentlyViewed extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recently_vieweds', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->nullable()->change();
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recently_vieweds', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
        });
    }
}
