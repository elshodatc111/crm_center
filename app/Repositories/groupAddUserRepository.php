<?php
namespace App\Repositories;

use App\Models\Group;
use App\Models\User;
use App\Models\UserHistory;
use App\Models\GroupUser;
use Illuminate\Support\Facades\Auth;

class groupAddUserRepository {
    public function addGroups(array $data){
        $user = User::findOrFail($data['user_id']);
        $group = Group::findOrFail($data['group_id']);
        $user->group_count += 1;
        $user->balans -= $group->price;
        $user->save();
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
