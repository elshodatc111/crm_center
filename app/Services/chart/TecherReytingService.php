<?php
namespace App\Services\chart;

use App\Models\Holiday;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Social;
use App\Models\Setting;
use App\Models\GroupUser;
use App\Models\Group;
use App\Models\Paymart;
use App\Models\Varonka;
use App\Models\MoliyaHistory;
use App\Services\SettingService;
use App\Services\chart\VisedService;
use App\Services\chart\TecherService;


class TecherReytingService{ 

    protected $techerService;

    public function __construct(TecherService $techerService){
        $this->techerService = $techerService;
    }

    protected function countGroup(int $techer_id){
        return count(Group::where('techer_id',$techer_id)->get());
    }

    protected function userCount($techer_id){
        $Groups = Group::where('techer_id',$techer_id)->get();
        $count = 0;
        foreach ($Groups as $key => $value) {
            $group_id[$key] = $value->id;
            $GroupUser = count(GroupUser::where('group_id',$value->id)->where('status',true)->get());
            $count = $count + $GroupUser;
        }
        return $count;
    }

    protected function activeUser($techer_id, string $type){
        $Groups = Group::where('techer_id',$techer_id)->get();
        $count = 0;
        foreach ($Groups as $key => $value) {
            $group_id = $value->id;
            $count = $count + $this->techerService->countNextUser($group_id, Carbon::parse($value->lessen_end)->format('Y-m-d'), $type);
        }
        return $count;
    }

    protected function techer(){
        $techer = User::where('type','techer')->where('status','true')->get();
        $data = [];
        foreach ($techer as $key => $value) {
            $group_count = $this->countGroup($value->id);
            $count_user = $this->userCount($value->id);
            $next_count_user = $this->activeUser($value->id,'next');
            $paymart_count_user = $this->activeUser($value->id,'paymart');
            $reyting = $count_user!=0?number_format((100 * ($count_user + $next_count_user + $paymart_count_user) / 3 / $count_user), 2):0;
            $data[$key]['techer_id'] = $value->id;
            $data[$key]['techer'] = $value->user_name;
            $data[$key]['group_count'] = $group_count;
            $data[$key]['count_user'] = $group_count>0?$count_user:0;
            $data[$key]['next_count_user'] = $group_count>0?$next_count_user:0;
            $data[$key]['paymart_count_user'] = $group_count>0?$paymart_count_user:0;
            $data[$key]['reyting'] = $reyting;
        }
        return $data;
    }

    public function reyting(){
        return $this->techer();
    }


}