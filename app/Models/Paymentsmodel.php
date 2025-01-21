<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paymentsmodel extends Model
{
    public function paymentrelation()
    {
        return $this->belongsToMany(Paymentsmodel::class, 'transaction_history', 'trainer_id', 'trainee_id');
    }
    
}
