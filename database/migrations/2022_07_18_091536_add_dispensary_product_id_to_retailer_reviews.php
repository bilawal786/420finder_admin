<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDispensaryProductIdToRetailerReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('retailer_reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('dispensary_product_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('retailer_reviews', function (Blueprint $table) {
            $table->dropColumn('dispensary_product_id');
        });
    }
}
