<?php

namespace App\Http\Controllers\Auth;

use App\Models\Trainer;
use Illuminate\Http\Request;
use Carbon\Carbon;
class TrainerController
{
    public function trainer()
    {
    //   dd(Carbon::now('Asia/Kolkata')); 
        return view('trainer');
    }

    public function trainerdatarecored(Request $request)
    {
        $request_data = $request->validate([
            'trainer_name' => 'required|string',
            'trainer_email' => 'required|email',
            'trainer_age' => 'required|integer',
            'trainer_height' => 'required|numeric',
            'trainer_achievement' => 'required|string',
        ]);
    
        $trainer = new Trainer();
        $trainer->trainer_name = $request_data['trainer_name'];
        $trainer->traine_email = $request_data['trainer_email']; 
        $trainer->trainer_age = $request_data['trainer_age'];
        $trainer->trainer_height = $request_data['trainer_height'];
        $trainer->trainer_achievment = $request_data['trainer_achievement'];
        $trainer->created_at = Carbon::now('Asia/Kolkata');  
        $trainer->updated_at = Carbon::now('Asia/Kolkata');
        $trainer->save();
    
        return redirect()->back()->with('success', 'Trainer record saved successfully!');
    }
    
}

      


?>
