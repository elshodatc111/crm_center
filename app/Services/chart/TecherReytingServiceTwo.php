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


class TecherReytingServiceTwo{

    protected function getTime(){
        $now = Carbon::now();
        $lastMonth = $now;
        $twoMonthsAgo = $now->copy()->subMonths(1);
        return [
            'oldMonth' => [
                'ym' => $twoMonthsAgo->format('Y-m'),
                'm' => $twoMonthsAgo->format('M'),
            ],
            'nowMonth' => [
                'ym' => $lastMonth->format('Y-m'),
                'm' => $lastMonth->format('M'),
            ],
        ];
    }

    public function groups($techer_id, $data){
        $start = $data . "-01 00:00:00";
        $end = $data . "-31 23:59:59";
        $oldGroup = Group::where('techer_id', $techer_id)
            ->where('lessen_start', '<=', $end)
            ->where('lessen_end', '>=', $start)
            ->get();
        $user_ids = [];
        foreach ($oldGroup as $value) {
            $GroupUser = GroupUser::where('group_id', $value->id)
                ->where('status', true)
                ->get();

            foreach ($GroupUser as $value2) {
                $user_ids[$value2->user_id] = $value2->user_id;
            }
        }
        return [
            'group_count' => count($oldGroup),
            'user_count' => count($user_ids),
        ];
    }

    public function charts(){
        $User = User::where('type','techer')->where('status','true')->get();
        $time = $this->getTime();
        $old = $time['oldMonth']['ym'];
        $now = $time['nowMonth']['ym'];
        //dd($old);
        $data = [];
        foreach ($User as $key => $value) {
            $data[$key]['techer'] = $value->user_name;
            $data[$key]['old'] = $this->groups($value->id, $old);
            $data[$key]['now'] = $this->groups($value->id, $now);
        }
        return $data;
    }

    public function getCharts(){
        $time = $this->getTime();
        return [
            'oldMonth' => $time['oldMonth']['m'],
            'nowMonth' => $time['nowMonth']['m'],
            'teachers' => $this->charts(),
        ];
    }


}
