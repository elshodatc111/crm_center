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
use App\Models\TestCheck;
use App\Models\GroupUser;
use App\Models\Davomad;
use App\Models\Holiday;
use App\Models\MenegerChart;
use App\Models\UserHistory;
use Carbon\Carbon;
use Illuminate\Support\Str;

class GroupService{
    
    public function getGroupResours($search = null){
        $query = Group::whereDate('lessen_end', '>=', Carbon::now()->subDays(30))
        ->withCount(['groupUsers' => function ($query) {
            $query->where('status', 1);
        }])->orderBy('lessen_start', 'desc');
        if ($search) {
            $query->where('group_name', 'LIKE', '%' . $search . '%');
        }
        return [
            'groups' => $query->paginate(10),
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
            'group_name' => Str::upper($data['group_name']),  // ####################
            'price' => SettingPaymart::find($data['setting_paymarts'])->amount, 
            'setting_paymarts' => $data['setting_paymarts'], 
            'weekday' => $data['weekday'], 
            'lessen_count' => $data['lessen_count'], 
            'lessen_start' => $start, 
            'lessen_end' => $end, 
            'lessen_times_id' => $data['lessen_times_id'], 
            'user_id' => auth()->user()->id, 
            'next' => 'new', 
            'techer_paymart' => intval(str_replace(" ","",$data['techer_paymart'])), 
            'techer_bonus' => intval(str_replace(" ","",$data['techer_bonus'])), 
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
                'cours.id as cours_id',
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

    protected function activeUsers($id){
        return GroupUser::where('group_users.group_id', $id)
            ->where('group_users.status', 1)
            ->join('users as student', 'student.id', '=', 'group_users.user_id')
            ->select(
                'student.id as user_id',  
                'student.user_name',
                'student.balans'
            )
            ->get();
    }
    public function TestCheck(int $id){
        return TestCheck::where('test_checks.group_id', $id)
        ->join('users', 'test_checks.user_id', '=', 'users.id')
        ->select(
            'users.id as user_id',
            'users.user_name', // To‘g‘ri ustun nomi
            'test_checks.count as urinishlar',
            'test_checks.count_true',
            'test_checks.ball'
        )->get();
    }
    public function davomad(int $id){
        $days = $this->groupDays($id);
        $users = $this->allGroupUsers($id);
        $davomad = [];
        $kunlar = [];
        foreach ($days as $key => $value) {
            $kunlar[$key] = $value;
        }
        $davomad['kunlar'] = $kunlar;
        $User = [];
        $now = date("Y-m-d");
        if(count($users)>0){
            foreach ($users as $key => $user) {
                $User[$key]['user_id'] = $user->id;
                $User[$key]['name'] = $user->user_name; 
                foreach ($days as $key1 => $day) {
                    if($now>$day){
                        $Davomad = Davomad::where('group_id',$id)->where('data',$day)->get();
                        if(count($Davomad)==0){
                            $User[$key]['davomad'][$key1] = 'close';
                        }else{
                            $davomad2 = Davomad::where('group_id',$id)->where('data',$day)->where('user_id',$user->id)->first();
                            if($davomad2 && $davomad2->status == true){
                                $User[$key]['davomad'][$key1] = 'true';
                            }else{
                                $User[$key]['davomad'][$key1] = 'false';
                            }
                        }
                    }else{
                        $User[$key]['davomad'][$key1] = 'pedding';
                    }
                }
            }
            $davomad['users'] = $User;
            return [
                $davomad
            ];
        }else{return [];}
    }
    protected function getTecher(){
        return User::where('type','techer')->where('status','true')->select('id','user_name',)->get();
    }
    public function groupsShow(int $id){
        $davomi = $this->groupAbout($id);
        $next='new';
        if($davomi->next!='new'){ 
            $next = Group::where('groups.id', $davomi->next)->first()->group_name;
        }
        return [
            'group' => $this->groupAbout($id),
            'next' =>$next,
            'group_day' => $this->groupDays($id),
            'message_status' => Setting::first()->message_status,
            'cours' => $this->getCours(),
            'users' => $this->allGroupUsers($id),
            'activ_user' => $this->activeUsers($id),
            'rooms' => SettingRoom::where('status', 'true')->select('id', 'room_name')->get(),
            'paymarts' => SettingPaymart::where('status', 'true')->select('id', 'amount', 'chegirma', 'admin_chegirma')->get(),
            'time' => LessenTime::select('id', 'number', 'time')->get(),
            'testlar' => $this->TestCheck($id),
            'davomad' => $this->davomad($id),
            'techers' =>$this->getTecher(),
        ];
    }

    public function groupUpdate(array $data){
        $Group = Group::find($data['id']);
        $Group->group_name = $data['group_name'];
        $Group->cours_id = $data['cours_id'];
        $Group->techer_id = $data['techer_id'];
        $Group->techer_paymart = intval($data['techer_paymart']);
        $Group->techer_bonus = intval($data['techer_bonus']);
        return $Group->save();
    }

    public function remoteGroupUser(array $data){
        $data['jarima'] = (int) preg_replace('/\s+/', '', $data['jarima']);
        $GroupUser = GroupUser::firstWhere([
            'user_id' => $data['user_id'],
            'group_id' => $data['group_id'],
            'status' => 1
        ]);
        if (!$GroupUser) {
            return false;
        }
        $GroupUser->update([
            'end_meneger' => auth()->id(),
            'end_discription' => $data['description'],
            'status' => 0,
            'jarima_id' => $data['jarima'],
        ]);
        $Group = Group::find($data['group_id']);
        $type_commit = "{$Group->group_name} guruhdan o'chirildi. Jarima: {$data['jarima']} ({$data['description']})";
        UserHistory::create([
            'user_id' => $data['user_id'],
            'type' => 'group_delete',
            'type_commit' => $type_commit,
            'admin_id' => auth()->id(),
        ]);
        $User = User::find($data['user_id']);
        if ($User) {
            $User->increment('balans', ($Group->price - $data['jarima']));
        }
        return true;
    }


    

}



