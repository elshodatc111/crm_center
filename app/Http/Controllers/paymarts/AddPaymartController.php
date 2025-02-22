<?php

namespace App\Http\Controllers\paymarts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PaymartRequest;
use App\Services\PaymartService;

class AddPaymartController extends Controller{
    private PaymartService $paymartService;

    public function __construct(PaymartService $paymartService){
        $this->paymartService = $paymartService;
        $this->middleware('meneger');
    }

    public function store(PaymartRequest $request){
        $this->paymartService->addPayUser($request->validated());
        //dd($request);
        return redirect()->back()->with('success', 'To\'lov qabul qilindi.');
    }
}
