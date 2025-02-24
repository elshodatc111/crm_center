<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use App\Models\Social;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        //dd($teacher->status);
        if($teacher->status =='true'){
            $teacher->status = 'false';
            //dd($teacher->status."ss");
            $teacher->save();
            return false;
        }else{
            $teacher->status = 'true';
            //dd($teacher->status);
            $teacher->save();
            return true;
        }
    }

}
