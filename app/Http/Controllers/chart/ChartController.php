<?php

namespace App\Http\Controllers\chart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\chart\VisedService;

class ChartController extends Controller{
    protected $visedService;

    public function __construct(VisedService $visedService){
        $this->visedService = $visedService;
    }

    public function vised(){
        $Hudud = $this->visedService->Hudud();
        $Social = $this->visedService->Social();
        $tashrif = $this->visedService->tashriflar();
        $activeUser = $this->visedService->activeUser();
        return view('chart.vised', compact('Hudud','Social','tashrif','activeUser'));
    }

    public function paymart(){
        return view('chart.paymart');
    }

    public function techer(){
        return view('chart.techer');
    }
    
}
