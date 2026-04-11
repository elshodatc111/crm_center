<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\{Cours, CoursAudio, CoursTest, CoursVideo, GroupDays,GroupUser, TestCheck};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursController extends Controller{
    
    public function coursVidoe(){
        $groupUser = GroupUser::where('user_id',Auth::id())->where('status',true)->orderBy('created_at', 'desc')->get();
        $res = [];
        foreach ($groupUser as $value) {
            $group_id = $value->group_id;
            $cours_id = $value->group->cours_id;
            $cours = Cours::findOrFail($cours_id);
            $countVideo = CoursVideo::where('cours_id',$cours_id)->count();
            if($countVideo>0){
                $res[] = [
                    'group_id'     => $group_id,
                    'group_name'   => $value->group->group_name,
                    'cours_id'  => $cours_id,
                    'cours_name'  => $cours->cours_name,
                    'video_count' => $countVideo
                ];
            }            
        }
        return response()->json([
            'success' => true,
            'data' => $res
        ], 200);
    }

    public function coursVideoShow(int $cours_id){
        $Videos = CoursVideo::where('cours_id',$cours_id)->orderby('lessen_number', 'asc')->get();
        $res = [];
        foreach ($Videos as $value) {
            $res[] = [
                'number' => $value->lessen_number,
                'name' => $value->cours_name,
                'url' => $value->video_url,
            ];
        }  
        return response()->json([
            'success' => true,
            'data' => $res
        ], 200);  
    }

    public function coursAudio(){
        $groupUser = GroupUser::where('user_id',Auth::id())->where('status',true)->orderBy('created_at', 'desc')->get();
        $res = [];
        foreach ($groupUser as $value) {
            $group_id = $value->group_id;
            $cours_id = $value->group->cours_id;
            $cours = Cours::findOrFail($cours_id);
            $countAudio = CoursAudio::where('cours_id',$cours_id)->count();
            if($countAudio>0){
                $res[] = [
                    'group_id'     => $group_id,
                    'group_name'   => $value->group->group_name,
                    'cours_id'  => $cours_id,
                    'cours_name'  => $cours->cours_name,
                    'audio_count' => $countAudio,
                ];
            }            
        }
        return response()->json([
            'success' => true,
            'data' => $res
        ], 200);
    }

    public function coursAudioShow(int $cours_id){
        $Audios = CoursAudio::where('cours_id',$cours_id)->orderby('audio_number', 'asc')->get();
        $res = [];
        foreach ($Audios as $key => $value) {
            $res[] = [
                'number' => $value->audio_number,
                'name' => $value->audio_name,
                'url' => $value->audio_url,
            ];
        }  
        return response()->json([
            'success' => true,
            'data' => $res
        ], 200);  
    }

    public function coursTest(){
        $groupUser = GroupUser::where('user_id',Auth::id())->where('status',true)->orderBy('created_at', 'desc')->get();
        $res = [];
        foreach ($groupUser as $value) {
            $group_id = $value->group_id;
            $cours_id = $value->group->cours_id;
            $cours = Cours::findOrFail($cours_id);
            $countTest = CoursTest::where('cours_id',$cours_id)->count();
            if($countTest>0){
                $testCheck = TestCheck::where('user_id',Auth::id())->where('group_id',$group_id)->first();
                $res[] = [
                    'group_id'     => $group_id,
                    'group_name'   => $value->group->group_name,
                    'cours_id'  => $cours_id,
                    'cours_name'  => $cours->cours_name,
                    'test_count' => $countTest,
                    'urinishlar' => $testCheck?$testCheck->count:0,
                    'tugri' => $testCheck?$testCheck->count_true:0,
                    'ball' => $testCheck?$testCheck->ball:0,
                ];
            }            
        }
        return response()->json([
            'success' => true,
            'data' => $res
        ], 200);
    }

    public function coursTestShow(int $group_id, int $cours_id){
        $test = CoursTest::where('cours_id', $cours_id)->inRandomOrder()->limit(15)->get();
        $res = [];
        foreach ($test as $value) {
            $tests = rand(1,10);
            switch ($tests) {
                case 1:
                    $res[] = [ 'savol' => $value->test, 'a' => $value->javob_true, 'b' => $value->javob_false_first, 'c' => $value->javob_false_two, 'd' => $value->javob_false_thre, 'answer' => 'a', ];
                    break;
                case 2:
                    $res[] = [ 'savol' => $value->test, 'a' => $value->javob_false_first, 'b' => $value->javob_false_two, 'c' => $value->javob_true, 'd' => $value->javob_false_thre, 'answer' => 'c', ];
                    break;
                case 3:
                    $res[] = [ 'savol' => $value->test, 'a' => $value->javob_false_first, 'b' => $value->javob_true, 'c' => $value->javob_false_two, 'd' => $value->javob_false_thre, 'answer' => 'b', ];
                    break;
                case 4:
                    $res[] = [ 'savol' => $value->test, 'a' => $value->javob_false_first, 'b' => $value->javob_false_two, 'c' => $value->javob_false_thre, 'd' => $value->javob_true, 'answer' => 'd', ];
                    break;
                case 5:
                    $res[] = [ 'savol' => $value->test, 'a' => $value->javob_true, 'b' => $value->javob_false_two, 'c' => $value->javob_false_first, 'd' => $value->javob_false_thre, 'answer' => 'a', ];
                    break;
                case 6:
                    $res[] = [ 'savol' => $value->test, 'a' => $value->javob_false_thre, 'b' => $value->javob_true, 'c' => $value->javob_false_first, 'd' => $value->javob_false_two, 'answer' => 'b', ];
                    break;
                case 7:
                    $res[] = [ 'savol' => $value->test, 'a' => $value->javob_true, 'b' => $value->javob_false_thre, 'c' => $value->javob_false_two, 'd' => $value->javob_false_first, 'answer' => 'a', ];
                    break;
                case 8:
                    $res[] = [ 'savol' => $value->test, 'a' => $value->javob_false_thre, 'b' => $value->javob_true, 'c' => $value->javob_false_two, 'd' => $value->javob_false_first, 'answer' => 'b', ];
                    break;
                case 9:
                    $res[] = [ 'savol' => $value->test, 'a' => $value->javob_false_first, 'b' => $value->javob_false_two, 'c' => $value->javob_false_thre, 'd' => $value->javob_true, 'answer' => 'd', ];
                    break;
                case 10:
                    $res[] = [ 'savol' => $value->test, 'a' => $value->javob_false_thre, 'b' => $value->javob_false_two, 'c' => $value->javob_true, 'd' => $value->javob_false_first, 'answer' => 'c', ];
                    break;
                default:
                    break;
            }
        }
        return response()->json([
            'success' => true,
            'data' => [
                'group_id' => $group_id,
                'cours_id' => $cours_id,
                'test' => $res
            ]
        ], 200);
    }

    public function TestCheckPost(Request $request){
        $group_id = $request->group_id;
        $answer = $request->answer;
        $TestCheck = TestCheck::where('user_id',Auth::id())->where('group_id',$group_id)->first();

        if($TestCheck){
            $TestCheck->count = $TestCheck->count + 1;
            $TestCheck->count_true = $answer;
            $TestCheck->ball = ($answer)*2;
            $TestCheck->save();
        }else{
            TestCheck::create([
                'user_id' => Auth::id(),
                'group_id' => $group_id,
                'count' => 1,
                'count_true' => $answer,
                'ball' => ($answer)*2,
            ]);
        }
        return response()->json([
            'success' => true,
            'data' => [
                'count_true' => $answer,
                'ball' => ($answer)*2,
            ],
            'message' => "Test mofaqiyatli saqlandi",
        ], 200);
    }

}
