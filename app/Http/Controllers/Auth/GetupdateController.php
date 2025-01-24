<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Mail\getupdate;
use App\Order;
use Illuminate\Support\Facades\Mail;

class GetupdateController extends Controller
{
    public function mailupdate(Request $request)
    {
        $mailData = 'hello';
    try {
    
        Mail::to($request->email)->send(new GetUpdate($mailData));
    
        // return back()->with('success', 'Email sent successfully!');
    }
    catch (\Exception $e) {
        \Log::error('Mail sending failed: ' . $e->getMessage());
        return response()->json(['error' => $e->getMessage()], 500);
    }
    
    

}
}