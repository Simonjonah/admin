<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('franchise_id')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('terms');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->float('balance')->default(0);
            $table->float('withdrawal')->default(0);
            $table->string('bankcode')->nullable();
            $table->string('account')->nullable();
            $table->string('approve_withdrawal')->nullable();
            $table->string('slug')->nullable();
            $table->string('marketer_count')->nullable()->default(0);
            $table->string('state')->nullable();
            $table->string('images')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('incards')->nullable();
            
            $table->string('referred_by')->nullable();
            $table->enum('status', ['pending', 'cancelled', 'declined', 'failed', 'completed'])->default('pending'); // initiated, completed and payment failed, completed and success
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('buyer_count')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * 
     *https://cpanel-s318.web-hosting.com
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marketers');
    }
}
