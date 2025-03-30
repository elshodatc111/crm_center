<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;

class UserBritisday extends Controller{
    public function index(){
        $today = Carbon::today();
        $users =User::whereRaw("DATE_FORMAT(birthday, '%m-%d') = ?", [$today->format('m-d')])->get();
        return view('admin.user.index',compact('users'));
    }
}
