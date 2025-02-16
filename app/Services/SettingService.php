<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use App\Models\SettingPaymart;

class SettingService{

    public function getSetting(){
        return Setting::first();
    }
    public function updateSettings(array $data): bool{
        $setting = Setting::first();
        if (!$setting) {
            return false;
        }
        $setting->update([
            'new_student_sms' => isset($data['new_student_sms']) ? 1 : 0,
            'new_hodim_sms' => isset($data['new_hodim_sms']) ? 1 : 0,
            'pay_student_sms' => isset($data['pay_student_sms']) ? 1 : 0,
            'pay_hodim_sms' => isset($data['pay_hodim_sms']) ? 1 : 0,
            'update_pass_sms' => isset($data['update_pass_sms']) ? 1 : 0,
            'birthday_sms' => isset($data['birthday_sms']) ? 1 : 0,
        ]);
        return true;
    }
    public function createPaymart(array $data): SettingPaymart{
        $data['user_id'] = auth()->id();
        return SettingPaymart::create($data);
    }
    public function getPaymart(){
        $SettingPaymart = SettingPaymart::where('status','true')->get();
        $res = array();
        foreach ($SettingPaymart as $key => $value) {
            $res[$key]['id'] = $value->id;
            $res[$key]['amount'] = $value->amount;
            $res[$key]['chegirma'] = $value->chegirma;
            $res[$key]['admin_chegirma'] = $value->admin_chegirma;
            $res[$key]['user_id'] = User::find($value->id)->user_name;
        }
        return $res;
    }
    public function getPaymartDelete(){
        $SettingPaymart = SettingPaymart::where('status','delete')->get();
        $res = array();
        foreach ($SettingPaymart as $key => $value) {
            $res[$key]['id'] = $value->id;
            $res[$key]['amount'] = $value->amount;
            $res[$key]['chegirma'] = $value->chegirma;
            $res[$key]['admin_chegirma'] = $value->admin_chegirma;
            $res[$key]['user_id'] = User::find($value->id)->user_name;
        }
        return $res;
    }

}
