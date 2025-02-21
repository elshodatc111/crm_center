<?php

namespace App\Services;

use App\Models\Cours;
use App\Models\SettingRoom;
use App\Models\SettingPaymart;
use App\Models\User;
use App\Models\Setting;
use App\Models\LessenTime;
use App\Models\GroupDays;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\Holiday;
use App\Models\MenegerChart;
use Carbon\Carbon;

class GroupService{
    
    public function getGroupResours(){
        return [
            'groups' => Group::get(),
            'cours' => Cours::where('status', 'true')->select('id', 'cours_name')->get(),
            'rooms' => SettingRoom::where('status', 'true')->select('id', 'room_name')->get(),
            'paymarts' => SettingPaymart::where('status', 'true')->select('id', 'amount', 'chegirma', 'admin_chegirma')->get(),
            'techers' => User::where('status', 'true')->where('type', 'techer')->select('id', 'user_name')->get(),
            'time' => LessenTime::select('id', 'number', 'time')->get(),
        ];
    }

    protected function generateLessonDays($start, $lessen_count, $weekday){
        $daysOfWeek = [
            'tok_kun' => [1, 3, 5], 
            'juft_kun' => [2, 4, 6], 
            'har_kun' => [1, 2, 3, 4, 5, 6], 
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

    protected function createMenegerCart(){
        return MenegerChart::firstOrCreate(
            ['user_id' => auth()->user()->id],
            ['create_group' => 0]
        )->increment('create_group');
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

    private function storeGroup(array $data, string $start, string $end) {
        return Group::create([
            'cours_id' => $data['cours_id'], 
            'setting_rooms_id' => $data['setting_rooms_id'], 
            'techer_id' => $data['techer_id'], 
            'group_name' => $data['group_name'], 
            'price' => SettingPaymart::find($data['setting_paymarts'])->amount, 
            'setting_paymarts' => $data['setting_paymarts'], 
            'weekday' => $data['weekday'], 
            'lessen_count' => $data['lessen_count'], 
            'lessen_start' => $start, 
            'lessen_end' => $end, 
            'lessen_times_id' => $data['lessen_times_id'], 
            'user_id' => auth()->user()->id, 
            'next' => 'new', 
            'techer_paymart' => $data['techer_paymart'], 
            'techer_bonus' => $data['techer_bonus'], 
        ]);
    }
    
    public function createGroup(array $data){
        $days = $this->generateLessonDays($data['lessen_start'], $data['lessen_count'], $data['weekday']);
        $start = Carbon::parse($days[0]['date'])->format('Y-m-d');
        $end = Carbon::parse($days[count($days) - 1]['date'])->format('Y-m-d') . ' 23:59:59';
        $group = $this->storeGroup($data, $start, $end);
        $this->addGroupDays($group->id, $data['setting_rooms_id'], $days, $data['lessen_times_id']);
        $this->createMenegerCart();
        return $group;
    }
    
    protected function groupAbout(int $id){
        return Group::where('groups.id', $id)
            ->join('users as teachers', 'groups.techer_id', '=', 'teachers.id')
            ->join('setting_rooms', 'groups.setting_rooms_id', '=', 'setting_rooms.id')
            ->join('users as managers', 'groups.user_id', '=', 'managers.id')
            ->join('cours', 'groups.cours_id', '=', 'cours.id')
            ->join('lessen_times', 'groups.lessen_times_id', '=', 'lessen_times.id')
            ->select(
                'groups.id',
                'groups.group_name as group',
                'groups.price',
                'groups.weekday',
                'groups.lessen_start as start',
                'groups.lessen_end as end',
                'groups.next',
                'setting_rooms.id as room_id', 
                'setting_rooms.room_name as room', 
                'teachers.id as techer_id',
                'teachers.user_name as techer',
                'groups.techer_paymart',
                'groups.techer_bonus',
                'managers.user_name as meneger',
                'cours.cours_name',
                'lessen_times.time',
            )
            ->first();
    }

    protected function groupDays(int $id){
        return GroupDays::where('group_id', $id)->pluck('date')->toArray();
    }

    protected function getCours(){
        return Cours::where('status','true')->select('id','cours_name')->get();
    }

    protected function allGroupUsers($id){
        return GroupUser::where('group_users.group_id', $id)
            ->join('users as student', 'student.id', '=', 'group_users.user_id')
            ->join('users as meneger', 'meneger.id', '=', 'group_users.start_meneger') 
            ->select(
                'student.id', 
                'student.user_name',
                'group_users.created_at',
                'meneger.user_name as meneger',
                'group_users.start_discription',
                'group_users.status',
                'student.balans'
            )
            ->get();
    }

    public function groupsShow(int $id){
        return [
            'group' => $this->groupAbout($id),
            'group_day' => $this->groupDays($id),
            'message_status' => Setting::first()->message_status,
            'cours' => $this->getCours(),
            'users' => $this->allGroupUsers($id),
        ];
    }

    public function groupUpdate(array $data){
        $Group = Group::find($data['id']);
        $Group->group_name = $data['group_name'];
        $Group->cours_id = $data['cours_id'];
        return $Group->save();
    }


}



