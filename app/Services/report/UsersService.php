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
use App\Models\SettingChegirma;
use App\Jobs\PaymartMessageWork;

class UsersService{

    public function all(){
        $data = [];
        $Users = User::where('type','student')->where('status','true')->get();
        foreach ($Users as $key => $value) {
            $data[$key]['name'] = $value->user_name;
            $data[$key]['phone1'] = $value->phone1;
            $data[$key]['phone2'] = $value->phone2;
            $data[$key]['address'] = $value->address;
            $data[$key]['birthday'] = $value->birthday;
            $data[$key]['about'] = $value->about;
            $data[$key]['group_count'] = $value->group_count;
            $data[$key]['email'] = $value->email;
            $data[$key]['balans'] = $value->balans;
            $data[$key]['created_at'] = Carbon::parse($value->created_at)->format('Y-m-d');
        }
        return $data;
    }

    public function debit(){
        $data = [];
        $Users = User::where('type','student')->where('status','true')->where('balans','<',0)->get();
        foreach ($Users as $key => $value) {
            $data[$key]['name'] = $value->user_name;
            $data[$key]['phone1'] = $value->phone1;
            $data[$key]['phone2'] = $value->phone2;
            $data[$key]['address'] = $value->address;
            $data[$key]['birthday'] = $value->birthday;
            $data[$key]['about'] = $value->about;
            $data[$key]['group_count'] = $value->group_count;
            $data[$key]['email'] = $value->email;
            $data[$key]['balans'] = $value->balans;
            $data[$key]['created_at'] = Carbon::parse($value->created_at)->format('Y-m-d');
        }
        return $data;
    }

    protected function activeGroupId(){
        $startDate = date('Y-m')."-01 00:00:00";
        $endDate = date('Y-m')."-31 23:59:59";
        $Group = Group::where('lessen_start','<=',$endDate)->where('lessen_end','>=',$startDate)->get();
        $group_id = [];
        foreach ($Group as $key => $value) {
            $group_id[$key] = $value->id;
        }
        return $group_id;
    }

    protected function allActiveUser(){
        $group_id = $this->activeGroupId();
        $user_id = [];
        foreach ($group_id as $key => $value) {
            $GroupUser = GroupUser::where('group_id',$value)->where('status',true)->get();
            foreach ($GroupUser as $key2 => $value2) {
                $user_id[$key]['group_id'] = $value;
                $user_id[$key]['user_id'][$key2] = $value2->user_id;
            }
        }
        return $user_id;
    }

    protected function AllActiveUserNamed(){
        $active = $this->allActiveUser();
        $item = [];
        $k = 1;
        foreach ($active as $key => $value) {
            foreach ($value['user_id'] as $key2 => $value2) {
                $Paymart = 0;
                $activeUserCount = Paymart::where('user_id', $value2)->whereIn('paymart_type', ['plastik', 'naqt'])->first();
                if($activeUserCount){
                    $item[$k]['group_name'] = Group::find($value['group_id'])->group_name;
                    $item[$k]['lessen_start'] = Group::find($value['group_id'])->lessen_start;
                    $item[$k]['lessen_end'] = Group::find($value['group_id'])->lessen_end;
                    $item[$k]['user_name'] = User::find($value2)->user_name;
                    $item[$k]['about'] = User::find($value2)->about;
                    $item[$k]['balans'] = User::find($value2)->balans;
                    $k++;
                }
            }
        }
        return $item;
    }

    protected function userCount(){
        $active = $this->allActiveUser();
        $uniqueUsers = [];
        foreach ($active as $value) {
            foreach ($value['user_id'] as $user_id) {
                $activeUserCount = Paymart::where('user_id', $user_id)->whereIn('paymart_type', ['plastik', 'naqt'])->first();
                if($activeUserCount){
                    $uniqueUsers[$user_id] = true;
                }
            }
        }
        return count($uniqueUsers);
    }

    public function activeUser(){
        $user_count = $this->userCount();
        $users = $this->AllActiveUserNamed();
        return [
            'count' => $user_count,
            'users' => $users,
        ];
    }

}