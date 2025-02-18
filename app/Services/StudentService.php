<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;
use App\Models\UserHistory;
use App\Models\MenegerChart;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentService{
    
    public function createStudent(array $data){
        $data['group_count'] = 0;
        $data['email'] = time().'user@gmail.com';
        $data['type'] = 'student';
        $data['status'] = 'true';
        $data['balans'] = 0;
        $data['password'] = Hash::make('password');
        $User = User::create($data);
        UserHistory::create([
            'user_id' => $User['id'], 
            'type' => 'visited', 
            'type_commit' => 'new Student', 
            'admin_id' => auth()->user()->id,
        ]);
        $MenegerChart = MenegerChart::where('user_id',auth()->user()->id)->first();
        if($MenegerChart){
            $MenegerChart->create_student = $MenegerChart->create_student + 1;
            $MenegerChart->save();
        }else{
            MenegerChart::create([
                'user_id' => auth()->user()->id,
                'create_student' => 1
            ]);
        }
        return $User;
    }

    public function getStudents($search = null){
        $query = User::where('type', 'student');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('user_name', 'like', '%' . $search . '%')
                  ->orWhere('phone1', 'like', '%' . $search . '%');
            });
        } else {
            $query->orderBy('id', 'desc');
        }
        return $query->paginate(10);
    }

    public function sotsials(String $string){
        $Setting = Setting::first();
        if($string == 'social_telegram'){
            $Setting->social_telegram = $Setting->social_telegram + 1;
        }elseif($string == 'social_instagram'){
            $Setting->social_instagram = $Setting->social_instagram + 1;
        }elseif($string == 'social_facebook'){
            $Setting->social_facebook = $Setting->social_facebook + 1;
        }elseif($string == 'social_youtube'){
            $Setting->social_youtube = $Setting->social_youtube + 1;
        }elseif($string == 'social_banner'){
            $Setting->social_banner = $Setting->social_banner + 1;
        }elseif($string == 'social_tanish'){
            $Setting->social_tanish = $Setting->social_tanish + 1;
        }elseif($string == 'social_boshqa'){
            $Setting->social_boshqa = $Setting->social_boshqa + 1;
        }
        return $Setting->save();
    }


}
