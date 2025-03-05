<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestUserController extends Controller
{
    public function index(){
        return response()->json(['testlar' => []], 200);
    }

    public function shows($id){
        return response()->json(['test' => $id], 200);
    }

    public function store(Request $request){
        $array['group_id'] = $request->group_id;
        $array['count_true'] = $request->count_true;
        $array['ball'] = $request->count_true*2;
        $array['count'] = $request->count;
        return response()->json(['test post' => $array], 200);
    }


}
