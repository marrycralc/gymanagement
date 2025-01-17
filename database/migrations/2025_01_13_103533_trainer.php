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
        if (!Schema::hasTable('trainers')) {
        Schema::create('trainers', function (Blueprint $table) {
            $table->id();
            $table->string('trainer_name');
            $table->string('traine_email');
            $table->integer('trainer_age');
            $table->float('trainer_height');
            $table->float('trainer_achievment');
            $table->timestamps();
        });
    }
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
