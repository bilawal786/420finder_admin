<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApproveCustomIconToBusinesses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('businesses', function (Blueprint $table) {
            $table->boolean('approve')->default(0);
            $table->string('custom_icon')->nullable();
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
            $table->dropColumn('approve');
            $table->dropColumn('custom_icon');
        });
    }
}
