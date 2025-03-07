<?php

namespace App\Http\Controllers\chart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChartController extends Controller{

    public function vised(){
        return view('chart.vised');
    }

    public function paymart(){
        return view('chart.paymart');
    }
    
}
