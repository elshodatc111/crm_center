<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\User;
use App\Models\SendMessage;
use App\Models\Setting;
use App\Services\SmsService;
use Illuminate\Support\Facades\Log;

class SendMessageWork implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user_id;
    public $type;
    public $admin_id;

    public function __construct(int $user_id, string $type, int $admin_id) {
        $this->user_id = $user_id;
        $this->type = $type;
        $this->admin_id = $admin_id;
    }

    public function handle(): void {
        $Setting = Setting::first();
        if (!$Setting) {
            return;
        }
        $User = User::find($this->user_id);
        if (!$User) {
            return;
        }
        $phone = str_replace('+','',str_replace(' ', '', $User->phone1));
        if ($Setting->message_status == 1) {
            if ($this->type == 'new_student_sms' && $Setting->new_student_sms == 1) {
                $text = "Hurmatli ".$User->user_name." Siz bizming ".env('APP_NAME')." o\'quv markazimizga tashrifingizdan hursandmiz. Sizning login: ".$User->email." Parol: password. websayt: ".env('APP_URL');
            } elseif ($this->type == 'new_hodim_sms' && $Setting->new_hodim_sms == 1) {
                $text = "Hurmatli ".$User->user_name." Siz bizming ".env('APP_NAME')." o\'quv markazimizga ishga olindingiz. Sizning login: ".$User->email." Parol: password. websayt: ".env('APP_URL');
            } elseif ($this->type == 'update_pass_sms' && $Setting->update_pass_sms == 1) {
                $text = "Hurmatli ".$User->user_name." ".env('APP_NAME')." o\'quv markazi shaxsiy profilingiz paroli qayta tiklandi. Sizning login: ".$User->email." Parol: password. websayt: ".env('APP_URL');
            } elseif ($this->type == 'birthday_sms' && $Setting->birthday_sms == 1) {
                $text = "Hurmatli ".$User->user_name." Sizni ".env('APP_NAME')." o\'quv markazi jamosi tug'ilgan kuningiz bilan tabriklaymiz. Kelgusi ishlaringizga omad tilaymiz. websayt: ".env('APP_URL');
            } else {
                return;
            }
        }
        Log::info($text);
        $smsService = new SmsService();
        $response = $smsService->sendSms($phone, $text);
        if ($response['status']=='waiting') {
            $this->saveSmsHistory($phone, $text, $this->admin_id);
        }else{
            Log::error("SMS jo'natishda xatolik: " . $response);
        }
    }

    private function saveSmsHistory(string $phone, string $message, int $admin_id): void {
        SendMessage::create([
            'phone' => $phone,
            'message' => $message,
            'user_id' => $admin_id,
        ]);
    }
}
