<?php
namespace App\Services\report;

use App\Models\Holiday;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Group;
use App\Models\Kassa;
use App\Models\GroupUser;
use App\Models\SettingPaymart;
use App\Models\Paymart;
use App\Models\UserHistory;
use App\Models\MenegerChart;
use App\Models\SendMessage;
use App\Models\SettingChegirma;
use App\Jobs\PaymartMessageWork;

class MessageService{
    public function message($start,$end){
        $message = SendMessage::where('created_at','>=',$start)->where('created_at','<=',$end)->get();
        $data = [];
        foreach ($message as $key => $value) {
            $data[$key]['phone'] = $value->phone;
            $data[$key]['message'] = $value->message;
            $data[$key]['admin'] = User::find($value->user_id)->user_name;
            $data[$key]['created_at'] = $value->created_at;
        }
        return [
            'start' => $start,
            'end' => $end,
            'message' => $data,
        ];
    }
}