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
use Illuminate\Support\Facades\Log;

class TecherService{
    protected function countUserGroup(int $group_id){
        return count(GroupUser::where('group_id',$group_id)->where('status',true)->get());
    }

    protected function countNextUser(int $group_id, string $end_data, string $type){
        $user_ids = GroupUser::where('group_id', $group_id)
            ->where('status', true)
            ->pluck('user_id')
            ->toArray();
        $group_ids = Group::where('lessen_start', '>=', $end_data . " 00:00:00")
            ->pluck('id')
            ->toArray();
        $count_user_next = 0;
        $paymart = 0;
        $checked_users = [];
        foreach ($user_ids as $user_id) {
            $hasNextGroup = GroupUser::where('user_id', $user_id)
                ->whereIn('group_id', $group_ids)
                ->where('status', true)
                ->exists();
            if ($hasNextGroup && !in_array($user_id, $checked_users)) {
                $count_user_next++;
                $checked_users[] = $user_id;
                $hasPaymart = Paymart::where('user_id', $user_id)
                    ->whereIn('paymart_type', ['plastik', 'naqt'])
                    ->where('created_at', '>=', $end_data . " 00:00:00")
                    ->exists();
    
                if ($hasPaymart) {
                    $paymart++;
                }
            }
        }
        return $type === 'next' ? $count_user_next : ($type === 'paymart' ? $paymart : 0);
    }
    


    public function getAll(){
        $thirtyDaysAgo = now()->subDays(30)->format('Y-m-d')." 23:59:59";
        $now = date("Y-m-d")." 23:59:59";
        $Group = Group::where('groups.lessen_end','>=',$thirtyDaysAgo)
            ->where('groups.lessen_end','<=',$now)
            ->join('users','groups.techer_id','users.id')
            ->select('groups.id as group_id','groups.group_name','groups.lessen_start','groups.lessen_end','users.id as user_id','users.user_name')
            ->get();
        $data = [];
        foreach ($Group as $key => $value) {
            $data[$key]['group_id'] = $value->group_id;
            $data[$key]['group_name'] = $value->group_name;
            $data[$key]['lessen_start'] = Carbon::parse($value->lessen_start)->format('Y-m-d');
            $data[$key]['lessen_end'] = Carbon::parse($value->lessen_end)->format('Y-m-d');
            $data[$key]['user_count'] = $this->countUserGroup($value->group_id);
            $data[$key]['next_count'] = $this->countNextUser($value->group_id,Carbon::parse($value->lessen_end)->format('Y-m-d'),'next');
            $data[$key]['paymart_count'] = $this->countNextUser($value->group_id,Carbon::parse($value->lessen_end)->format('Y-m-d'),'paymart');
            $data[$key]['techer_id'] = $value->user_id;
            $data[$key]['techer'] = $value->user_name;
        }
        return $data;
    }


}