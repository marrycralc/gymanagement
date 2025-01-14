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
        Schema::create('transaction_history', function (Blueprint $table) {  
            $table->unsignedBigInteger('trainer_id');
            $table->unsignedBigInteger('trainee_id');

            // Adding foreign key constraints
            $table->foreign('trainer_id')->references('id')->on('trainers')->onDelete('cascade');
            $table->foreign('trainee_id')->references('id')->on('trainee')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaction_history', function (Blueprint $table) {
            // Dropping foreign key constraints
            $table->dropForeign(['trainer_id']);
            $table->dropForeign(['trainee_id']);

            // Dropping the columns
            $table->dropColumn(['trainer_id', 'trainee_id']);
        });
    }
};
