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
            if (!Schema::hasColumn('trainers', 'user_id')) {
            $table->unsignedBigInteger('user_id')->unique()->after('id'); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            } 
        
        });
    }
    Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_tariner', function (Blueprint $table) {
            //
        });
    }
};
