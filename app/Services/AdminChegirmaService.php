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
/*
  "user_id" => "13"
  "guruh_id" => "1"
  "chegirma" => "150 000"
  "description" => "Test Uchun"
*/
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

}