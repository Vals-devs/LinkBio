<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GroqService
{
    protected string $apiKey;
    protected string $model;

    public function __construct()
    {
        $this->apiKey = env('GROQ_API_KEY', '');
        $this->model = 'llama-3.1-8b-instant';
    }

    public function generate($prompt, $systemPrompt = 'You are a helpful assistant.')
    {
        if (empty($this->apiKey) || $this->apiKey === 'gsk_IsiDenganApiKeyAndaYangTadi') {
            Log::info('Groq API Key not set. Using local mock generator.');
            return $this->getMockResponse($prompt);
        }

        try {
            Log::info('Calling Groq API with model ' . $this->model);
            
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ])->post('https://api.groq.com/openai/v1/chat/completions', [
                'model' => $this->model,
                'messages' => [
                    ['role' => 'system', 'content' => $systemPrompt],
                    ['role' => 'user', 'content' => $prompt],
                ],
                'temperature' => 0.7,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return $data['choices'][0]['message']['content'] ?? '';
            }

            Log::error('Groq API failed: ' . $response->body());
            return $this->getMockResponse($prompt);
        } catch (\Exception $e) {
            Log::error('Groq Service exception: ' . $e->getMessage());
            return $this->getMockResponse($prompt);
        }
    }

    protected function getMockResponse($prompt)
    {
        // Simple mock parser to return high quality bios/insights locally if API key fails/empty
        if (str_contains(strtolower($prompt), 'bio')) {
            return "Professional: [Name] is a results-driven Professional with key skills in web technology. Passionate about building modern applications that deliver value and create seamless user experiences.\n\nCreative: Hello! I am [Name], a creative thinker who turns complex problems into elegant solutions. Let's collaborate and bring ideas to life! 🚀";
        }
        
        return "Visitor patterns look very strong! Most of your traffic is coming from desktop referrers, and your links have healthy click-through rates. Keep promoting your page to grow your audience.";
    }
}
