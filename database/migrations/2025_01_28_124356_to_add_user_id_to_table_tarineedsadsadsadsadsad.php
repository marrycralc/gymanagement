<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('trainer_trainee', function (Blueprint $table) {
            // Drop the old foreign keys
            $table->dropForeign(['trainer_user_id']);
            $table->dropForeign(['trainee_user_id']);
            
            // Modify columns to make them nullable
            $table->unsignedBigInteger('trainer_user_id')->nullable()->change();
            $table->unsignedBigInteger('trainee_user_id')->nullable()->change();
            
            // Add the new foreign keys with nullable columns
            $table->foreign('trainer_user_id')->references('user_id')->on('trainers')->onDelete('cascade');
            $table->foreign('trainee_user_id')->references('user_id')->on('trainee')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('trainer_trainee', function (Blueprint $table) {
            // Drop the new foreign keys
            $table->dropForeign(['trainer_user_id']);
            $table->dropForeign(['trainee_user_id']);
            
            // Revert columns to not nullable
            $table->unsignedBigInteger('trainer_user_id')->nullable(false)->change();
            $table->unsignedBigInteger('trainee_user_id')->nullable(false)->change();
            
            // Revert back to the old foreign keys (if needed)
            $table->foreign('trainer_user_id')->references('id')->on('trainers')->onDelete('cascade');
            $table->foreign('trainee_user_id')->references('id')->on('trainee')->onDelete('cascade');
        });
    }
};  
