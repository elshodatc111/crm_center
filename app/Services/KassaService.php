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

class KassaService{

    public function getKassa() {
        return Kassa::first();
    }
/*
        "description" => "Test Uchun"
        "created_at" => "2025-02-22 21:32:31"
        "user_name" => "Super Admin"
*/
    public function returnPaymart(){
        $status = Carbon::now()->subDays(7)->format('Y-m-d 00:00:00');
        $return = Paymart::join('users','users.id','paymarts.admin_id')
            ->where('paymarts.paymart_type', 'qaytarildi')
            ->where('paymarts.created_at', '>=', $status)
            ->select('users.user_name as admin','paymarts.user_id','paymarts.amount','paymarts.description','paymarts.created_at')
            ->get();
        if($return){
            return $return;
        } else{

        }
    }

}