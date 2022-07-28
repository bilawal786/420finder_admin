<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintsToFavoriteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('favorites', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->change();

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
        Schema::table('favorites', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
        });
    }
}
