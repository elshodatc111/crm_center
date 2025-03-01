<?php

namespace App\Http\Controllers\varonka;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterUserRequest;

class VaronkaController extends Controller{
    public $visited = [
        'social_telegram',
        'social_instagram',
        'social_facebook',
        'social_youtube',
        'social_banner',
        'social_tanish',
        'social_boshqa',
    ];
    // URL: env('APP_URL')."/".$visited
    public function user($visited){
        
        
        return view('varonka.user.index',compact('visited'));
    }

    public function register(RegisterUserRequest $request){
        $data = $request->validated();
        dd($data);
    }

}
