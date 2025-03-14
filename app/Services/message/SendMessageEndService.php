<?php
namespace App\Services;

use App\Models\Holiday;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Setting;
use App\Models\SendMessage;
use App\Services\SmsService;

class AdminChegirmaService{
    
    private SmsService $smsService;

    public function __construct(SmsService $smsService){
        $this->smsService = $smsService;
    }

    private function saveSmsHistory(string $phone, string $message, ?int $admin_id = null): void {
        SendMessage::create([
            'phone' => $phone,
            'message' => $message,
            'user_id' => $admin_id,
        ]);
    }

    protected function checkSend($user,$Setting,$type){
        if (!$user || !$Setting || !$type) {
            return false;
        }
        if($Setting->message_status==false){return false;}

        switch ($type) {
            case 'new_student_sms':   // Yangi Talaba uchun 
                if($Setting->new_student_sms==false){return false;}
                break;
            case 'new_hodim_sms':  // Yangi hosim uchun
                if($Setting->new_hodim_sms==false){return false;}
                break;
            case 'pay_student_sms':  // Yangi to'lov uchun
                if($Setting->pay_student_sms==false){return false;}
                break;
            case 'pay_hodim_sms':  // Ish haqi to'lovi uchun
                if($Setting->pay_hodim_sms==false){return false;}
                break;
            case 'update_pass_sms':  // Parolni yangilash uchun 
                if($Setting->update_pass_sms==false){return false;}
                break;
            case 'birthday_sms':  // Tug'ilgan kunlar uchun
                if($Setting->birthday_sms==false){return false;}
                break;
            case 'send':  // Boshqa turdagi SMS lar uchun
                if($Setting->message_status==false){return false;}
                    break;
        }
        return true;
    }

    public function SendMessage(int $user_id, string $message, string $type){
        $user = User::find($user_id);
        $Setting = Setting::first();
        $check = $this->checkSend($user,$Setting,$type);
        if($check==false){
            return 0;
        }
        $phone = str_replace("+","",str_replace(" ","",$user->phone1));
        $message = $message." Websayt: ".config('app.url');
        $smsService = new SmsService();
        $response = $smsService->sendSms($phone, $message);
        if (is_array($response) && isset($response['status']) && $response['status'] == 'waiting') {
            $this->saveSmsHistory($phone, $message, auth()->user()->id);
        } else {
            Log::error("SMS jo‘natishda xatolik: " . json_encode($response));
        }
    }


}
