<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\GroupUser;
use App\Models\Group;
use App\Models\Cours;
use App\Models\CoursVideo;
use App\Models\GroupDays;
use App\Models\LessenTime;
use Illuminate\Support\Facades\Log;

class VideoUserController extends Controller{
    public function index(){
        // Hozirgi sanadan 30 kun oldingi sanani olish
        $now = date('Y-m-d H:i:s', strtotime('-30 days'));
    
        $GroupUser = GroupUser::where('group_users.user_id', auth()->user()->id)
            ->where('group_users.status', 1)
            ->where('groups.lessen_end', '>=', $now) // lessen_end 30 kun oldingi sanadan katta bo'lishi kerak
            ->join('groups', 'group_users.group_id', '=', 'groups.id')
            ->select('groups.cours_id', 'groups.lessen_end') // lessen_end ni ham olish kerak
            ->distinct()
            ->get();
    
        $Cours = [];
    
        foreach ($GroupUser as $key => $value) {
            // lessen_end 30 kundan ortiq vaqt o'tgan bo'lsa, qo'shmaymiz
            if (strtotime($value['lessen_end']) < strtotime('-30 days')) {
                continue;
            }
    
            $Cours[$key]['id'] = $value['cours_id'];
            $Cours[$key]['name'] = Cours::find($value['cours_id'])->cours_name;
        }
    
        return response()->json(['video' => $Cours], 200);
    }
    
    public function shows($id){
        $Cours = Cours::find($id);
        $Video = CoursVideo::where('cours_id',$id)->orderby('lessen_number','asc')->select('id','cours_name','video_url')->get();
        return response()->json(['cours' => [
            'id' => $Cours['id'],
            'cours_name' => $Cours['cours_name'],
        ],'video' => $Video], 200);
    }
}
