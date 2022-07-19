<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecondvideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secondvideos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('secondvideo_id')->nullable();
            $table->integer('subject_count')->nullable();
            $table->string('class');
            $table->string('subject');
            $table->string('video')->nullable();
            $table->string('topic')->nullable();
            $table->string('description')->nullable();


            $table->string('photo')->nullable();
            $table->double('amount');
            $table->integer('view_count')->default(0);
            $table->date('deleted_at')->nullable();
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
        Schema::dropIfExists('secondvideos');
    }
}
