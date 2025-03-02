<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\Social;
use App\Models\Setting;
use App\Models\TecherPaymart;
use App\Models\MoliyaHistory;
use App\Models\Varonka;
use App\Models\VaronkaHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


/*
  "" => "social_telegram"
  "" => "Elshod"
  "" => "Musurmonov"
  "phone1" => "+998 94 520 4004"
  "phone2" => "+998 90 558 4516"
  "address" => "Shahrisabz_sh"
  "birth_date" => "1997-02-01"
*/

class VaronkaServise{
    public function createRegister(array $data){
        $type = User::where('phone1', $data['phone1'])
            ->where('type', 'student')
            ->exists() ? 'repeat' : 'new';
        return Varonka::create(array_filter([
            'user_name' => trim("{$data['name']} {$data['surname']}"),
            'phone1' => $data['phone1'],
            'phone2' => $data['phone2'] ?? null,
            'address' => $data['address'] ?? null,
            'birthday' => $data['birth_date'] ?? null,
            'status' => $type,
            'type_social' => $data['visited'] ?? null,
        ]));
    }
}