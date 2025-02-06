<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    public $timestamps = false;
    protected $dateFormat = 'U';
    protected $table = 'trainees';

    public function trainers()
    {
        return $this->belongsToMany(Trainer::class, 'trainers_trainees', 'trainee_user_id', 'trainer_user_id')
            ->withPivot('requirement', 'created_at', 'updated_at');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

