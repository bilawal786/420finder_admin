<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintToDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('details', function (Blueprint $table) {
            $table->unsignedBigInteger('business_id')->change();
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade')->change();
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
        Schema::table('details', function (Blueprint $table) {
            $table->dropForeign(['business_id']);
        });
    }
}
