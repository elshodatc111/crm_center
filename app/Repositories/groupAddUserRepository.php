<?php
namespace App\Repositories;

use App\Models\Group;
use App\Models\User;
use App\Models\UserHistory;
use App\Models\GroupUser;
use App\Models\SettingPaymart;
use App\Models\Paymart;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class groupAddUserRepository {

    protected function addChegirma(int $group_id, int $user_id){
        $user = User::find($user_id);
        $group = Group::find($group_id);
        if (!$user || !$group) {
            return 0;
        }
        $SettingPaymart = SettingPaymart::find($group->setting_paymarts ?? 0);
        if (!$SettingPaymart) {
            return 0;
        }
        $today = Carbon::now()->format('Y-m-d');
        $lessin_start = $group['lessen_start'];
        $onlyDate = Carbon::parse($lessin_start)->format('Y-m-d');
        $uchKunKeyin = Carbon::createFromFormat('Y-m-d', $onlyDate)->addDays(3)->format('Y-m-d');
        if($uchKunKeyin>=$today){
            $amount = intval($SettingPaymart->amount ?? 0);
            $chegirma = intval($SettingPaymart->chegirma ?? 0);
            $mavjud = $amount - $chegirma;
            $user_balans = intval($user->balans ?? 0);
            if ($user_balans >= $mavjud) {
                return $chegirma;
            }
        }
        return 0;
    }


    public function addGroups(array $data){
        $user = User::findOrFail($data['user_id']);
        $group = Group::findOrFail($data['group_id']);
        $user->group_count += 1;
        $user->balans -= $group->price;
        $check = $this->addChegirma($group->id, $user->id);
        if($check>0){
            UserHistory::create([
                'user_id' => $user->id,
                'type' => 'chegirma_add',
                'type_commit' => "{$check} so'm (Oldindan to'lov uchun chegirma)",
                'admin_id' => Auth::id(),
            ]);
            $user->balans += $check;
            Paymart::create([
                'user_id' => $user->id,
                'group_id' => $group->id,
                'amount' => $check,
                'paymart_type' => 'chegirma',
                'description' => 'Oldindan to\'lov uchun chegirma',
                'admin_id' => Auth::id(),
            ]);
        }
        UserHistory::create([
            'user_id' => $user->id,
            'type' => 'group_add',
            'type_commit' => '"'.$group->group_name .'" Narxi: '.$group->price.' Guruhga qo\'shildi',
            'admin_id' => Auth::id(),
        ]);
        $user->save();
        return GroupUser::create([
            'user_id' => $user->id,
            'group_id' => $group->id,
            'start_meneger' => Auth::id(),
            'start_discription' => $data['start_discription'],
            'status' => 1,
        ]);
        
    }
}
