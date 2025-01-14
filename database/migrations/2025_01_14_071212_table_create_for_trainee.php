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

        if (!Schema::hasTable('trainee')) {
        Schema::create('trainee', function (Blueprint $table) {
            $table->id();
            $table->string('trainee_name');
            $table->string('trainee_email');
            $table->integer('trainee_age');
            $table->float('trainee_height');
            $table->float('trainee_number');
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
