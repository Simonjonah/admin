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
            $table->integer('marketer_id')->nullable();//marketer making transaction
            $table->integer('franchise_id')->nullable();//franchise  making transaction
            $table->foreignId('transaction_id')->nullable();
            $table->integer('payment_id')->nullable();
            $table->string('tx_ref')->nullable();
            $table->string('currency')->default('NGA');
            $table->string('redirect_url')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('franchise_name')->nullable();
            $table->string('franchise_phone')->nullable();
            $table->string('franchise_email')->nullable();
            $table->string('marketer_name')->nullable();
            $table->string('marketer_phone')->nullable();
            $table->string('marketer_email')->nullable();
            $table->string('buyer_name')->nullable();
            $table->string('buyer_phone')->nullable();
            $table->string('buyer_email')->nullable();
            $table->string('video')->nullable();
            $table->float('amount', 10, 4);
            $table->float('franchise_share', 10, 4)->nullable();
            $table->float('marketer_share', 10, 4)->nullable();
            $table->enum('status', ['pending', 'cancelled', 'declined', 'failed', 'completed', 'success'])->default('pending'); // initiated, completed and payment failed, completed and success
            $table->float('fee')->nullable();
            $table->enum('type', ['withdrawal', 'deposit', 'transfer'])->default('withdrawal');
            $table->string('entity_type')->nullable();
            $table->string('entity_id')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('transactions');
    }
}
