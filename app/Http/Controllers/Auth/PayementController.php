<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Trainer;
use App\Models\Paymentsmodel;

class PayementController
{
   public function viewtrainerdetail($id){

    
       $trainerdetail  = Trainer::find($id);
  
       return view('payment', ['id' => $id] ,compact('trainerdetail'));
   }

// process the data for checkout

      public function dataforcheck( Request $request){    

     //   dd($request);

        session([
            'trainer_id' =>   $request->trainer_id,
            'membership_id' => 1,
            'membershipprice' => 300,
            'membershipduration' => 30
        ]);
        $trainerId = session('trainer_id');
        $membershipId = session('membership_id');
        $membershipprice = session('membershipprice');
        $membershipduration = session('membershipduration');
    
        echo "Trainer ID: {$trainerId}, Membership ID: {$membershipId}";
        echo "membershipprice : {$membershipprice}, membershipprice : {$membershipduration}";

       
          
    return  view('checkout', compact('trainerId', 'membershipId', 'membershipprice', 'membershipduration'));

      }

    //   "_token" => "EGU8bS3Zf1lTlERV5XUdJ6ut3ogGYIQcVs6khMMg"
    //   "trainer_id" => "1"
    //   "fisrtmember" => "Submit"
    // ]
}