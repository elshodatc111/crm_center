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
            Log::error("SMS xatosi: Sozlamalar topilmadi.");
            return;
        }

        $User = User::find($this->user_id);
        if (!$User) {
            Log::error("SMS xatosi: Foydalanuvchi topilmadi.");
            return;
        }

        $phone = str_replace(' ', '', $User->phone1);
        if ($Setting->message_status == 1) {
            if ($this->type == 'new_student_sms' && $Setting->new_student_sms == 1) {
                $text = "SMS Xabar Yuborlimoqda";
            } elseif ($this->type == 'new_hodim_sms' && $Setting->new_hodim_sms == 1) {
                $text = "SMS Xabar Yuborlimoqda";
            } elseif ($this->type == 'pay_student_sms' && $Setting->pay_student_sms == 1) {
                $text = "SMS Xabar Yuborlimoqda";
            } elseif ($this->type == 'pay_hodim_sms' && $Setting->pay_hodim_sms == 1) {
                $text = "SMS Xabar Yuborlimoqda";
            } elseif ($this->type == 'update_pass_sms' && $Setting->update_pass_sms == 1) {
                $text = "SMS Xabar Yuborlimoqda";
            } elseif ($this->type == 'birthday_sms' && $Setting->birthday_sms == 1) {
                $text = "SMS Xabar Yuborlimoqda";
            } else {
                return;
            }
        }
        // SMS Yuborish
        $smsService = new SmsService();
        $response = $smsService->sendSingleMessage($phone, $text);

        if ($response['success']) {
            Log::info("SMS jo'natildi: Telefon: {$phone}, Xabar: {$text}");
            $this->saveSmsHistory($phone, $text, $this->admin_id);
        } else {
            Log::error("SMS jo'natishda xatolik: " . $response['message']);
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
