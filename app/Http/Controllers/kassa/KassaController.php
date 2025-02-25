<?php

namespace App\Http\Controllers\kassa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\KassaService;

class KassaController extends Controller{

    private KassaService $kassaService;

    public function __construct(KassaService $kassaService){
        $this->kassaService = $kassaService;
    }

    public function index(){
        $returnPaymart = $this->kassaService->returnPaymart();
        
        return view('kassa.index','returnPaymart');
    }
}
