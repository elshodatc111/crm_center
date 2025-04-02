<?php
namespace App\Services;

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
use App\Models\Setting;
use App\Models\UserHistory;
use App\Models\MenegerChart;
use App\Models\KassaHistory;

class KassaService{

    public function getKassa() {
        return Kassa::first();
    }

    public function tulovlar(){
        $sevenDaysAgo = Carbon::now()->subDays(7)->format('Y-m-d');
        $paymarts = Paymart::join('users', 'users.id', '=', 'paymarts.user_id')
            ->where('paymarts.created_at', '>=', $sevenDaysAgo)
            ->orderby('paymarts.created_at', 'desc')
            ->select(
                'users.user_name',
                'paymarts.user_id',
                'paymarts.amount',
                'paymarts.paymart_type',
                'paymarts.description',
                'paymarts.admin_id',
                'paymarts.created_at'
            )->get();
        $array = [];
        foreach($paymarts as $key => $paymart){
            $array[$key]['user_id'] = $paymart->user_id;
            $array[$key]['user'] = $paymart->user_name;
            $array[$key]['amount'] = $paymart->amount;
            $array[$key]['paymart_type'] = $paymart->paymart_type;
            $array[$key]['description'] = $paymart->description;
            $array[$key]['created_at'] = $paymart->created_at;
            $array[$key]['admin'] = User::find($paymart->admin_id)->user_name;
        }
        return $array;
    }
    
    public function returnPaymart(){
        $status = Carbon::now()->subDays(7)->startOfDay();
        $return = Paymart::join('users', 'users.id', '=', 'paymarts.admin_id')
            ->join('users as user', 'user.id', '=', 'paymarts.user_id')
            ->where('paymarts.paymart_type', 'qaytarildi')
            ->where('paymarts.created_at', '>', $status)
            ->select(
                'users.user_name as admin',
                'paymarts.user_id',
                'user.user_name',
                'paymarts.amount',
                'paymarts.description',
                'paymarts.created_at'
            )->get();
        if($return){
            return $return;
        } else{
            return 0;
        }
    }

    public function checkKassa(array $data){
        $naqt = intval($data['naqt']);
        $plastik = intval($data['plastik']);
        $amount = intval(str_replace(" ", "", $data['amount']));
        print_r($naqt);
        if($data['type']=='plastik'){
            if($plastik>=$amount){
                return true;
            }else{
                return false;
            }
        }else{
            if($naqt>=$amount){
                return true;
            }else{
                return false;
            }
        }
    }

    public function chiqimPost(array $data){
        $Kassa = $this->getKassa();
        if($data['type']=='naqt'){
            KassaHistory::create([
                'meneger_id' => auth()->user()->id,
                'create_time' => date('Y-m-d h:i:s'),
                'description' => $data['description'],
                'amount' => intval(str_replace(" ", "", $data['amount'])),
                'type' => 'naqt_chiq',
                'status' => 'pedding',
            ]);
            $Kassa->increment('naqt_chiq_pedding',intval(str_replace(" ", "", $data['amount'])));
            $Kassa->decrement('naqt',intval(str_replace(" ", "", $data['amount'])));
        }else{
            KassaHistory::create([
                'meneger_id' => auth()->user()->id,
                'create_time' => date('Y-m-d h:i:s'),
                'description' => $data['description'],
                'amount' => intval(str_replace(" ", "", $data['amount'])),
                'type' => 'plastik_chiq',
                'status' => 'pedding',
            ]);
            $Kassa->increment('plastik_chiq_pedding',intval(str_replace(" ", "", $data['amount'])));
            $Kassa->decrement('plastik',intval(str_replace(" ", "", $data['amount'])));
        }
        return $Kassa->save();
    }

    public function xarajatPost(array $data){
        $Kassa = $this->getKassa();
        if($data['type']=='naqt'){
            KassaHistory::create([
                'meneger_id' => auth()->user()->id,
                'create_time' => date('Y-m-d h:i:s'),
                'description' => $data['description'],
                'amount' => intval(str_replace(" ", "", $data['amount'])),
                'type' => 'naqt_xar',
                'status' => 'pedding',
            ]);
            $Kassa->increment('naqt_xar_pedding',intval(str_replace(" ", "", $data['amount'])));
            $Kassa->decrement('naqt',intval(str_replace(" ", "", $data['amount'])));
        }else{
            KassaHistory::create([
                'meneger_id' => auth()->user()->id,
                'create_time' => date('Y-m-d h:i:s'),
                'description' => $data['description'],
                'amount' => intval(str_replace(" ", "", $data['amount'])),
                'type' => 'plastik_xar',
                'status' => 'pedding',
            ]);
            $Kassa->increment('plastik_xar_pedding',intval(str_replace(" ", "", $data['amount'])));
            $Kassa->decrement('plastik',intval(str_replace(" ", "", $data['amount'])));
        }
        return $Kassa->save();
    }

    public function peddingKassa(){
        return KassaHistory::where('kassa_histories.status','pedding')
            ->join('users','users.id','kassa_histories.meneger_id')
            ->select('kassa_histories.id','users.user_name','kassa_histories.create_time','kassa_histories.description','kassa_histories.amount','kassa_histories.type')
            ->get();
    }

    public function successAllKassa(){
        $status = Carbon::now()->subDays(90)->startOfDay();
        return KassaHistory::where('kassa_histories.status', 'success')
            ->join('users as meneger', 'meneger.id', 'kassa_histories.meneger_id') // 1-join
            ->join('users as admin', 'admin.id', 'kassa_histories.admin_id') // 2-join
            ->select(
                'meneger.user_name as meneger',
                'kassa_histories.type',
                'kassa_histories.amount',
                'kassa_histories.create_time',
                'kassa_histories.description',
                'kassa_histories.succes_time',
                'admin.user_name as admin'
            )
            ->where('kassa_histories.succes_time', '>=', $status)
            ->orderBy('kassa_histories.succes_time', 'desc')
            ->get();
    }

    public function delete(int $id){
        $KassaHistory = KassaHistory::find($id);
        $Kassa = $this->getKassa();
        $type = $KassaHistory->type;
        if($type == 'naqt_chiq' OR $type == 'naqt_xar'){
            $Kassa->increment('naqt',intval(str_replace(" ", "", $KassaHistory['amount'])));
            if($type == 'naqt_chiq'){
                $Kassa->decrement('naqt_chiq_pedding',intval(str_replace(" ", "", $KassaHistory['amount'])));
            }elseif($type == 'naqt_xar'){
                $Kassa->decrement('naqt_xar_pedding',intval(str_replace(" ", "", $KassaHistory['amount'])));
            }
        }elseif($type == 'plastik_chiq' OR $type == 'plastik_xar'){
            $Kassa->increment('plastik',intval(str_replace(" ", "", $KassaHistory['amount'])));
            if($type == 'plastik_chiq'){
                $Kassa->decrement('plastik_chiq_pedding',intval(str_replace(" ", "", $KassaHistory['amount'])));
            }elseif($type == 'plastik_xar'){
                $Kassa->decrement('plastik_xar_pedding',intval(str_replace(" ", "", $KassaHistory['amount'])));
            }
        }
        return $KassaHistory->delete();
    }

    public function successKassa(int $id){
        $Kassa = $this->getKassa();
        $KassaHistory = KassaHistory::find($id);
        $KassaHistory->status = 'success';
        $KassaHistory->admin_id = auth()->user()->id;
        $KassaHistory->succes_time = date('Y-m-d h:i:s');
        $type = $KassaHistory->type;
        
        if($type == 'naqt_chiq' OR $type == 'naqt_xar'){
            if($type == 'naqt_chiq'){
                $Kassa->decrement('naqt_chiq_pedding',intval(str_replace(" ", "", $KassaHistory['amount'])));
            }elseif($type == 'naqt_xar'){
                $Kassa->decrement('naqt_xar_pedding',intval(str_replace(" ", "", $KassaHistory['amount'])));
            }
        }elseif($type == 'plastik_chiq' OR $type == 'plastik_xar'){
            if($type == 'plastik_chiq'){
                $Kassa->decrement('plastik_chiq_pedding',intval(str_replace(" ", "", $KassaHistory['amount'])));
            }elseif($type == 'plastik_xar'){
                $Kassa->decrement('plastik_xar_pedding',intval(str_replace(" ", "", $KassaHistory['amount'])));
            }
        }
        $KassaHistory->save();

        $Setting = Setting::first();
        $exson = $Setting->exson_foiz * $KassaHistory->amount / 100;
        $amount = $KassaHistory->amount - $exson;
        if($KassaHistory->type=='naqt_chiq'){
            $Setting->increment('balans_naqt',intval(str_replace(" ", "", $amount)));
            $Setting->increment('balans_exson',intval(str_replace(" ", "", $exson)));
        }
        if($KassaHistory->type=='plastik_chiq'){
            $Setting->increment('balans_plastik',intval(str_replace(" ", "", $amount)));
            $Setting->increment('balans_exson',intval(str_replace(" ", "", $exson)));
        }
        return $Setting->save();
    }


}