<?php
namespace App\Services;

use App\Models\Holiday;
use App\Models\GroupDays;
use App\Models\Group;
use App\Models\SettingRoom;
use App\Models\GroupUser;
use App\Models\LessenTime;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeService{
    protected function getNextSevenDays(){
        $days = [];
        $daysUz = [
            'Monday' => 'Dushanba',
            'Tuesday' => 'Seshanba',
            'Wednesday' => 'Chorshanba',
            'Thursday' => 'Payshanba',
            'Friday' => 'Juma',
            'Saturday' => 'Shanba'
        ];
        $k = 1;
        for ($i = 0; $i < 7; $i++) {
            $date = Carbon::now()->addDays($i)->format('Y-m-d');
            $dayOfWeek = Carbon::now()->addDays($i)->format('l');
            $Holiday = Holiday::where('date',$date)->first();
            if($k>5){break;}
            if(!$Holiday){
                $days[] = [
                    'date' => $date,
                    'day' => $daysUz[$dayOfWeek]=null?$daysUz[$dayOfWeek]:null
                ];
                $k++;
            }
        }

        return $days;
    }
    protected function darslar($date){
        $GroupDays = GroupDays::where('group_days.date',$date)->orderby('group_days.lessen_times_id','asc')->get();
        $date = [];
        foreach ($GroupDays as $key => $value) {
            $techer_id = Group::find($value->group_id)->techer_id;
            $date[$key]['group_id'] = $value->group_id;
            $date[$key]['group_name'] = Group::find($value->group_id)->group_name;
            $date[$key]['room'] = SettingRoom::find($value->room_id)->room_name;
            $date[$key]['time'] = LessenTime::find($value->lessen_times_id)->time;
            $date[$key]['count'] = count(GroupUser::where('group_id',$value->group_id)->where('status',true)->get());
            $date[$key]['techer_id'] = $techer_id;
            $date[$key]['techer_name'] = User::find($techer_id)->user_name;
        }
        return $date;
    }
    protected function jadval(){
        $kunlar = $this->getNextSevenDays();
        $date = [];
        foreach ($kunlar as $key => $value) {
            $date[$key]['date'] = $value['date'];
            $date[$key]['day'] = $value['day'];
            $date[$key]['item'] = $this->darslar($value['date']);
        }
        return $date;
    }

    public function getJadval(){
        return $this->jadval();
    }


}