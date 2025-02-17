<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class StudentService{
    
    public function createStudent(array $data){
        $data['group_count'] = 0;
        $data['email'] = time().'user@gmail.com';
        $data['type'] = 'student';
        $data['status'] = 'true';
        $data['balans'] = 0;
        $data['password'] = Hash::make('password');
        return User::create($data);
    }




}
