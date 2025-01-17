<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{

    public $timestamps = false;
    protected $dateFormat = 'U';
    protected $table = 'trainee';

    public function traineeralation()
    {
        return $this->belongsToMany(Trainer::class, 'transaction_history', 'trainee_id', 'trainer_id');
    }
    

}
