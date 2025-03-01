<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\SendMessage;
use App\Models\Setting;
use App\Services\SmsService;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class SendBirthdaySms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, SerializesModels;

    private int $admin_id;

    public function __construct(?int $admin_id = 1)
    {
        $this->admin_id = $admin_id;
    }

    public function handle(): void
    {
        $today = Carbon::now()->format('Y-m-d');
        $setting = Setting::first();

        if (!$setting || $setting->birthday_sms != 1) {
            return;
        }

        $users = User::whereDate('birthday', $today)->get();
        $smsService = new SmsService();

        foreach ($users as $user) {
            Log::error("Tekshirilmoqda ");
            $phone = preg_replace('/\D/', '', $user->phone1);
            $text = "Hurmatli {$user->user_name}, " . config('app.name') . " o'quv markazi jamoasi sizni tug'ilgan kuningiz bilan tabriklaydi! Kelgusi ishlaringizga omad! Sayt: " . config('app.url');

            $response = $smsService->sendSms($phone, $text);

            if ($response['status'] === 'waiting') {
                $this->saveSmsHistory($phone, $text, $this->admin_id);
            } else {
                Log::error("SMS jo'natishda xatolik: " . json_encode($response));
            }
        }
    }

    private function saveSmsHistory(string $phone, string $message, int $admin_id): void{
        SendMessage::create([
            'phone' => $phone,
            'message' => $message,
            'user_id' => $admin_id,
        ]);
    }
}
