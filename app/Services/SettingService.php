<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;
use Carbon\Carbon;

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

}
