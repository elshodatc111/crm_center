<?php
namespace App\Services\message;

use App\Models\Holiday;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\Setting;
use App\Models\SendMessage;
use App\Services\SmsService;
use Illuminate\Support\Facades\Log;
use App\Services\message\SendMessageEndService;

class DebetSendMessage{
    private SendMessageEndService $sendMessageEndService;

    public function __construct(SendMessageEndService $sendMessageEndService){
        $this->sendMessageEndService = $sendMessageEndService;
    }

    public function sendMessages(int $group_id){
        $GroupUser = GroupUser::where('group_id',$group_id)->where('status',true)->get();
        $count = 0;
        foreach ($GroupUser as $key => $value) {
            $User = User::find($value->user_id);
            if($User->balans<0){
                $count = $count + 1;
                $message = "Hurmatli " . $User->user_name . ", sizning " . config('app.name') . " o'quv markazidan " . $User->balans . " so'm qarzdorligingiz mavjud. Qarzdorlikni so'ndirishingizni so'raymiz.";
                $this->sendMessageEndService->SendMessage($value->user_id, $message, 'send');
            }
        }
        return $count;
    }


}
