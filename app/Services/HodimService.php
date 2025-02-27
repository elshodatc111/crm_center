<?php
namespace App\Services;

use App\Models\Holiday;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Social;
use App\Models\MenegerChart;
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
        $user = User::create($data);
        return MenegerChart::create([
            'user_id' => $user->id,
            'paymart_add_naqt' => 0,
            'paymart_add_plastik' => 0,
            'chegirma_add' => 0,
            'qaytarildi_add' => 0,
            'create_group' => 0,
            'create_student' => 0,
        ]);
    }

    public function checkUser(int $id){
        $user = MenegerChart::where('user_id',$id)->first();
        if(!$user){
            return MenegerChart::create([
                'user_id' => $id,
                'paymart_add_naqt' => 0,
                'paymart_add_plastik' => 0,
                'chegirma_add' => 0,
                'qaytarildi_add' => 0,
                'create_group' => 0,
                'create_student' => 0,
            ]);
        }
        return true;
    }



}
