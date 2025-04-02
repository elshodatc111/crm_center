<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Eslatma;

class UserBritisday extends Controller{
    public function index(){
        $today = Carbon::today();
        $users =User::whereRaw("DATE_FORMAT(birthday, '%m-%d') = ?", [$today->format('m-d')])->get();
        return view('admin.user.index',compact('users'));
    }

    public function eslatmalar(){
        $Eslatma = Eslatma::where('status','true')->get();
        $array = [];
        foreach ($Eslatma as $key => $value) {
            $array[$key]['id'] = $value->id;
            $array[$key]['user_id'] = $value->user_id;
            $array[$key]['name'] = User::find($value->user_id)->user_name;
            $array[$key]['message'] = $value->message;
            $array[$key]['admin'] = User::find($value->admin_id)->user_name;
            $array[$key]['created_at'] = $value->created_at;
        }
        return view('admin.user.eslatma',compact('array'));
    }

    public function eslatmalar_trash(Request $request){
        $Eslatma = Eslatma::find($request->id);
        $Eslatma->status = 'false';
        $Eslatma->save();
        return redirect()->back()->with('success', 'Eslatma bekor qilindi');
    }
}
