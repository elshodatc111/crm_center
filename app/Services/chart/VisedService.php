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

class VisedService{

    function getLastSixMonths(): array{
        return collect(range(0, 5))->map(function ($i) {
            $date = now()->subMonths($i);
            return [
                'ym' => $date->format('Y-m'),
                'yM' => $date->format('Y-M')
            ];
        })->reverse()->values()->toArray();
    }

    public function Hudud(){
        $Social = Social::get();
        $Hudud = [];
        foreach ($Social as $key => $value) {
            $Hudud[$key]['name'] = $value['name'];
            $Hudud[$key]['count'] = $value['count'];
        }
        return $Hudud;
    }

    public function Social(){
        $Setting = Setting::first();
        return [
            'telegram' => $Setting['social_telegram'],
            'instagram' => $Setting['social_instagram'],
            'facebook' => $Setting['social_facebook'],
            'youtube' => $Setting['social_youtube'],
            'bannner' => $Setting['social_banner'],
            'tanish' => $Setting['social_tanish'],
            'boshqa' => $Setting['social_boshqa'],
        ];
    }

    public function tashriflar(){
        $dates = $this->getLastSixMonths();
        $count = [
            'data' => [],
            'tashrif' => [],
            'group' => [],
            'paymart' => []
        ];
        foreach ($dates as $key => $date) {
            $startDate = Carbon::parse($date['ym'] . "-01 00:00:00");
            $endDate = Carbon::parse($date['ym'])->endOfMonth()->format('Y-m-d 23:59:59');
            $users = User::whereBetween('created_at', [$startDate, $endDate])->pluck('id')->toArray();
            $groupCount = GroupUser::whereIn('user_id', $users)
                ->where('status', 1)
                ->distinct('user_id') 
                ->count();
            $paymartCount = Paymart::whereIn('user_id', $users)
                ->whereIn('paymart_type', ['plastik', 'naqt'])
                ->distinct('user_id') 
                ->count();
            $count['data'][] = $date['yM'];
            $count['tashrif'][] = count($users);
            $count['group'][] = $groupCount;
            $count['paymart'][] = $paymartCount;
        }
        return $count;
    }

    public function activeUser(){
        $dates = $this->getLastSixMonths();
        $count = [];
        foreach ($dates as $key => $date) {
            $startDate = Carbon::parse($date['ym'] . "-01 00:00:00");
            $endDate = Carbon::parse($date['ym'])->endOfMonth()->format('Y-m-d 23:59:59');
            $user_ids = GroupUser::whereHas('group', function ($query) use ($startDate, $endDate) {
                    $query->where('lessen_start', '<=', $endDate)
                          ->where('lessen_end', '>=', $startDate);
                })
                ->where('status', 1)
                ->pluck('user_id')
                ->unique(); 
            $activeUserCount = Paymart::whereIn('user_id', $user_ids)
                ->whereIn('paymart_type', ['plastik', 'naqt'])
                ->distinct('user_id') 
                ->count();
            $count[$key] = $activeUserCount;
        }
        return $count;
    }




}