<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTopBusinessToBusinesses extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('businesses', function (Blueprint $table) {
            $table->boolean('top_business')->default(0)->nullable();
            $table->integer('order')->nullable();
            $table->string('icon')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('businesses', function (Blueprint $table) {
            $table->dropColumn('top_business');
            $table->dropColumn('order');
            $table->dropColumn('icon');
        });
    }
}
