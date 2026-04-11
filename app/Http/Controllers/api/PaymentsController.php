<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\HodimPaymart;
use App\Models\Paymart;
use App\Models\TecherPaymart;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller{

    public function studentPayment(){
        $payments = Paymart::where('user_id',Auth::id())->get();
        $res = [];
        foreach ($payments as $value) {
            $res[] =[
                'id' => $value->id,
                'amount' => $value->amount,
                'paymart_type' => $value->paymart_type='naqt'?"Naqt":$value->paymart_type='plastik'?"Karta":$value->paymart_type='chegirma'?"Chegira":"Qaytarildi",
                'description' => $value->description,
                'time' => $value->created_at->format('Y-m-d H:i'),
            ];
        }
        return response()->json([
            'success' => true,
            'data' => $res
        ], 200);
    }

    public function teacherPayments(){
        $payments = TecherPaymart::where('user_id',Auth::id())->get();
        $res = [];
        foreach ($payments as $value) {
            $res[] =[
                'id' => $value->id,
                'group' => $value->group->group_name,
                'amount' => $value->amount,
                'paymart_type' => $value->paymart_type='naqt'?"Naqt":$value->paymart_type='plastik'?"Karta":$value->paymart_type='chegirma'?"Chegira":"Qaytarildi",
                'description' => $value->description,
                'time' => $value->created_at->format('Y-m-d H:i'),
            ];
        }
        return response()->json([
            'success' => true,
            'data' => $res
        ], 200);
    }

    public function hodimPayments(){
        $payments = HodimPaymart::where('user_id',Auth::id())->get();
        $res = [];
        foreach ($payments as $value) {
            $res[] =[
                'id' => $value->id,
                'amount' => $value->amount,
                'paymart_type' => $value->paymart_type='naqt'?"Naqt":$value->paymart_type='plastik'?"Karta":$value->paymart_type='chegirma'?"Chegira":"Qaytarildi",
                'description' => $value->description,
                'time' => $value->created_at->format('Y-m-d H:i'),
            ];
        }
        return response()->json([
            'success' => true,
            'data' => $res
        ], 200);
    }

    public function index(){
        $type = Auth::user()->type;
        if($type=='student'){
            return $this->studentPayment();
        }elseif($type=='techer'){
            return $this->teacherPayments();
        }else{
            return $this->hodimPayments();
        }
    }

}
