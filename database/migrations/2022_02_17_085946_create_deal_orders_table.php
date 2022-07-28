<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deal_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('retailer_id');
            $table->integer('deal_id');
            $table->float('amount',8,2);
            $table->string('name_on_card')->nullable();
            $table->string('response_code')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('auth_id')->nullable();
            $table->string('message_code')->nullable();
            $table->integer('quantity');
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
        Schema::dropIfExists('deal_orders');
    }
}
