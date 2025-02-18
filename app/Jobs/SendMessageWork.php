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
use Illuminate\Support\Facades\Auth;


class SendMessageWork implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user_id;
    public $type;

    public function __construct(int $user_id, string $type) {
        $this->user_id = $user_id;
        $this->type = $type;
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
        $phone = str_replace(' ', '', $User->phone1);
        $text = "SMS Xabar Yuborlimoqda";

        if ($Setting->message_status == 1) {
            if ($this->type == 'new_student_sms' && $Setting->new_student_sms == 1) {
                $this->sendSms($phone, $text);
            } elseif ($this->type == 'new_hodim_sms' && $Setting->new_hodim_sms == 1) {
                $this->sendSms($phone, $text);
            } elseif ($this->type == 'pay_student_sms' && $Setting->pay_student_sms == 1) {
                $this->sendSms($phone, $text);
            } elseif ($this->type == 'pay_hodim_sms' && $Setting->pay_hodim_sms == 1) {
                $this->sendSms($phone, $text);
            } elseif ($this->type == 'update_pass_sms' && $Setting->update_pass_sms == 1) {
                $this->sendSms($phone, $text);
            } elseif ($this->type == 'birthday_sms' && $Setting->birthday_sms == 1) {
                $this->sendSms($phone, $text);
            } else {
                return;
            }
        } else {
            return;
        }
    }
    private function sendSms(string $phone, string $message): void {
        $user = Auth::user();
        if (!$user) {
            \Log::error("Tizimga kirgan foydalanuvchi topilmadi.");
            return;
        }
        SendMessage::create([
            'phone' => $phone,
            'message' => $message,
            'user_id' => $user->id,
        ]);
        \Log::info("SMS jo'natildi: Telefon: {$phone}, Xabar: {$message}");
    }
}
