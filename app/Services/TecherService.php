<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\Social;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class TecherService{
    public function allTecher(){
        return User::where('type','techer')->get();
    }
    
    public function create(array $data){
        $data['address'] = Social::find($data['address_id'])->name;
        $data['email'] = time()."gmail.com";
        $data['password'] = Hash::make('password');
        $data['type'] = 'techer';
        return User::create($data); 
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

    protected function groupBonus(int $id){
        return 0;
    }
    protected function ishHaqiTulandi(int $id){
        return 0;
    }

    public function techerGroups(int $id){
        $date = Carbon::now()->subDays(31)->startOfDay()->format('Y-m-d H:i:s');
        $group = Group::where('techer_id',$id)->where('lessen_end','>=',$date)->get();
        $array = [];
        foreach ($group as $key => $value) {
            $currentDate = date("Y-m-d H:i:s");
            if ($value['lessen_start'] <= $currentDate && $value['lessen_end'] >= $currentDate) {
                $status = 'active';
            } elseif ($value['lessen_end'] < $currentDate) {
                $status = 'end';
            } else {
                $status = 'new';
            }
            $users = count(GroupUser::where('group_id',$value->id)->where('status',1)->get());
            $array[$key]['group_id'] = $value->id;
            $array[$key]['group_name'] = $value->group_name;
            $array[$key]['status'] = $status;
            $array[$key]['users'] = $users;
            $array[$key]['bonus'] = $this->groupBonus($value->id);
            $array[$key]['xisoblandi'] = $users*$value->techer_paymart + $this->groupBonus($value->id) * $value->techer_bonus;
            $array[$key]['tulandi'] = $this->ishHaqiTulandi($value->id);
        }
        return $array;
    }

}
