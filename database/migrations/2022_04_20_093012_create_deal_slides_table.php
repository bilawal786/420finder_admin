<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deal_slides', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('slide');
            $table->string('display_type');
            $table->string('slide_radius');
            $table->string('url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deal_slides');
    }
}
