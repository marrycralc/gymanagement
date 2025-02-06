<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    public $timestamps = false;
    protected $dateFormat = 'U';
    protected $table = 'trainers';

    public function trainees() // Rename it to 'trainees' for clarity
    {
        return $this->belongsToMany(Trainee::class, 'trainers_trainees', 'trainer_user_id', 'trainee_user_id')
            ->withPivot('requirement', 'created_at', 'updated_at');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

