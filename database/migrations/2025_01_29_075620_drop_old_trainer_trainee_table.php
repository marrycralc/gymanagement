<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::dropIfExists('trainers_trainees');  // Drop the old table
    }

    public function down()
    {
        // Add logic to re-create the old table if needed (optional)
    }
};
