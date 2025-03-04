<?php
namespace App\Services\techer;

use App\Models\Holiday;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Group;
use App\Models\Kassa;
use App\Models\GroupUser;
use App\Models\SettingPaymart;
use App\Models\GroupDays;
use App\Models\Paymart;
use App\Models\Davomad;
use App\Models\TestCheck;
use App\Models\UserHistory;
use App\Models\SettingRoom;
use App\Models\MenegerChart;
use App\Models\SettingChegirma;
use App\Jobs\PaymartMessageWork;
use Illuminate\Support\Facades\Log;

class TecherAppService{

    public function allGroups(){
        $group = Group::where('techer_id',auth()->user()->id)->get();
        $res = [];
        foreach ($group as $key => $value) {
            $today = date('Y-m-d');
            if ($today >= date('Y-m-d', strtotime($value['lessen_start'])) && $today <= date('Y-m-d', strtotime($value['lessen_end']))) {
                $status = 'active';
            } elseif ($today > date('Y-m-d', strtotime($value['lessen_end']))) {
                $status = 'end';
            } elseif ($today < date('Y-m-d', strtotime($value['lessen_start']))) {
                $status = 'new';
            }
            $res[$key]['id'] = $value['id'];
            $res[$key]['group_name'] = $value['group_name'];
            $res[$key]['status'] = $status;
            $res[$key]['lessen_end'] = Carbon::parse($value['lessen_end'])->format('Y-m-d');
            $res[$key]['lessen_start'] = Carbon::parse($value['lessen_start'])->format('Y-m-d'); 
        }
        return $res;
    }

    protected function day($id){
        $days = GroupDays::where('group_id',$id)->get();
        $day = [];
        foreach ($days as $key => $value) {
            $day[$key]['number'] = ($key+1)."-dars";
            $day[$key]['data'] = $value['date'];
        }
        return $day;
    }
    protected function user($id){
        $users = [];
        $GroupUser = GroupUser::where('group_users.group_id',$id)
            ->where('group_users.status',1)
            ->join('users','users.id','group_users.user_id')
            ->select('users.id','users.user_name','users.phone1','users.balans')
            ->get();
        return $GroupUser;
    }
    protected function groupAbout($id){
        $group = Group::find($id);
        $today = date('Y-m-d');
        if ($today < $group['lessen_start']) {
            $stat = 'new';
        } elseif ($today >= $group['lessen_start'] && $today <= $group['lessen_end']) {
            $stat = 'active';
        } else {
            $stat = 'end';
        }
        return [
            'id' => $group['id'],
            'group_name' => $group['group_name'],
            'room' => SettingRoom::find($group['setting_rooms_id'])->room_name,
            'price' => $group['price'],
            'weekday' => $group['weekday'],
            'lessen_count' => $group['lessen_count'],
            'lessen_start' => $group['lessen_start'],
            'lessen_end' => $group['lessen_end'],
            'techer_paymart' => $group['techer_paymart'],
            'techer_bonus' => $group['techer_bonus'],
            'davomad_day' => true,
            'status' => $stat,
        ];
    }
    protected function davomad($id){
        $days = $this->day($id);
        $response = [];
        $thisDay = date('Y-m-d');
        foreach ($days as $key => $value) {
            $users = [];
            $response[$key]['data'] = $value['data'];
            if($value['data']<=$thisDay){
                $response[$key]['status'] = 'false';
                $Davomad = Davomad::where('group_id',$id)->where('data',$value['data'])->get();
                if(count($Davomad)>0){
                    $response[$key]['status'] = 'true';
                    foreach ($Davomad as $key3 => $value3) {
                        foreach ($this->user($id) as $key4 => $value4) {
                            $check1 = Davomad::where('group_id',$id)->where('data',$value['data'])->where('user_id',$value4['id'])->where('status',1)->get();
                            $users[$key4]['user_name'] = User::find($value4['id'])->user_name;
                            if(count($check1)>0){
                                $users[$key4]['status'] = 'true';
                            }else{
                                $users[$key4]['status'] = 'false';
                            }
                        }
                    }
                }
            }else{
                $response[$key]['status'] = 'pedding';
            }
            $response[$key]['user'] = $users;
        }
        return $response;
    }
    protected function TestHistory($id){
        return TestCheck::where('test_checks.group_id',$id)
            ->join('users','users.id','test_checks.user_id')
            ->select('users.user_name','test_checks.count','test_checks.count_true','test_checks.ball')
            ->get();
    }
    public function group(int $id){
        return [
            'group' => $this->groupAbout($id),
            'days' => $this->day($id),
            'users' => $this->user($id),
            'davomad_history' => $this->davomad($id),
            'test_history' => $this->TestHistory($id),
        ];
    }

}