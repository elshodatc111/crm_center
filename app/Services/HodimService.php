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

    public function userShow(int $id){
        return User::where('id',$id)->select('id','user_name','phone1','phone2','address','birthday','about','email','type','status')->first();
    }

    public function userCart(int $id){
        return MenegerChart::where('user_id',$id)->first();
    }

    public function chartClear(int $id){
        $MenegerChart = MenegerChart::where('user_id',$id)->first();
        $MenegerChart->paymart_add_naqt = 0;
        $MenegerChart->paymart_add_plastik = 0;
        $MenegerChart->chegirma_add = 0;
        $MenegerChart->qaytarildi_add = 0;
        $MenegerChart->create_group = 0;
        $MenegerChart->create_student = 0;
        return $MenegerChart->save();
    }

    public function updateUser(array $data){
        $User = User::find($data['user_id']);
        $User->user_name = $data['user_name'];
        $User->phone1 = $data['phone1'];
        $User->phone2 = $data['phone2'];
        $User->birthday = $data['birthday'];
        $User->address = $data['address'];
        $User->type = $data['type'];
        $User->about = $data['about'];
        return $User->save();
    }

    public function updateStatuss(int $user_id, string $status){
        $User = User::find($user_id);
        $User->status = $status;
        return $User->save();
    }


}
