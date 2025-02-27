<?php
namespace App\Services;

use App\Models\Holiday;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Social;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HodimService{

    public function allHodim(){
        return User::whereIn('type', ['admin', 'meneger'])->get();
    }

    public function create(array $data){
        $data['address'] = Social::find($data['address_id'])->name;
        $data['email'] =time()."@mail";
        $data['password'] = Hash::make('password');
        return User::create($data);
    }



}
