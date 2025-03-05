<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\GroupUser;
use App\Models\Group;
use App\Models\Paymart;
use App\Models\GroupDays;
use App\Models\LessenTime;
use Illuminate\Support\Facades\Log;

class PaymartUserController extends Controller{
    public function index(){
        $Paymart = Paymart::where('user_id',auth()->user()->id)->select('amount','paymart_type','created_at')->get();
        return response()->json(['paymart' => $Paymart], 200);
    }
}
