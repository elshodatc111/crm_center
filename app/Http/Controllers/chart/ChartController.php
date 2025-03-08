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
        $days = $this->paymartService->getLastNineDays();
        $monch = $this->visedService->getLastSixMonths();
        $DaysChart = $this->paymartService->DaysChart();
        $MonchChart = $this->paymartService->MonchChart();
        //dd($MonchChart); 
        return view('chart.paymart',compact('allMurojat','monchMurojat','days','monch','DaysChart','MonchChart'));
    }


    public function paymart_show($data){
        $paymart = $this->paymartService->paymartDay($data);
        return view('chart.show',compact('data','paymart'));
    }

    public function techer(){
        return view('chart.techer');
    }
    
}
