<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideoUserController extends Controller
{
    public function index(){
        return response()->json(['video' => []], 200);
    }

    public function shows($id){
        return response()->json(['video_about' => $id], 200);
    }
}
