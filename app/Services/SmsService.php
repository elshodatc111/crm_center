<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log; 
class SmsService{
    public $smsService;


    protected string $baseUrl = 'https://notify.eskiz.uz/api';

    public function sendSms(string $phone, string $message){
        $token = $this->getToken();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post("notify.eskiz.uz/api/message/sms/send", [
            'mobile_phone' => $phone,
            'message' => $message,
            'from' => '4546',
        ]);
        return $response->json();
    }

    public function getToken(){
        $token = Cache::get('eskiz_api_token');
        if (!$token) {
            Log::info(env('ESKIZ_EMAIL'));
            Log::info(env('ESKIZ_PASSWORD'));
            $response = Http::post("notify.eskiz.uz/api/auth/login", [
                'email' => env('ESKIZ_EMAIL'),
                'password' => env('ESKIZ_PASSWORD'),
            ]);
            Log::info($response);
            if ($response->successful()) {
                $token = $response['data']['token'];
                Cache::put('eskiz_api_token', $token, now()->addDays(25));
            } else {
                throw new \Exception('Eskiz API authentication failed');
            }
        }
        return $token;
    }
}
