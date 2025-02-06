<?php

namespace App\Http\Controllers\Auth;

use App\Services\OpenAIService;
use Illuminate\Http\Request;

class OpenAIController extends Controller
{
    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    public function index()
    {
        return view('opai');
    }

    public function generate(Request $request)
    {



        
        $request->validate([
            'prompt' => 'required|string|max:255',
        ]);

        // $prompt = $request->input('prompt');

        // Call the OpenAI service to generate text
        $response = $this->openAIService->generateText($request->prompt);
    //   dd($response);
        if (isset($response)) {
            if($request->prompt == 'what is your name?' || $request->prompt == 'what is your owner name' || $request->prompt == 'hi what is your name' || $request->prompt == 'what is your name' 
            || $request->prompt == 'what is your name'){
                $messageContent = "Hello !im gymmanagement servicer createde by sidharth and team";
            }
            else{
                $messageContent = $response['choices'][0]['message']['content'];
              
            }
     
        } else {
            echo "No error message found.";
        }
        
        // Return the API response
        return response()->json([
            'success' => true,
            'message' => $messageContent
        ]);
    }
}

