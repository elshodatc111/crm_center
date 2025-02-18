<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

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
            $response = Http::post("notify.eskiz.uz/api/auth/login", [
                'email' => 'MENEJER-77@MAIL.RU',
                'password' => 'oncq32Eg8mL0zEdrktW7vNB2amdNzwJtg2oKwJHS',
            ]);
            if ($response->successful()) {
                $token = $response['data']['token'];
                Cache::put('eskiz_api_token', $token, now()->addDays(30));
            } else {
                throw new \Exception('Eskiz API authentication failed');
            }
        }
        return $token;
    }
}
