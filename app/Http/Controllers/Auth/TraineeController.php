<?php

namespace App\Http\Controllers\Auth;

use App\Models\Trainee;
use Illuminate\Http\Request;
use Carbon\Carbon;
class TraineeController

{
    public function trainee()
    {
       return view('trainee');
    }

    public function traineedatarecored(Request $request)
    {
        $request_data = $request->validate([
            'trainee_name' => 'required|string',
            'trainee_email' => 'required|email',
            'trainee_age' => 'required|integer',
            'trainee_height' => 'required|numeric',
            'trainee_mobile' => 'required|string',
        ]);
        
        $trainee = new Trainee();
        $trainee->trainee_name = $request_data['trainee_name'];
        $trainee->trainee_email = $request_data['trainee_email']; 
        $trainee->trainee_age = $request_data['trainee_age'];
        $trainee->trainee_height = $request_data['trainee_height'];
        $trainee->trainee_number = $request_data['trainee_mobile'];
        $trainee->created_at = Carbon::now('Asia/Kolkata');  
        $trainee->updated_at = Carbon::now('Asia/Kolkata');
        $trainee->save();
        
        return redirect()->back()->with('success', 'Trainee record saved successfully!');
    }
}
