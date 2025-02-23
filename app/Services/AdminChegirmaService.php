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
use App\Models\UserHistory;
use App\Models\MenegerChart;
use App\Models\SettingChegirma;

class AdminChegirmaService{

    public function getGroups(int $user_id) {
        $GroupUser = GroupUser::where('user_id',$user_id)->where('status',1)->get();
        $Guruh = [];
        foreach ($GroupUser as $key => $value) {
            $Group = Group::find($value->group_id);
            $setting_paymarts_id = $Group->setting_paymarts;
            $SettingPaymart = SettingPaymart::find($setting_paymarts_id);
            $admin_chegirma = $SettingPaymart->admin_chegirma;
            $Paymart = Paymart::where('user_id',$user_id)->where('group_id',$value->group_id)->where('paymart_type','chegirma')->get();
            if ($Paymart->isEmpty()) {
                $Guruh[$key]['guruh_id'] = $value->group_id;
                $Guruh[$key]['guruh_name'] = $Group->group_name;
                $Guruh[$key]['admin_chegirma'] = intval($admin_chegirma);
            }
        }
        return $Guruh;
    }
    
    public function chegirmaAdmin(array $data){
        $Group = Group::find($data['guruh_id']);
        $setting_paymarts_id = $Group->setting_paymarts;
        $SettingPaymart = SettingPaymart::find($setting_paymarts_id);
        $admin_chegirma = $SettingPaymart->admin_chegirma;
        $data['chegirma'] = intval(str_replace(' ','',$data['chegirma']));
        if($data['chegirma']>$admin_chegirma){
            return false;
        }
        $User = User::find($data['user_id']);
        UserHistory::create([
            'user_id' => $data['user_id'],
            'type' => 'chegirma_add',
            'type_commit' => "Admin tamonidan ".$data['chegirma']." so'm chegirma(".$data['description'].")",
            'admin_id' => auth()->id(),
        ]);
        if ($User) {
            $User->increment('balans', $data['chegirma']);
        }
        Paymart::create([
            'user_id' => $data['user_id'],
            'group_id' => $data['guruh_id'],
            'amount' => $data['chegirma'],
            'paymart_type' => 'chegirma',
            'description' => $data['description'],
            'admin_id' => auth()->id(),
        ]);
        return true;
    }

    public function holidayDiscount(){
        $SettingChegirma = SettingChegirma::where('status','true')->first();
        if ($SettingChegirma) {
            return [
                'status' => 'true',
                'amount' => intval($SettingChegirma->amount),
                'chegirma' => intval($SettingChegirma->chegirma),
                'comment' => $SettingChegirma->comment,
            ];
        }else{
            return [
                'status' => 'false',
                'amount' => 0,
                'chegirma' => 0,
                'comment' => 'false',
            ];
        }
    }
    /*
      "user_id" => "12"
      "amount" => "500000"
      "chegirma" => "50000"
      "type" => "naqt"
      "discription" => "asdasd"
    */
    protected function addPay(int $user_id, string $group_id, int $price, string $type, string $description) {
        return Paymart::create([
            'user_id' => $user_id,
            'group_id' => $group_id,
            'amount' => $price,
            'paymart_type' => $type,
            'description' => $description,
            'admin_id' => auth()->id(),
        ]);
    }
    protected function addHistory(int $user_id, string $type, string $type_commit) {
        return UserHistory::create([
            'user_id' => $user_id,
            'type' => $type,
            'type_commit' => $type_commit,
            'admin_id' => auth()->id(),
        ]);
    }
    protected function updateUserBalance(int $user_id, int $price) {
        $User = User::find($user_id);
        if ($User) {
            $User->increment('balans', $price);
        }
    }
    protected function updateMenegerChart(int $price, string $type) {
        $User = MenegerChart::find(auth()->id());
        if ($User) {
            if ($type == 'naqt') {
                $User->increment('paymart_add_naqt', $price);
            } elseif ($type == 'plastik') {
                $User->increment('paymart_add_plastik', $price);
            } else {
                $User->increment('chegirma_add', $price);
            }
        }
    }
    protected function updateKassa(int $price, string $type) {
        $Kassa = Kassa::firstOrCreate([], ['naqt' => 0, 'plastik' => 0]);
        if ($type == 'naqt') {
            $Kassa->increment('naqt', $price);
        } else {
            $Kassa->increment('plastik', $price);
        }
    }
    public function storeHolidayDiscount(array $data){
        if($data['type']=='naqt'){
            $type = 'naqt';
        }else{
            $type = 'plastik';
        }
        $this->addPay($data['user_id'], 'null', $data['amount'], $type, $data['discription']);
        $this->addPay($data['user_id'], 'null', $data['chegirma'], 'chegirma', $data['discription']);
        $this->addHistory($data['user_id'], 'paymart_add', $data['amount']." so'm to'lov qildi(".$data['discription'].")");
        $this->addHistory($data['user_id'], 'chegirma_add', $data['amount']." so'm to'lov ucnun ".$data['chegirma']." so\'m chegirma (".$data['discription'].")");
        $this->updateUserBalance($data['user_id'], $data['amount']);
        $this->updateUserBalance($data['user_id'], $data['chegirma']);
        $this->updateMenegerChart($data['amount'], $type);
        $this->updateKassa($data['amount'], $type);
        return true;
    }

}