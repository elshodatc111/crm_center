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
    

}
