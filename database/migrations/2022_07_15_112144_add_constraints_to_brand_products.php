<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintsToBrandProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('brand_products', function (Blueprint $table) {
            $table->unsignedBigInteger('brand_id')->change();
            $table->unsignedBigInteger('category_id')->change();
            $table->unsignedBigInteger('strain_id')->change();
            $table->unsignedBigInteger('genetic_id')->change();

            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade')->change();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->change();
            $table->foreign('strain_id')->references('id')->on('strains')->onDelete('cascade')->change();
            $table->foreign('genetic_id')->references('id')->on('genetics')->onDelete('cascade')->change();
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
        Schema::table('brand_products', function (Blueprint $table) {
            $table->dropForeign(['brand_id']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['strain_id']);
            $table->dropForeign(['genetic_id']);
        });
    }
}
