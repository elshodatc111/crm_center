<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\report\UsersService;

class ReportController extends Controller{
    protected $usersService;

    public function __construct(
        UsersService $usersService,
        ){
    $this->usersService = $usersService;
}

    public function users(){
        return view('report.users');
    }

    public function users_next(Request $request){
        $type = $request->type;
        $all = [];
        $debit = [];
        $active = [];
        if($type=='all'){
            $all = $this->usersService->all();
        }elseif($type=='debet'){
            $all = $this->usersService->debit();
        }
        return view('report.users_next',compact('type','all','debit','active'));
    }

    public function paymart(){
        return view('report.paymart');
    }

    public function group(){
        return view('report.group');
    }

    public function message(){
        return view('report.message');
    }

}
