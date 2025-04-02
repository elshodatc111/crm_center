<?php

namespace App\Http\Controllers\kassa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChiqimRequest;
use App\Http\Requests\XarajatRequest;
use App\Services\KassaService;

class KassaController extends Controller{

    private KassaService $kassaService;

    public function __construct(KassaService $kassaService){
        $this->kassaService = $kassaService;
    }
    
    public function index(){
        $getKassa = $this->kassaService->getKassa();
        $returnPaymart = $this->kassaService->returnPaymart();
        $pedding = $this->kassaService->peddingKassa();
        $paymarts = $this->kassaService->tulovlar();
        return view('kassa.index',compact('getKassa','returnPaymart','pedding','paymarts'));
    }

    public function chiqim(ChiqimRequest $request){
        $check = $this->kassaService->checkKassa($request->validated()); 
        if($check){
            $this->kassaService->chiqimPost($request->validated());  
            return redirect()->back()->with('success', 'Kassadan chiqim tasdiqlash kutilmoqda!');
        }else{
            return redirect()->back()->with('success', 'Kassada mablag\' mavjud emas!');
        }
    }

    public function xarajat(XarajatRequest $request){
        $check = $this->kassaService->checkKassa($request->validated()); 
        if($check){
            $this->kassaService->xarajatPost($request->validated()); 
            return redirect()->back()->with('success', 'Kassadan xarajat tasdiqlash kutilmoqda!');
        }else{
            return redirect()->back()->with('success', 'Kassada mablag\' mavjud emas!');
        }
    }

    public function delete(Request $request){
        $this->kassaService->delete($request->id);
        return redirect()->back()->with('success', 'Tasdiqlanmagan chimim bekor qilindi!');
    }

    public function success(Request $request){ 
        $this->kassaService->successKassa($request->id); 
        return redirect()->back()->with('success', 'Chiqim tasdiqlandi!');
    }

}
