<?php

namespace App\Http\Controllers\chart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\chart\VisedService;
use App\Services\chart\PaymartService;
use App\Services\chart\TecherService;
use App\Services\chart\TecherReytingService;
use App\Services\chart\TecherReytingServiceTwo;

class ChartController extends Controller{
    protected $visedService;
    protected $paymartService;
    protected $techerService;
    protected $techerReytingService;

    public function __construct(
            VisedService $visedService,
            TecherReytingServiceTwo $techerReytingServiceTwo,
            PaymartService $paymartService,
            TecherService $techerService,
            TecherReytingService $techerReytingService){
        $this->visedService = $visedService;
        $this->paymartService = $paymartService;
        $this->techerService = $techerService;
        $this->techerReytingService = $techerReytingService;
        $this->techerReytingServiceTwo = $techerReytingServiceTwo;
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
        return view('chart.paymart',compact('allMurojat','monchMurojat','days','monch','DaysChart','MonchChart'));
    }

    public function paymart_show($data){
        $paymart = $this->paymartService->paymartDay($data);
        return view('chart.show',compact('data','paymart'));
    }

    public function techer(){
        $item = $this->techerService->getAll();
        return view('chart.techer',compact('item'));
    }

    public function techerReyting(){
        $techer = $this->techerReytingService->reyting();
        //dd($techer);
        return view('chart.reyting',compact('techer'));
    }

    public function techerReytingTwo(){
        $return = $this->techerReytingServiceTwo->getCharts();
        return view('chart.techer_one',compact('return'));
    }
    
}
