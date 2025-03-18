<?php
namespace App\Services;

use App\Models\Holiday;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\SettingPaymart;
use App\Models\Setting;
use App\Models\MoliyaHistory;

class MoliyaService{

    public function check(array $data): bool{
        $keys = ['naqt', 'plastik', 'exson', 'amount'];
        foreach ($keys as $key) {
            $data[$key] = intval(str_replace(" ", "", $data[$key] ?? 0));
        }
        return !empty($data['type']) && ($data[$data['type']] ?? 0) >= $data['amount'];
    }

    public function chiqimStore(array $data){
        return DB::transaction(function () use ($data) {
            $amount = (int) str_replace(" ", "", $data['amount']);
            $typeMap = [
                'naqt' => 'chiq_naqt',
                'plastik' => 'chiq_plastik',
                'exson' => 'chiq_exson',
            ];
            $Setting = Setting::first();
            if (!isset($typeMap[$data['type']])) {
                return false;
            }    
            $type = $typeMap[$data['type']];
            $field = "balans_{$data['type']}";
            $Setting->{$field} -= $amount;    
            MoliyaHistory::create([
                'type' => $type,
                'amount' => $amount,
                'comment' => $data['discription'],
                'user_id' => auth()->id(),
            ]);    
            return $Setting->save();
        });
    }

    public function xarajatStore(array $data){
        return DB::transaction(function () use ($data) {
            $amount = (int) str_replace(" ", "", $data['amount']);
            $typeMap = [
                'naqt' => 'xar_naqt',
                'plastik' => 'xar_plastik',
            ];    
            $Setting = Setting::first();
            if (!isset($typeMap[$data['type']])) {
                return false;
            }
            $type = $typeMap[$data['type']];
            $field = "balans_{$data['type']}";
            $Setting->{$field} -= $amount;
            MoliyaHistory::create([
                'type' => $type,
                'amount' => $amount,
                'comment' => $data['discription'],
                'user_id' => auth()->id(),
            ]);
            return $Setting->save();
        });
    }

    public function MoliyaHistory(){
        $status = Carbon::now()->subDays(90)->startOfDay();
        return MoliyaHistory::join('users','users.id','moliya_histories.user_id')
            ->where('moliya_histories.created_at','>=',$status)
            ->select('moliya_histories.type','moliya_histories.amount','moliya_histories.comment','users.user_name','moliya_histories.created_at')
            ->orderby('moliya_histories.created_at','desc')
            ->get();
    }

    public function history($chiqim, $moliya) {
        $historeys = [];
        $k = 0;
        foreach ($chiqim as $key => $item) {
            $historeys[$key]['meneger'] = $item['meneger'];
            $historeys[$key]['type'] = $item['type'];
            $historeys[$key]['amount'] = $item['amount'];
            $historeys[$key]['create_time'] = $item['create_time'];
            $historeys[$key]['description'] = $item['description'];
            $historeys[$key]['succes_time'] = $item['succes_time'];
            $historeys[$key]['admin'] = $item['admin'];
            $k++;
        }
        foreach ($moliya as $key => $item) {
            $historeys[$k]['meneger'] = $item['user_name'];
            $historeys[$k]['type'] = $item['type'];
            $historeys[$k]['amount'] = $item['amount'];
            $historeys[$k]['create_time'] = "";
            $historeys[$k]['description'] = $item['comment'];
            $historeys[$k]['succes_time'] = $item['created_at'];
            $historeys[$k]['admin'] = $item['user_name'];
            $k++;
        }
        usort($historeys, function ($a, $b) {
            return strtotime($b['succes_time']) - strtotime($a['succes_time']);
        });
        return $historeys;
    }
    
    

}