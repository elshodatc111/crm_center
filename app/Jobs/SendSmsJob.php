<?php
namespace App\Jobs;

use App\Services\SmsService;
use App\Models\SendMessage;
use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log; 

class SendSmsJob implements ShouldQueue{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public function __construct(
        protected string $phone, 
        protected string $message, 
        protected ?int $adminId
    ) {}
    public function handle(SmsService $smsService){
        $response = $smsService->sendSms($this->phone, $this->message);
        Log::info($response);
        Log::info("Message: ".$this->message);
        if (is_array($response) && isset($response['status']) && $response['status'] == 'waiting') {            
            SendMessage::create([
                'phone' => $this->phone,
                'message' => $this->message,
                'user_id' => $this->adminId,
            ]);
            $setting = Setting::first();
            $setting->decrement('message_mavjud');
            $setting->increment('message_count');
        }
    }
}