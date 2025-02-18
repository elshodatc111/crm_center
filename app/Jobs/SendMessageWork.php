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
        $phone = str_replace(' ', '', $User->phone1);
        if ($Setting->message_status == 1) {
            if ($this->type == 'new_student_sms' && $Setting->new_student_sms == 1) {
                $text = "SMS Xabar Yuborlimoqda";
                $this->sendSms($phone, $text, $this->admin_id);
            } elseif ($this->type == 'new_hodim_sms' && $Setting->new_hodim_sms == 1) {
                $text = "SMS Xabar Yuborlimoqda";
                $this->sendSms($phone, $text, $this->admin_id);
            } elseif ($this->type == 'pay_student_sms' && $Setting->pay_student_sms == 1) {
                $text = "SMS Xabar Yuborlimoqda";
                $this->sendSms($phone, $text, $this->admin_id);
            } elseif ($this->type == 'pay_hodim_sms' && $Setting->pay_hodim_sms == 1) {
                $text = "SMS Xabar Yuborlimoqda";
                $this->sendSms($phone, $text, $this->admin_id);
            } elseif ($this->type == 'update_pass_sms' && $Setting->update_pass_sms == 1) {
                $text = "SMS Xabar Yuborlimoqda";
                $this->sendSms($phone, $text, $this->admin_id);
            } elseif ($this->type == 'birthday_sms' && $Setting->birthday_sms == 1) {
                $text = "SMS Xabar Yuborlimoqda";
                $this->sendSms($phone, $text, $this->admin_id);
            } else {
                return;
            }
            // SMS yuborish logikasini tayyorlash kerak  // php artisan queue:work
            \Log::info("SMS jo'natishga tayyor: Telefon: {$phone}, Xabar: {$text}");
        } else {
            return;
        }
    }
    private function sendSms(string $phone, string $message, int $admin_id): void {
        SendMessage::create([
            'phone' => $phone,
            'message' => $message,
            'user_id' => $admin_id,
        ]);
    }
}
