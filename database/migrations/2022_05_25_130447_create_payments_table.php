<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('buyer_id')->nullable();
            $table->integer('franchise_id')->nullable();
            $table->integer('transaction_id')->nullable();
            $table->integer('marketer_id')->nullable();//user making transaction
            $table->integer('primvideo_id')->nullable();
            $table->integer('secondvideo_id')->nullable();
            $table->string('tx_ref')->nullable();
            $table->string('currency')->defualt('NGA')->nullable();
            $table->string('reference')->nullable();
            $table->string('redirect_url')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('subject');
            $table->string('video')->nullable();
            $table->string('email')->nullable();
            $table->float('amount', 10, 4);
            $table->float('fee')->nullable();
            $table->string('name')->nullable();
            $table->string('class');
            $table->string('marketer_share')->nullable();
            $table->string('marketer_name')->nullable();
            $table->string('marketer_email')->nullable();
            $table->string('marketer_phone')->nullable();
            $table->string('franchise_share')->nullable();
            $table->string('franchise_name')->nullable();
            $table->string('franchise_email')->nullable();
            $table->string('franchise_phone')->nullable();
            $table->string('slug')->nullable();
            $table->enum('type', ['credit', 'debit'])->default('debit');
            $table->string('payment_method')->nullable();
            $table->string('metadata')->nullable();
            $table->enum('status', ['pending', 'cancelled', 'declined', 'failed', 'completed'])->default('pending')->nullable();; // initiated, completed and payment failed, completed and success
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
        Schema::dropIfExists('payments');
    }
}
