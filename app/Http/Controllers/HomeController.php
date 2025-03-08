<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HomeService;

class HomeController extends Controller{
    
    private $homeService;

    public function __construct(HomeService $homeService){
        $this->homeService = $homeService;
        $this->middleware('auth');
    }
    public function index(){
        $jadval = $this->homeService->getJadval();
        //dd($jadval);
        return view('home',compact('jadval'));
    }
    
}
