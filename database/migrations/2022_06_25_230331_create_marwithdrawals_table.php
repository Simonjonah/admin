<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarwithdrawalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marwithdrawals', function (Blueprint $table) {
            $table->id();
            $table->integer('franchise_id')->nullable();
            $table->integer('marketer_id')->nullable();
            $table->string('account_number')->nullable();
            $table->string('withdrawal_name')->nullable();
            $table->string('withdrawal_email')->nullable();
            $table->string('withdrawal_phone')->nullable();
            $table->string('withdrawal_amount')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_type')->nullable();
            $table->string('bank')->nullable();
            $table->string('markaspaid')->nullable();
            $table->enum('status', ['pending', 'Paid'])->default('pending'); // initiated completed and success
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
        Schema::dropIfExists('marwithdrawals');
    }
}
