<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('businesses', function (Blueprint $table) {
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('reviews_count')->nullable();
            $table->string('rating')->nullable();
            $table->string('introduction')->nullable();
            $table->string('monday_open')->nullable();
            $table->string('monday_close')->nullable();
            $table->string('tuesday_open')->nullable();
            $table->string('tuesday_close')->nullable();
            $table->string('wednesday_open')->nullable();
            $table->string('wednesday_close')->nullable();
            $table->string('thursday_open')->nullable();
            $table->string('thursday_close')->nullable();
            $table->string('friday_open')->nullable();
            $table->string('friday_close')->nullable();
            $table->string('saturday_open')->nullable();
            $table->string('saturday_close')->nullable();
            $table->string('sunday_open')->nullable();
            $table->string('sunday_close')->nullable();
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
            //
        });
    }
}
