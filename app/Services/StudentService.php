<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;
use App\Models\UserHistory;
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
        return $User;
    }




}
