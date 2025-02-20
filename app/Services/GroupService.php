<?php

namespace App\Services;

use App\Models\Cours;
use App\Models\SettingRoom;
use App\Models\SettingPaymart;
use App\Models\User;
use App\Models\LessenTime;
use App\Models\GroupDays;
use App\Models\Group;
use App\Models\Holiday;
use Carbon\Carbon;

class GroupService{
    
    public function getGroupResours(){
        return [
            'cours' => Cours::where('status', 'true')->select('id', 'cours_name')->get(),
            'rooms' => SettingRoom::where('status', 'true')->select('id', 'room_name')->get(),
            'paymarts' => SettingPaymart::where('status', 'true')->select('id', 'amount', 'chegirma', 'admin_chegirma')->get(),
            'techers' => User::where('status', 'true')->where('type', 'techer')->select('id', 'user_name')->get(),
            'time' => LessenTime::select('id', 'number', 'time')->get(),
        ];
    }

    protected function generateLessonDays($start, $lessen_count, $weekday){
        $daysOfWeek = [
            'tok_kun' => [1, 3, 5], // Dushanba, Chorshanba, Juma
            'juft_kun' => [2, 4, 6], // Seshanba, Payshanba, Shanba
            'har_kun' => [1, 2, 3, 4, 5, 6], // Yakshanbadan tashqari har kuni
        ];
    
        $holidayDates = array_map(function ($holiday) {
            return Carbon::parse($holiday['date'])->format('Y-m-d');
        }, Holiday::select('date')->get()->toArray());
    
        $schedule = [];
        $startDate = Carbon::parse($start);
        $count = 0;
    
        while ($count < $lessen_count) {
            if (in_array($startDate->dayOfWeekIso, $daysOfWeek[$weekday]) && !in_array($startDate->format('Y-m-d'), $holidayDates)) {
                $schedule[] = [
                    'number' => $count + 1,
                    'date' => $startDate->format('Y-m-d'),
                    'day' => $startDate->format('l'),
                ];
                $count++;
            }
            $startDate->addDay();
        }
    
        return $schedule;
    }

    protected function addGroupDays(int $group_id, int $room_id, array $days, int $time_id) {
        foreach ($days as $value) {
            $exists = GroupDays::where([
                ['group_id', '=', $group_id],
                ['room_id', '=', $room_id],
                ['lessen_times_id', '=', $time_id],
                ['date', '=', $value['date']], 
            ])->exists(); 
            if (!$exists) {
                GroupDays::create([
                    'group_id' => $group_id,
                    'room_id' => $room_id,
                    'date' => $value['date'],
                    'lessen_times_id' => $time_id,
                ]);
            }
        }
    }

    public function createGroup(array $data){
        $days = $this->generateLessonDays($data['lessen_start'], $data['lessen_count'], $data['weekday']);
        $start = Carbon::parse($days[0]['date'])->format('Y-m-d');
        $end = Carbon::parse($days[count($days) - 1]['date'])->format('Y-m-d');
        $group = Group::create([
            'cours_id' => $data['cours_id'], 
            'setting_rooms_id' => $data['setting_rooms_id'], 
            'techer_id' => $data['techer_id'], 
            'group_name' => $data['group_name'], 
            'price' => SettingPaymart::find($data['setting_paymarts'])->amount, 
            'setting_paymarts' => $data['setting_paymarts'], 
            'weekday' => $data['weekday'], 
            'lessen_count' => $data['lessen_count'], 
            'lessen_start' => $start, 
            'lessen_end' => $end.' 23:59:59', 
            'lessen_times_id' => $data['lessen_times_id'], 
            'user_id' => auth()->user()->id, 
            'next' => 'new', 
            'techer_paymart' => $data['techer_paymart'], 
            'techer_bonus' => $data['techer_bonus'], 
        ]);
        $this->addGroupDays($group->id,$data['setting_rooms_id'],$days,$data['lessen_times_id']);
        return $group;
    }


}



