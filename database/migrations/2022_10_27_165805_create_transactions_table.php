<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string("type")->nullable();
            $table->string("payment_id")->nullable();
            $table->string("payment_status")->nullable();
            $table->string("pay_address")->nullable();
            $table->string("price_amount")->nullable();
            $table->string("pay_amount")->nullable();
            $table->string("order_id")->nullable();
            $table->string("order_description")->nullable();
            $table->string("purchase_id")->nullable();
            $table->string("smart_contract")->nullable();
            $table->string("expiration_estimate_date")->nullable();
            $table->tinyInteger("status")->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
