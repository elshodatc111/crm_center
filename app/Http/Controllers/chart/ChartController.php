<?php

namespace App\Http\Controllers\chart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\chart\VisedService;
use App\Services\chart\PaymartService;

class ChartController extends Controller{
    protected $visedService;
    protected $paymartService;

    public function __construct(VisedService $visedService,PaymartService $paymartService){
        $this->visedService = $visedService;
        $this->paymartService = $paymartService;
    }

    public function vised(){
        $Hudud = $this->visedService->Hudud();
        $Social = $this->visedService->Social();
        $tashrif = $this->visedService->tashriflar(); 
        $activeUser = $this->visedService->activeUser();
        return view('chart.vised', compact('Hudud','Social','tashrif','activeUser'));
    }

    public function paymart(){
        $allMurojat = $this->paymartService->allMurojat();
        $monchMurojat = $this->paymartService->monchMurojat();
        //dd($monchMurojat);
        return view('chart.paymart',compact('allMurojat','monchMurojat'));
    }

    public function techer(){
        return view('chart.techer');
    }
    
}
