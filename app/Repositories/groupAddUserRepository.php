<?php
namespace App\Repositories;

use App\Models\Group;
use App\Models\User;
use App\Models\UserHistory;
use App\Models\GroupUser;
use App\Models\SettingPaymart;
use App\Models\Paymart;
use Illuminate\Support\Facades\Auth;

class groupAddUserRepository {
    protected function addChegirma(int $group_id, int $user_id){
        $user = User::find($user_id);
        $group = Group::find($group_id);
        $SettingPaymart = SettingPaymart::find($group->setting_paymarts);
        $mavjud = intval($SettingPaymart->amount)-intval($SettingPaymart->chegirma);
        $user_balans = $user->balans;
        if($user_balans>=$mavjud){
            UserHistory::create([
                'user_id' => $user_id,
                'type' => 'chegirma_add',
                'type_commit' => "Admin tamonidan ".intval($SettingPaymart->chegirma)." so'm chegirma(Oldindan to'lov uchun chegirma)",
                'admin_id' => auth()->id(),
            ]);
            $user->increment('balans', intval($SettingPaymart->chegirma));
            Paymart::create([
                'user_id' => $user_id,
                'group_id' => $group_id,
                'amount' => intval($SettingPaymart->chegirma),
                'paymart_type' => 'chegirma',
                'description' => 'Oldindan to\'lov uchun chegirma',
                'admin_id' => auth()->id(),
            ]);
        }
    }


    public function addGroups(array $data){
        $user = User::findOrFail($data['user_id']);
        $group = Group::findOrFail($data['group_id']);
        $user->group_count += 1;
        $user->balans -= $group->price;
        $user->save();
        $this->addChegirma($group->id, $user->id);
        UserHistory::create([
            'user_id' => $user->id,
            'type' => 'group_add',
            'type_commit' => '"' . $group->group_name . "' Guruhga qo'shildi",
            'admin_id' => Auth::id(),
        ]);
        return GroupUser::create([
            'user_id' => $user->id,
            'group_id' => $group->id,
            'start_meneger' => Auth::id(),
            'start_discription' => $data['start_discription'],
            'status' => 1,
        ]);
    }
}
