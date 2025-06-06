<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\Social;
use App\Models\Setting;
use App\Models\Davomad;
use App\Models\TecherPaymart;
use App\Models\MoliyaHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;

class TecherService{
    public function allTecher(){
        return User::where('type','techer')->get();
    }

    public function userID(array $data){
        $user = User::where('user_name',$data['user_name'])->where('phone1',$data['phone1'])->first();
        return $user->id;
    }

    public function create(array $data){
        $data['address'] = Social::find($data['address_id'])->name;
        $data['email'] = time()."@atko.uz";
        $data['password'] = Hash::make('password');
        $data['type'] = 'techer';
        $data['user_name'] = Str::upper($data['user_name']);
        return User::create($data);
    }

    public function updatePassword(int $id){
        $user = User::find($id);
        $user->password = Hash::make('password');
        return $user->save();
    }

    public function techerShow(int $id){
        return User::find($id);
    }

    public function update(array $data){
        $teacher = User::findOrFail($data['techer_id']);
        return $teacher->update([
            'user_name' => $data['user_name'],
            'phone1' => $data['phone1'],
            'phone2' => $data['phone2'] ?? null,
            'birthday' => $data['birthday'],
            'address' => $data['address'],
        ]);
    }

    public function UpdateStaus(int $id){
        $teacher = User::findOrFail($id);
        if($teacher->status =='true'){
            $teacher->status = 'false';
            $teacher->save();
            return false;
        }else{
            $teacher->status = 'true';
            $teacher->save();
            return true;
        }
    }

    protected function groupBonus(int $group_id){
        $activeUsers = GroupUser::where('group_id', $group_id)
            ->where('status', 1)
            ->pluck('user_id')
            ->toArray();
        $lessen_end = Group::find($group_id)->lessen_start;
        $dateOnly = Carbon::parse($lessen_end)->format('Y-m-d')." 00:00:00";
        $nextGroupIds = Group::where('lessen_start', '>=', $dateOnly)->where('id','!=',$group_id)
            ->pluck('id')
            ->toArray();
        $usersInNextGroups = GroupUser::whereIn('group_id', $nextGroupIds)
            ->whereIn('user_id', $activeUsers)
            ->where('status', 1)
            ->pluck('user_id')
            ->unique()
            ->toArray();
        return count($usersInNextGroups);
    }

    protected function ishHaqiTulandi(int $id){
        $summa = 0;
        $TecherPaymart = TecherPaymart::where('group_id',$id)->get();
        foreach ($TecherPaymart as $key => $value) {
            $summa = $summa + $value['amount'];
        }
        return intval($summa);
    }

    public function techerGroups(int $id){
        $date = Carbon::now()->subDays(31)->startOfDay()->format('Y-m-d H:i:s');
        $group = Group::where('techer_id',$id)->where('lessen_end','>=',$date)->get();
        $array = [];
        foreach ($group as $key => $value) {
            $id = $value->id;
            $currentDate = date("Y-m-d H:i:s");
            if ($value['lessen_start'] <= $currentDate && $value['lessen_end'] >= $currentDate) {
                $status = 'active';
            } elseif ($value['lessen_end'] < $currentDate) {
                $status = 'end';
            } else {
                $status = 'new';
            }
            $umumiySon = Davomad::where('group_id', $value->id)->distinct('data')->count();
            $users = count(GroupUser::where('group_id',$value->id)->where('status',1)->get());
            $Lessen_count = $value['lessen_count'];
            $array[$key]['group_id'] = $value->id;
            $array[$key]['group_name'] = $value->group_name;
            $array[$key]['lessen_start'] = $value->lessen_start;
            $array[$key]['lessen_end'] = $value->lessen_end;
            $array[$key]['status'] = $status;
            $array[$key]['users'] = $users;
            $array[$key]['bonus'] = $this->groupBonus($id);
            $array[$key]['xisoblandi'] = $users*$value->techer_paymart + $this->groupBonus($id) * $value->techer_bonus;
            $array[$key]['xisoblandi_davomad'] = $umumiySon * ($users*$value->techer_paymart + $this->groupBonus($id) * $value->techer_bonus)/$Lessen_count;
            $array[$key]['tulandi'] = $this->ishHaqiTulandi($value->id);
        }

        return $array;
    }

    public function check(array $data): bool{
        $data['naqt'] = (int) $data['naqt'];
        $data['plastik'] = (int) $data['plastik'];
        $data['amount'] = (int) str_replace(" ", "", $data['amount']);

        return ($data['type'] === 'naqt' ? $data['naqt'] : $data['plastik']) >= $data['amount'];
    }

    public function PaymartStore(array $data){
        $Setting = Setting::first();
        $data['naqt'] = intval($data['naqt']);
        $data['plastik'] = intval($data['plastik']);
        $data['amount'] = str_replace(" ","",$data['amount']);
        if($data['type']=='plastik'){
            $type = 'ish_plas';
            $Setting->decrement('balans_plastik', $data['amount']);
        }else{
            $type = 'ish_naqt';
            $Setting->decrement('balans_naqt', $data['amount']);
        }
        MoliyaHistory::create([
            'type' => $type,
            'amount' => $data['amount'],
            'comment' => $data['description'].'(O\'qituvchi)',
            'user_id' => auth()->user()->id,
        ]);
        $paymart = TecherPaymart::create([
            'user_id'=> $data['techer_id'],
            'group_id'=> $data['group_id'],
            'amount'=> $data['amount'],
            'type'=> $data['type'],
            'description'=> $data['description'],
            'admin_id'=> auth()->user()->id,
        ]);
        $Setting->save();
        return $paymart->id;
    }

    public function techerPaymart(int $id){
        return TecherPaymart::where('techer_paymarts.user_id', $id)
            ->join('users as techer', 'techer_paymarts.user_id', '=', 'techer.id')
            ->join('groups as group', 'techer_paymarts.group_id', '=', 'group.id')
            ->join('users as admin', 'techer_paymarts.admin_id', '=', 'admin.id')
            ->select(
                'techer_paymarts.user_id as techer_id', // Ushbu qatorni o'zgartirish
                'techer.user_name as techer',
                'techer_paymarts.group_id',
                'group.group_name',
                'techer_paymarts.amount',
                'techer_paymarts.type',
                'techer_paymarts.description',
                'techer_paymarts.admin_id',
                'admin.user_name as admin',
                'techer_paymarts.created_at',
            )->get();
    }


}
