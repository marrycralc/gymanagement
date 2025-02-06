<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trainers_trainees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trainer_user_id');
            $table->unsignedBigInteger('trainee_user_id');
            $table->string('requirement');
            $table->timestamps();

            // Define foreign keys to the user_id field of trainers and trainees
            $table->foreign('trainer_user_id')->references('id')->on('trainers')->onDelete('cascade');
            $table->foreign('trainee_user_id')->references('id')->on('trainees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainers_trainees');
    }
};
