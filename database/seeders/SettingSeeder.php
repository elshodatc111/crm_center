<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder{
    public function run(): void{
        Setting::create([
            'name' => 'Asosiy Sozlamalar',
            'status' => 'true',
            'balans_naqt' => 0, 
            'balans_plastik' => 0, 
            'balans_exson' => 0, 
            'exson_foiz' => 5.00, 
            'message_mavjud' => true,
            'message_count' => 10,
            'message_status' => true,
            'new_student_sms' => true,
            'new_hodim_sms' => false,
            'pay_student_sms' => true,
            'pay_hodim_sms' => false,
            'update_pass_sms' => true,
            'birthday_sms' => true,
        ]);
    }
}
