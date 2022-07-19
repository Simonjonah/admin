<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('franchise_id')->nullable();
            $table->foreignId('marketer_id')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->string('slug')->nullable();
            $table->string('buyer_count')->nullable()->default(0);
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('referred_by')->nullable();
            $table->string('marketed_by')->nullable();
            $table->string('state')->nullable();
            $table->string('images')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('incards')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('buyers');
    }
}
