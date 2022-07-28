<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContraintsToBrandFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('brand_feeds', function (Blueprint $table) {
            $table->unsignedBigInteger('business_id')->nullable()->change();
            $table->unsignedBigInteger('brand_id')->nullable()->change();

            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade')->change();
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
        Schema::table('brand_feeds', function (Blueprint $table) {
            $table->dropForeign(['business_id']);
            $table->dropForeign(['brand_id']);
        });
    }
}
