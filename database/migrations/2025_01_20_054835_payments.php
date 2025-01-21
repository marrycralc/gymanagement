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
        if (!Schema::hasTable('payments')) {
            Schema::create('payments', function (Blueprint $table) {  
                $table->id();
            $table->string('transaction_id')->unique();;
            $table->decimal('amount', 10, 2)->default(0);
            $table->enum('payment_status', ['pending', 'success', 'failed'])->default('pending');
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
