<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\GroupUser;
use App\Models\Group;
use App\Models\CoursAudio;
use App\Models\SettingRoom;
use App\Models\GroupDays;
use App\Models\CoursVideo;
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
        $Group = Group::where('groups.id',$id)->first();
        $Groups = [
            'id' => $Group->id,
            'group_name' => $Group->group_name,
            'price' => $Group->price,
            'lessen_count' => $Group->lessen_count,
            'lessen_start' => $Group->lessen_start,
            'lessen_end' => $Group->lessen_end,
            'cours_name' => $Group->cours_name,
            'techer' => User::find($Group->techer_id)->user_name,
            'room_name' => SettingRoom::find($Group->setting_rooms_id)->room_name,
            'time' => $Group->time,
            'cours_id' => $Group->cours_id,
        ];
        $days = GroupDays::where('group_id',$id)->select('date')->get();
        $audios = CoursAudio::where('cours_id',$Groups['cours_id'])->select('audio_name','audio_number','audio_url')->orderby('audio_number','asc')->get();
        $audio_status = count($audios) > 0 ? 1 : 0;
        $Video = CoursVideo::where('cours_id',$Groups['cours_id'])->orderby('lessen_number','asc')->select('id','cours_name','video_url')->get();
        $video_status = count($Video) > 0 ? 1 : 0;
        return response()->json(['groups' => $Group,'days'=>$days,'audio_status'=>$audio_status,'audios' => $audios,'video_status'=>$video_status,'video' => $Video], 200);
    }
    
}
