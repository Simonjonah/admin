<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFranchisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('franchises', function (Blueprint $table) {
        //Schema::create('franchises', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone');
            $table->string('terms');
            $table->string('username')->unique();
            $table->float('balance')->default(0);
            $table->float('withdrawal')->default(0);
            $table->string('bankcode')->nullable();
            $table->string('account')->nullable();
            $table->string('email')->unique();
            $table->string('approve_withdrawal')->nullable();
            $table->enum('type', ['withdrawal', 'deposit'])->default('withdrawal');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('slug')->nullable();
            
            $table->string('images')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('incards')->nullable();
            $table->string('franchise_state')->nullable();
            $table->string('marketer_count')->nullable()->default(0);
            $table->enum('status', ['pending', 'cancelled', 'declined', 'failed', 'completed'])->default('pending'); // initiated, completed and payment failed, completed and success
            $table->rememberToken();
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
        Schema::dropIfExists('franchises');
    }
}
