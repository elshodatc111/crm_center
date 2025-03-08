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
use App\Models\MoliyaHistory;
use App\Services\SettingService;
use App\Services\chart\VisedService;

class PaymartService{    
    protected $visedService;
    protected $settingService;

    public function __construct(VisedService $visedService, SettingService $settingService){
        $this->visedService = $visedService;
        $this->settingService = $settingService;
    }

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

    function getLastNineDays(): array {
        return collect(range(0, 8))->map(function ($i) {
            $date = now()->subDays($i);
            return [
                'ymd' => $date->format('Y-m-d')
            ];
        })->reverse()->values()->toArray();
    }

    protected function sumDays(string $type){
        $days = $this->getLastNineDays();
        $return = [];
        foreach ($days as $key => $value) {
            $Paymart = Paymart::where('created_at','>=',$value['ymd']." 00:00:00")
                ->where('created_at','<=',$value['ymd']." 23:59:59")
                ->where('paymart_type',$type)->get();
            $summa = 0;
            foreach ($Paymart as $key2 => $value2) {
                $summa = $summa + $value2['amount'];
            }
            $return[$key]['int'] = intval($summa);
            $return[$key]['string'] = number_format($return[$key]['int'], 0, '.', ' ');
        }
        return $return;
    }

    public function DaysChart(){
        return [
            'naqt' => $this->sumDays('naqt'),
            'plastik' => $this->sumDays('plastik'),
            'qaytarildi' => $this->sumDays('qaytarildi'),
            'chegirma' => $this->sumDays('chegirma'),
        ];
    }

    public function paymartDay($data){
        return Paymart::where('paymarts.created_at','>=',$data." 00:00:00")
        ->where('paymarts.created_at','<=',$data." 23:59:59")
        ->join('users as student','student.id','paymarts.user_id')
        ->join('users as admin','admin.id','paymarts.admin_id')
        ->select('student.id as user_id','student.user_name','paymarts.amount','paymarts.paymart_type','paymarts.description','paymarts.created_at','admin.email')
        ->get();;
    }

    protected function sumMonch(string $type){
        $days = $this->visedService->getLastSixMonths();
        $return = [];
        foreach ($days as $key => $value) {
            $Paymart = Paymart::where('created_at','>=',$value['ym']."-01 00:00:00")
                ->where('created_at','<=',$value['ym']."-31 23:59:59")
                ->where('paymart_type',$type)->get();
            $summa = 0;
            foreach ($Paymart as $key2 => $value2) {
                $summa = $summa + $value2['amount'];
            }
            $return[$key]['int'] = intval($summa);
            $return[$key]['string'] = number_format($return[$key]['int'], 0, '.', ' ');
        }
        return $return;
    }

    protected function exsonSumma($type){
        $naqt = $this->sumMonch('naqt');
        $plastik = $this->sumMonch('plastik');
        $qaytarildi = $this->sumMonch('qaytarildi');
        $exson = intval($this->settingService->getSetting()->exson_foiz);
        $data = [];
        for($i=0;$i<6;$i++){
            if($type=='exson'){
                $data[$i]['int'] = ($naqt[$i]['int'] + $plastik[$i]['int']-$qaytarildi[$i]['int'])*$exson/100;
                $data[$i]['string'] = number_format(($naqt[$i]['int'] + $plastik[$i]['int']-$qaytarildi[$i]['int'])*$exson/100, 0, '.', ' ');
            }elseif($type=='balans'){
                $data[$i]['int'] = ($naqt[$i]['int'] + $plastik[$i]['int']-$qaytarildi[$i]['int'])*(100-$exson)/100;
                $data[$i]['string'] = number_format(($naqt[$i]['int'] + $plastik[$i]['int']-$qaytarildi[$i]['int'])*(100-$exson)/100, 0, '.', ' ');
            }
        }
        return $data;
    }

    protected function BalansHistory($type){
        $monch = $this->visedService->getLastSixMonths();
        $data = [];
        for($i=0;$i<6;$i++){
            $MoliyaHistory = MoliyaHistory::where('created_at','>=',$monch[$i]['ym']."-01 00:00:00")->where('created_at','<=',$monch[$i]['ym']."-31 23:59:59")->get();
            if($type=='xarajat'){
                $summa = 0;
                foreach ($MoliyaHistory as $key => $value) {
                    if($value->type=='xar_naqt' OR $value->type=='xar_plastik'){
                        $summa = $summa + $value['amount'];
                    }
                }
                $data[$i]['int'] = $summa;
                $data[$i]['string'] = number_format($summa, 0, '.', ' ');
            }elseif($type=='ishhaqi'){
                $summa = 0;
                foreach ($MoliyaHistory as $key => $value) {
                    if($value->type=='ish_naqt' OR $value->type=='ish_plas'){
                        $summa = $summa + $value['amount'];
                    }
                }
                $data[$i]['int'] = $summa;
                $data[$i]['string'] = number_format($summa, 0, '.', ' ');
            }
        }
        return $data;
    }

    protected function daromad(){
        $balans = $this->exsonSumma('balans');
        $xarajat = $this->BalansHistory('xarajat');
        $ishhaqi = $this->BalansHistory('ishhaqi');
        $data = [];
        for($i=0;$i<6;$i++){
            $summa = $balans[$i]['int'] - $xarajat[$i]['int'] - $ishhaqi[$i]['int'];
            $data[$i]['int'] = $summa;
            $data[$i]['string'] = number_format($summa, 0, '.', ' ');
        }
        return $data;
    }

    public function MonchChart(){
        $data = [
            'naqt' => $this->sumMonch('naqt'),
            'plastik' => $this->sumMonch('plastik'),
            'qaytarildi' => $this->sumMonch('qaytarildi'),
            'chegirma' => $this->sumMonch('chegirma'),
            'exson' => $this->exsonSumma('exson'),
            'xarajat' => $this->BalansHistory('xarajat'),
            'ishhaqi' => $this->BalansHistory('ishhaqi'),
            'daromad' => $this->daromad(),
        ];
        return $data;
    }





}