<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrimvideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primvideos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('primvideo_id')->nullable();
            $table->integer('subject_count')->nullable();
            $table->string('class')->nullable();
            $table->string('subject')->nullable();
            $table->string('video')->nullable();
            $table->string('photo')->nullable();
            $table->double('amount')->nullable();
            $table->string('prim_topic')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('primvideos');
    }
}
