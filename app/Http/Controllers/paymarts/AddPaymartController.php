<?php

namespace App\Http\Controllers\paymarts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PaymartRequest;
use App\Services\PaymartService;
use App\Models\User;
use App\Services\message\SendMessageEndService;
use App\Services\message\DebetSendMessage;

class AddPaymartController extends Controller{
    private PaymartService $paymartService;
    private DebetSendMessage $debetSendMessage;
    private SendMessageEndService $sendMessageEndService;

    public function __construct(PaymartService $paymartService,DebetSendMessage $debetSendMessage,SendMessageEndService $sendMessageEndService){
        $this->paymartService = $paymartService;
        $this->sendMessageEndService = $sendMessageEndService;
        $this->debetSendMessage = $debetSendMessage;
        $this->middleware('meneger');
    }

    public function store(PaymartRequest $request){
        $this->paymartService->addPayUser($request->validated());
        $message = "Hurmatli ".User::find($request->user_id)->user_name." ".str_replace(" ","",$request->amount_naqt) + str_replace(" ","",$request->amount_plastik)." so'm to'lov qabul qilindi. ";
        $this->sendMessageEndService->SendMessage($request->user_id, $message, 'pay_student_sms');
        return redirect()->back()->with('success', 'To\'lov qabul qilindi.');
    }

    public function debetMessage(Request $request){
        $group_id = $request->group_id;
        $count = $this->debetSendMessage->sendMessages($group_id);
        return redirect()->back()->with('success', $count.' ta qarzdor talabaga sms xabar yuborildi.');
    }


}
