<?php

namespace App\Http\Services;

class VoiceCreateAiService
{
    private $client;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    public function getAllVoices()
    {
        $response = $this->client->request('GET', 'https://voz-pra-video-api.fly.dev/api/ai-voices/list', [
            'headers' => [
                'Authorization' => env('VOICE_TOKEN_API'),
            ],
        ]);

        $voices = json_decode($response->getBody(), true);
        $voiceArray = [];
        foreach ($voices as $voice) {
            $voiceArray[] = [
                'id' => $voice['_id'],
                'name' => $voice['name'],
                'avatar' => $voice['avatar'],
                'audioPreview' => $voice['audioPreview'],
                'plan' => $voice['plan'],
            ];
        }

        return $voiceArray;
    }

    public function getAllgeneratedaUDIOS()
    {
        $response = $this->client->request('GET', 'https://voz-pra-video-api.fly.dev/api/ai-voices/list', [
            'headers' => [
                'Authorization' => env('VOICE_TOKEN_API'),
            ],
        ]);

        $voices = json_decode($response->getBody(), true);
        $voiceArray = [];
        foreach ($voices as $voice) {
            $voiceArray[] = [
                'id' => $voice['_id'],
                'name' => $voice['name'],
                'avatar' => $voice['avatar'],
                'audioPreview' => $voice['audioPreview'],
                'plan' => $voice['plan'],
            ];
        }

        return $voiceArray;
    }
    public function generateAudio()
    {

//        $response = $this->client->request('POST', 'https://voz-pra-video-api.fly.dev/api/generations/make', [
//            'body' => '{
//              "text": "Gera um áudio com base no texto e na voz fornecidos",
//              "voiceId": "66bfcdce8cd07e227481d839",
//              "externalId": "teste",
//              "callbackUrl": "http://127.0.0.1:8000/teste",
//              "format": "MP3"
//            }',
//            'headers' => [
//                'Authorization' => env('VOICE_TOKEN_API'),
//                'Content-Type' => 'application/json',
//            ],
//        ]);

//        echo $response->getBody();
    }
}
