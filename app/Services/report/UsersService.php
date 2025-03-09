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

    public function activeUser(){
    
            
    }

}