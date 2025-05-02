<?php
namespace App\Services\report;

use App\Models\Holiday;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Group;
use App\Models\Kassa;
use App\Models\GroupUser;
use App\Models\SettingPaymart;
use App\Models\Paymart;
use App\Models\KassaHistory;
use App\Models\UserHistory;
use App\Models\MenegerChart;
use App\Models\MoliyaHistory;
use App\Models\HodimPaymart;
use App\Models\TecherPaymart;
use App\Models\SendMessage;
use App\Models\SettingChegirma;
use App\Jobs\PaymartMessageWork;

class PaymartService{
    protected function paymart_all($start, $end){
        $Paymart = Paymart::where('created_at','>=',$start)->where('created_at','<=',$end)->get();
        $data = [];
        foreach ($Paymart as $key => $value) {
            $data[$key]['user_name'] = User::find($value->user_id)->user_name;
            $data[$key]['group'] = $value->group_id=='null'?" ":Group::find($value->group_id)->group_name;
            $data[$key]['amount'] = $value->amount;
            $data[$key]['paymart_type'] = $value->paymart_type;
            $data[$key]['about'] = $value->description;
            $data[$key]['admin'] = User::find($value->admin_id)->user_name;
            $data[$key]['created_at'] = $value->created_at;
        }
        return $data;
    }
    protected function kassa_chiqim($start, $end){
        $KassaHistory = KassaHistory::where('succes_time','>=',$start)->where('succes_time','<=',$end)->where('status','success')->get();
        $data = [];
        foreach ($KassaHistory as $key => $value) {
            $type = $value->type;
            $data[$key]['meneger'] = User::find($value->meneger_id)->user_name;
            $data[$key]['create'] = $value->create_time;
            $data[$key]['description'] = $value->description;
            $data[$key]['amount'] = $value->amount;
            $data[$key]['type'] = $type=='naqt_chiq'?"Kassadan naqt chiqim":"Kassadan plastik chiqim";
            $data[$key]['admin'] = User::find($value->admin_id)->user_name;
            $data[$key]['succes'] = $value->succes_time;
        }
        return $data;
    }
    protected function moliya_chiqim($start, $end){
        $MoliyaHistory = MoliyaHistory::where('created_at','>=',$start)->where('created_at','<=',$end)->get();
        $data = [];
        foreach ($MoliyaHistory as $key => $value) {
            $type = $value->type;
            if($type=='chiq_plastik'){
                $status = "Daromad (plastik)";
            }elseif($type=='chiq_naqt'){
                $status = "Daromad (naqt)";                
            }elseif($type=='chiq_exson'){
                $status = "Exson uchun chiqim";                
            }elseif($type=='xar_naqt'){
                $status = "Xarajat (naqt)";                
            }elseif($type=='xar_plastik'){
                $status = "Xarajat (plastik)";                
            }elseif($type=='ish_naqt'){
                $status = "Ish haqi (naqt)";                
            }elseif($type=='ish_plas'){
                $status = "ish haqi (plastik)";                
            }
            $data[$key]['type'] = $status;
            $data[$key]['amount'] = $value->amount;
            $data[$key]['comment'] = $value->comment;
            $data[$key]['user_id'] = User::find($value->user_id)->user_name;
            $data[$key]['created_at'] = $value->created_at;
        }
        return $data;
    }
    protected function hodim_paymart($start, $end){
        $HodimPaymart = HodimPaymart::where('created_at','>=',$start)->where('created_at','<=',$end)->get();
        $data = [];
        foreach ($HodimPaymart as $key => $value) {
            $data[$key]['hodim'] = User::find($value->user_id)->user_name;
            $data[$key]['amount'] = $value->amount;
            $data[$key]['type'] = $value->type=='naqt'?'Naqt':'Plastik';
            $data[$key]['description'] = $value->description;
            $data[$key]['admin'] = User::find($value->admin_id)->user_name;
            $data[$key]['created_at'] = $value->created_at;
        }
        return $data;
    }
    protected function texher_paymart($start, $end){
        $HodimPaymart = TecherPaymart::where('created_at','>=',$start)->where('created_at','<=',$end)->get();
        $data = [];
        foreach ($HodimPaymart as $key => $value) {
            $data[$key]['techer'] = User::find($value->user_id)->user_name;
            $data[$key]['guruh'] = Group::find($value->group_id)->group_name;
            $data[$key]['amount'] = $value->amount;
            $data[$key]['type'] = $value->type=='naqt'?'Naqt':'Plastik';
            $data[$key]['description'] = $value->description;
            $data[$key]['admin'] = User::find($value->admin_id)->user_name;
            $data[$key]['created_at'] = $value->created_at;
        }
        return $data;
    }

    public function paymart($type, $start, $end){
        if($type=='paymart'){
            return $this->paymart_all($start, $end);
        }elseif($type=='kassa_chiqim'){
            return $this->kassa_chiqim($start, $end);            
        }elseif($type=='moliya_chiqim'){
            return $this->moliya_chiqim($start, $end);            
        }elseif($type=='hodim_paymart'){
            return $this->hodim_paymart($start, $end);            
        }elseif($type=='texher_paymart'){
            return $this->texher_paymart($start, $end);            
        }else{
            return [];
        }
    }
    
}