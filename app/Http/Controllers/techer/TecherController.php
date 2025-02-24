<?php

namespace App\Http\Controllers\techer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class TecherController extends Controller{
    
    public function index(){
        $User = User::where('type','techer')->get();
        return view('techer.index',compact('User'));
    }

    public function show($id){
        return view('techer.show');
    }

}
