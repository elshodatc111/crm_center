<?php
namespace App\Services\chart;

use App\Models\Holiday;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Social;
use App\Models\Setting;
use App\Models\GroupUser;
use App\Models\Group;
use App\Models\Paymart;
use App\Models\Varonka;

class PaymartService{

    protected function murojat($array){
        $data = [
            'new' => 0,
            'pedding' => 0,
            'cancel' => 0,
            'success' => 0,
            'paymart' => 0,
        ];
        foreach ($array as $key => $value) {
            if($value->status=='new'){
                $data['new'] = $data['new'] + 1; 
            }
            elseif($value->status=='cancel'){
                $data['cancel'] = $data['cancel'] + 1; 
            }elseif($value->status=='success'){
                $data['success'] = $data['success'] + 1; 
                $user_id = $value->register_id;
                $Paymart = Paymart::where('user_id',$user_id)->whereIn('paymart_type', ['plastik', 'naqt'])->get();
                if(count($Paymart)>0){
                    $data['paymart'] = $data['paymart'] + 1; 
                }
            }else{
                $data['pedding'] = $data['pedding'] + 1; 
            }
        }
        return $data;
    }

    public function allMurojat(){
        return $this->murojat(Varonka::get());
    }
    
    public function monchMurojat(){
        return $this->murojat(Varonka::where('created_at','>=',date('y-m').'-01 00:00:00')->get());
    }



}