<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deal_purchases', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('deal_id');
            $table->string('total_price');
            $table->integer('qty');
            $table->string('status');
            $table->string('name_on_order');
            $table->string('phone_number');
            $table->string('name_on_id');
            $table->integer('id_type');
            $table->string('id_number');
            $table->string('delivery_address');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->string('note');
            $table->decimal('rating', 18, 2)->nullable();
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
        Schema::dropIfExists('deal_purchases');
    }
}
