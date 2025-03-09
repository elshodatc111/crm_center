<?php
namespace App\Services\report;

use App\Models\Holiday;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Group;
use App\Models\Cours;
use App\Models\Kassa;
use App\Models\GroupUser;
use App\Models\SettingPaymart;
use App\Models\Paymart;
use App\Models\UserHistory;
use App\Models\LessenTime;
use App\Models\MenegerChart;
use App\Models\TestCheck;
use App\Models\SendMessage;
use App\Models\SettingRoom;
use App\Models\SettingChegirma;
use App\Jobs\PaymartMessageWork;

class GroupService{

    protected function groups(){
        $data = [];
        $Group = Group::get();
        foreach ($Group as $key => $value) {
            $data[$key]['Cours'] = Cours::find($value->cours_id)->cours_name;
            $data[$key]['group_name'] = $value->group_name;
            $data[$key]['amount'] = SettingPaymart::find($value->setting_paymarts)->amount;
            $data[$key]['chegirma'] = SettingPaymart::find($value->setting_paymarts)->chegirma;
            $data[$key]['admin_chegirma'] = SettingPaymart::find($value->setting_paymarts)->admin_chegirma;
            $data[$key]['weekday'] = $value->weekday;
            $data[$key]['lessen_count'] = $value->lessen_count;
            $data[$key]['xona'] = SettingRoom::find($value->setting_rooms_id)->room_name;
            $data[$key]['lessen_times_id'] = LessenTime::find($value->lessen_times_id)->time;
            $data[$key]['techer'] = User::find($value->techer_id)->user_name;
            $data[$key]['techer_paymart'] = $value->techer_paymart;
            $data[$key]['techer_bonus'] = $value->techer_bonus;
            $data[$key]['lessen_start'] = $value->lessen_start;
            $data[$key]['lessen_end'] = $value->lessen_end;
            $data[$key]['meneger'] = User::find($value->user_id)->user_name;
            $data[$key]['next'] = $value->next=='new'?"Davom ettirilmagan":"Davom ettirilgan";
            $data[$key]['created_at'] = $value->created_at;
            $data[$key]['updated_at'] = $value->updated_at;
        }
        return $data;
    }
    
    protected function testlar(){
        $data = [];
        $TestCheck = TestCheck::get();
        foreach ($TestCheck as $key => $value) {
            $data[$key]['user'] = User::find($value->user_id)->user_name;
            $data[$key]['kurs'] = Cours::find(Group::find($value->group_id)->id)->cours_name;
            $data[$key]['guruh'] = Group::find($value->group_id)->group_name;
            $data[$key]['urinishlar'] = $value->count;
            $data[$key]['tugri'] = $value->count_true;
            $data[$key]['notugri'] = 15-$value->count_true;
            $data[$key]['ball'] = $value->ball;
            $data[$key]['first'] = $value->created_at;
            $data[$key]['end'] = $value->updated_at;
        }
        return $data;
    }

    public function response($type){
        if($type=='all'){
            return $this->groups();
        }else{
            return $this->testlar();
        }
    }

}