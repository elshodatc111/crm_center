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

    public function __construct(int $user_id, string $type, ?int $admin_id = null) {
        $this->user_id = $user_id;
        $this->type = $type;
        $this->admin_id = $admin_id;
    }

    public function handle(): void {
        $Setting = Setting::first();
        if (!$Setting || !$Setting->message_status) {
            return;
        }

        $User = User::find($this->user_id);
        if (!$User) {
            return;
        }

        $phone = preg_replace('/\D/', '', $User->phone1);
        $text = null;

        if ($this->type == 'new_student_sms' && $Setting->new_student_sms == 1) {
            $text = "Hurmatli {$User->user_name}, siz bizning ".config('app.name')." o'quv markazimizga tashrifingizdan xursandmiz. 
            Sizning login: {$User->email}, Parol: password. Websayt: ".config('app.url');
        } elseif ($this->type == 'new_hodim_sms' && $Setting->new_hodim_sms == 1) {
            $text = "Hurmatli {$User->user_name}, siz bizning ".config('app.name')." o'quv markazimizga ishga olindingiz. 
            Sizning login: {$User->email}, Parol: password. Websayt: ".config('app.url');
        } elseif ($this->type == 'update_pass_sms' && $Setting->update_pass_sms == 1) {
            $text = "Hurmatli {$User->user_name}, ".config('app.name')." o'quv markazi shaxsiy profilingiz paroli qayta tiklandi. 
            Sizning login: {$User->email}, Parol: password. Websayt: ".config('app.url');
        }

        if (!$text) {
            return;
        }

        Log::info("SMS yuborilmoqda: $phone -> $text");

        $smsService = new SmsService();
        $response = $smsService->sendSms($phone, $text);

        if (is_array($response) && isset($response['status']) && $response['status'] == 'waiting') {
            $this->saveSmsHistory($phone, $text, $this->admin_id);
        } else {
            Log::error("SMS jo‘natishda xatolik: " . json_encode($response));
        }
    }

    private function saveSmsHistory(string $phone, string $message, ?int $admin_id = null): void {
        SendMessage::create([
            'phone' => $phone,
            'message' => $message,
            'user_id' => $admin_id,
        ]);
    }
}
