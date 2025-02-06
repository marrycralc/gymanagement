<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TrainerTrainee extends Pivot
{
    protected $table = 'trainer_trainee'; // Define the pivot table

    protected $fillable = ['requirement', 'created_at', 'updated_at']; // Specify pivot table columns

    public $timestamps = true; // Set timestamps if you want to use created_at/updated_at
}
