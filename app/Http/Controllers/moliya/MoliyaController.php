<?php

namespace App\Http\Controllers\moliya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\ExpenseRequest;
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
        $moliya = $this->moliyaService->MoliyaHistory(); 
        $history = $this->moliyaService->history($chiqim, $moliya); 
        return view('moliya.index',compact('service','kassa','chiqim','history','moliya'));
    }

    public function updateExson(Request $request){
        $this->settingService->exsonUpdate($request->exson_percent);
        return redirect()->back()->with('success', 'Exson foizi taxrirlandi!');
    }

    public function balansChiqim(StoreExpenseRequest $request){
        $check = $this->moliyaService->check($request->validated());
        if($check){
            $this->moliyaService->chiqimStore($request->validated());
            return redirect()->back()->with('success', 'Balansdan chiqim qilindi!');
        }else{
            return redirect()->back()->with('success', 'Chiqim uchun balansda yetarli mablag\' mavjud emas!');
        }
    }

    public function xarajatBalans(ExpenseRequest $request){
        $check = $this->moliyaService->check($request->validated());
        if($check){
            $this->moliyaService->xarajatStore($request->validated());
            return redirect()->back()->with('success', 'Balansdan xarajat qilindi!');
        }else{
            return redirect()->back()->with('success', 'Chiqim uchun balansda yetarli mablag\' mavjud emas!');
        }
    }

}
