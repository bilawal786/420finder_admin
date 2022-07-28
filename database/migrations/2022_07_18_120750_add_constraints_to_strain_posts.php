<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintsToStrainPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('strain_posts', function (Blueprint $table) {
            $table->unsignedBigInteger('genetic_id')->change();
            $table->unsignedBigInteger('strain_id')->change();

            $table->foreign('genetic_id')->references('id')->on('genetics')->onDelete('cascade')->change();
            $table->foreign('strain_id')->references('id')->on('strains')->onDelete('cascade')->change();
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
        Schema::table('strain_posts', function (Blueprint $table) {
            $table->dropForeign(['genetic_id']);
            $table->dropForeign(['strain_id']);
        });
    }
}
