<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\report\UsersService;
use App\Services\report\MessageService;
use App\Services\report\PaymartService;

class ReportController extends Controller{
    protected $usersService;
    protected $messageService;
    protected $paymartService;

    public function __construct(
        UsersService $usersService,
        MessageService $messageService,
        PaymartService $paymartService,
        ){
    $this->usersService = $usersService;
    $this->messageService = $messageService;
    $this->paymartService = $paymartService;
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
            $debit = $this->usersService->debit();
        }elseif($type=='active'){
            $active = $this->usersService->activeUser();
        }
        return view('report.users_next',compact('type','all','debit','active'));
    }

    public function message(){
        return view('report.message');
    }

    public function message_next(Request $request){
        $start = $request->start." 00:00:00";
        $end = $request->end." 23:59:59";
        $response = $this->messageService->message($start,$end);
        return view('report.message_next',compact('response'));
    }

    public function paymart(){
        return view('report.paymart');
    }

    public function paymart_next(Request $request){
        $start = $request->start." 00:00:00";
        $end = $request->end." 23:59:59";
        $type = $request->type;
        $response = $this->paymartService->paymart($type, $start, $end);
        //dd($response);
        return view('report.paymart_next',compact('type','start','end','response'));
    }

    public function group(){
        return view('report.group');
    }


}
