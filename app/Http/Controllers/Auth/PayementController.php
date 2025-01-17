<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Trainer;

class PayementController
{
   public function viewtrainerdetail($id){

       $trainerdetail  = Trainer::find($id);
      

       return view('payment', ['id' => $id] ,compact('trainerdetail'));
   }
}
