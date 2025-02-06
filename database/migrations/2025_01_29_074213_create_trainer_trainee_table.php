<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('trainers')) {
        Schema::create('trainer_trainee', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trainer_user_id');
            $table->unsignedBigInteger('trainee_user_id');
            $table->string('requirement');
            $table->timestamps();

            // Define foreign keys to the user_id field of trainers and trainees
            $table->foreign('trainer_user_id')->references('user_id')->on('trainers')->onDelete('cascade');
            $table->foreign('trainee_user_id')->references('user_id')->on('trainee')->onDelete('cascade');
        });
    }
    }

    public function down()
    {
        Schema::dropIfExists('trainer_trainee');
    }
};
