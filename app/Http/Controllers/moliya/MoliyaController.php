<?php

namespace App\Http\Controllers\moliya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MoliyaService;
use App\Services\KassaService;
use App\Services\SettingService;

class MoliyaController extends Controller{
    
    private MoliyaService $moliyaService;
    private KassaService $kassaService;
    private SettingService $settingService;

    public function __construct(MoliyaService $moliyaService, KassaService $kassaService, SettingService $settingService){
        $this->moliyaService = $moliyaService;
        $this->kassaService = $kassaService;
        $this->settingService = $settingService;
    }

    public function index(){
        $service = $this->settingService->getSetting();
        $kassa = $this->kassaService->getKassa();
        $chiqim = $this->kassaService->successAllKassa();
        //dd($chiqim);
        return view('moliya.index',compact('service','kassa','chiqim'));
    }

    public function updateExson(Request $request){
        $this->settingService->exsonUpdate($request->exson_percent);
        return redirect()->back()->with('success', 'Exson foizi taxrirlandi!');
    }

}
