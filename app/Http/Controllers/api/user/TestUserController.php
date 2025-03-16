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
use App\Models\CoursTest;
use App\Models\TestCheck;
use Illuminate\Support\Facades\Log;

class TestUserController extends Controller{
    public function index(){
        $now = date('Y-m-d H:i:s');
        $GroupUser = GroupUser::where('group_users.user_id', auth()->user()->id)
            ->where('group_users.status', 1)
            //->where('groups.lessen_end', '<=', $now)
            ->join('groups', 'group_users.group_id', '=', 'groups.id')
            ->select('groups.cours_id', 'groups.id as group_id', 'groups.group_name')
            ->get();
        $Testlar = [];
        foreach ($GroupUser as $key => $value) {
            $TestCheck = TestCheck::where('user_id', auth()->user()->id)->where('group_id', $value['group_id'])->first();
            $CoursTest = CoursTest::where('cours_id', $value['cours_id'])->inRandomOrder()->limit(15)->get();
            $Test = [];
            foreach ($CoursTest as $key2 => $value2) {
                $answers = [
                    ["test" => $value2->javob_true, "status" => true],
                    ["test" => $value2->javob_false_first, "status" => false],
                    ["test" => $value2->javob_false_two, "status" => false],
                    ["test" => $value2->javob_false_thre, "status" => false],
                ];
                shuffle($answers);
                $Test[$key2] = [
                    'test' => $value2->test,
                    'javob' => $answers
                ];
            }
            $Testlar[$key] = [
                'cours_id' => $value['cours_id'],
                'group_id' => $value['group_id'],
                'user_id' => auth()->user()->id,
                'group_name' => $value['group_name'],
                'test' => 15,
                'urinishlar' => $TestCheck ? $TestCheck->count : 0,
                'tugri_javob' => $TestCheck ? $TestCheck->count_true : 0,
                'ball' => $TestCheck ? ($TestCheck->count_true * 2) : 0,
                'testlar' => $Test,
            ];
        }
        return response()->json(['testlar' => $Testlar], 200);
    }

    public function store(Request $request){
        $TestCheck = TestCheck::where('user_id',auth()->user()->id)->where('group_id',$request->group_id)->first();
        if($TestCheck){
            $TestCheck->count = $TestCheck->count + 1;
            $TestCheck->count_true = $request->count_true;
            $TestCheck->ball = ($request->count_true)*2;
            $TestCheck->save();
            return response()->json(['status' => 'success'], 200);
        }else{
            TestCheck::create([
                'user_id' => auth()->user()->id,
                'group_id' => $request->group_id,
                'count' => 1,
                'count_true' => $request->count_true,
                'ball' => ($request->count_true)*2,
            ]);
            return response()->json(['status' => 'success'], 200);
        }
    }


}
