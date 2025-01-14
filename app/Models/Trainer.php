<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{

    public $timestamps = false;
    protected $dateFormat = 'U';
    protected $table = 'trainers';

    public function trainerralation()
    {
        return $this->belongsToMany(Trainee::class);
    }
}
