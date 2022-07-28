<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeBrandProductsColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('brand_products', function (Blueprint $table) {
            $table->string('subcategory_ids')->nullable()->change();
            $table->string('subcategory_names')->nullable()->change();
            $table->integer('strain_id')->nullable()->change();
            $table->integer('genetic_id')->nullable()->change();
            $table->integer('thc_percentage')->change();
            $table->integer('cbd_percentage')->change();
            $table->boolean('status')->default(1)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('brand_products', function (Blueprint $table) {
            //
        });
    }
}
