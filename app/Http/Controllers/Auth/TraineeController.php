<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Auth\Controller; 
use Illuminate\Support\Facades\Auth;
use App\Models\Trainee;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;

class TraineeController extends Controller
{
    public function __construct()
    {
      
        $this->middleware('auth');
    }


    public function trainee()
    {

    $trainers = Trainer::all();
    $trainerss = Trainee::with('traineeralation')->find(1);
  
  
    return view('trainee', compact('trainers', 'trainerss'));


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
        $User = User::find(2);
        $User->info_status = 'active';
        $User->save();
        $trainee->save();
        
        return redirect()->back()->with('success', 'Trainee record saved successfully!');
    }

    public function invitationtotrainer(Request $request)
    {
        $trainer_id = [1,2];
        $trainee_id = 1; 
    
        $trainee = Trainee::find($trainee_id);
        if (!$trainee) {
            return response()->json(['error' => 'Trainee not found'], 404);
        }
    
      
        $trainee->traineeralation()->sync($trainer_id);
      
    
        return response()->json(['success' => 'Invitations sent to trainers successfully!']);
    }
    
}
