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
use App\Models\Paymart;
use App\Models\TecherPaymart;
use App\Models\HodimPaymart;
use App\Services\SmsService;
use Illuminate\Support\Facades\Log;

class PaymartMessageWork implements ShouldQueue
{
    use Queueable;
    public $paymart_id;
    public $paymart_type; // hodim, techer
    public $user_id;
    public $admin_id;
    public $message_type; // pay_student_sms, pay_hodim_sms

    public function __construct(int $paymart_id, string $paymart_type, int $user_id, int $admin_id, string $message_type) {
        $this->paymart_id = $paymart_id;
        $this->paymart_type = $paymart_type;
        $this->user_id = $user_id;
        $this->admin_id = $admin_id;
        $this->message_type = $message_type;
    }
    
    public function handle(): void{
        $Setting = Setting::first();
        if (!$Setting || !$Setting->message_status) {return;}
        $User = User::find($this->user_id);
        if (!$User) {return;}
        $phone = preg_replace('/\D/', '', $User->phone1);
        Log::info("Telefon raqam: $phone");

        $text = null;

        if ($this->message_type == 'pay_student_sms' && $Setting->pay_student_sms == 1) {
            $Paymart = Paymart::find($this->paymart_id);
            $type = $Paymart->paymart_type;
            $amount = $Paymart->amount;
            if($type=='naqt' OR $type=='plastik'){
                $text = "Hurmatli {$User->user_name}, Sizning {$amount} so'm to'lovingiz qabul qilindi. Websayt: ".config('app.url');
            }elseif($type == 'chegirma'){
                $text = "Hurmatli {$User->user_name}, Siz {$amount} so'm chegirma qabul qilindi. Websayt: ".config('app.url');
            }
        } elseif ($this->message_type == 'pay_hodim_sms' && $Setting->pay_hodim_sms == 1) {
            if($this->paymart_type=='techer'){
                $TecherPaymart = TecherPaymart::find($this->paymart_id)->amount;
                $text = "Hurmatli {$User->user_name}, Sizga {$TecherPaymart} so'm ish haqi to'landi. Websayt: ".config('app.url');
            }
            if($this->paymart_type=='hodim'){
                $TecherPaymart = HodimPaymart::find($this->paymart_id)->amount;
                $text = "Hurmatli {$User->user_name}, Sizga {$TecherPaymart} so'm ish haqi to'landi. Websayt: ".config('app.url');
                //$text = "Sizning yangi parolingiz Parol: 96987423 websayt: https://crm-atko.uz";
            }
        }

        if (!$text) {
            return;
        }

        Log::info("Messahe : $text");

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
