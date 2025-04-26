<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\GroupUser;
use App\Models\Group;
use App\Models\CoursAudio;
use App\Models\GroupDays;
use App\Models\LessenTime;
use Illuminate\Support\Facades\Log;

class GroupUserController extends Controller
{
    public function index(){
        $now = date('Y-m-d H:i:s', strtotime('-30 days')); // 30 kun oldingi sana
    
        $GroupUser = GroupUser::where('group_users.user_id', auth()->user()->id)
            ->where('group_users.status', 1)
            ->join('groups', 'group_users.group_id', '=', 'groups.id')
            ->where('groups.lessen_end', '>=', $now) // lessen_end 30 kundan eski bo'lmasligi kerak
            ->select('groups.id', 'groups.group_name', 'groups.lessen_start', 'groups.lessen_end')
            ->get();
    
        return response()->json(['groups' => $GroupUser], 200);
    }
    public function show($id){
        $Group = Group::where('groups.id',$id)
            ->join('cours','groups.cours_id','cours.id')
            ->join('lessen_times','groups.cours_id','lessen_times.id')
            ->join('users','groups.techer_id','users.id')
            ->join('setting_rooms','groups.setting_rooms_id','setting_rooms.id')
            ->select('groups.id','groups.cours_id','groups.group_name','groups.price','groups.lessen_count','groups.lessen_start','groups.lessen_end','cours.cours_name','users.user_name as techer','setting_rooms.room_name','lessen_times.time')
            ->first();
        $days = GroupDays::where('group_id',$id)->select('date')->get();
        $audios = CoursAudio::where('cours_id',$Group->cours_id)->select('audio_name','audio_number','audio_url')->orderby('audio_number','asc')->get();
        return response()->json(['groups' => $Group,'days'=>$days,'audios'=>$audios], 200);
    }
    
}
