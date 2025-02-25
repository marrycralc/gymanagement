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
        if (Schema::hasTable('trainers')) {
        Schema::table('trainers', function (Blueprint $table) {  
            $table->string('trainer_achievment', 150)->change();
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('trainers')) {
        Schema::table('trainers', function (Blueprint $table) {
            //
        });
    }
    }
};
