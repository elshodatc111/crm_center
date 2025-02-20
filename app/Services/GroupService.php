<?php

namespace App\Services;

use App\Models\Cours;
use App\Models\SettingRoom;
use App\Models\SettingPaymart;
use App\Models\User;
use App\Models\LessenTime;

class GroupService{
    
    public function getGroupResours(){
        return [
            'cours' => Cours::where('status', 'true')->select('id', 'cours_name')->get(),
            'rooms' => SettingRoom::where('status', 'true')->select('id', 'room_name')->get(),
            'paymarts' => SettingPaymart::where('status', 'true')->select('id', 'amount', 'chegirma', 'admin_chegirma')->get(),
            'techers' => User::where('status', 'true')->where('type', 'techer')->select('id', 'user_name')->get(),
            'time' => LessenTime::select('id', 'number', 'time')->get(),
        ];
    }
}
