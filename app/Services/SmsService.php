<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SmsService{
    private string $server;
    private string $apiKey;

    public function __construct(){
        $this->server = env('SMS_SERVER', 'https://smsapp.uz/new');
        $this->apiKey = env('SMS_API_KEY', 'your_api_key_here');
    }

    public function sendSingleMessage($number, $message, $device = 0, $schedule = null, $isMMS = false, $attachments = '', $prioritize = false){
        $payload = [
            'number' => $number,
            'message' => $message,
            'device' => $device,
            'schedule' => $schedule,
            'isMMS' => $isMMS,
            'attachments' => $attachments,
            'prioritize' => $prioritize,
        ];

        return $this->sendRequest('/messages/send', $payload);
    }

    public function sendBulkMessages(array $messages, $option = 'use_specified', array $devices = [], $schedule = null, $useRandomDevice = false){
        $payload = [
            'messages' => $messages,
            'option' => $option,
            'devices' => $devices,
            'schedule' => $schedule,
            'useRandomDevice' => $useRandomDevice,
        ];

        return $this->sendRequest('/messages/send/bulk', $payload);
    }

    public function getMessageById($id){
        return $this->sendRequest("/messages/{$id}");
    }

    public function getBalance(){
        return $this->sendRequest('/account/balance');
    }

    private function sendRequest($endpoint, $data = []){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type' => 'application/json'
        ])->post($this->server . $endpoint, $data);

        if ($response->successful()) {
            return $response->json();
        }

        return ['error' => 'Request failed', 'status' => $response->status()];
    }
}
