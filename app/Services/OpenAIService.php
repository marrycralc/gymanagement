<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenAIService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('OPENAI_API_KEY');
    }
	
		
    public function generateText($prompt)
    {
        $url = 'https://api.ai21.com/studio/v1/chat/completions';

        $data = [
            'model' => 'Jamba 1.5 Mini',
            'messages' => [
                ['role' => 'user', 'content' => $prompt]
            ],
            'file_ids' => [], 
            'max_segments' => 15,
            'retrieval_strategy' => 'segments',
            'retrieval_similarity_threshold' => 0,
            'max_neighbors' => 1,   
            'response_language' => 'english'
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type' => 'application/json',
        ])->post($url, $data);

        return $response->json();
    }
}
