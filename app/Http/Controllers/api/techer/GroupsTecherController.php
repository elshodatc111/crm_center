<?php

namespace App\Http\Controllers\api\techer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use App\Models\TestCheck;
use App\Models\TecherPaymart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\DavomadPostRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Services\techer\TecherAppService;

class GroupsTecherController extends Controller{

    protected $techerAppService;

    public function __construct(TecherAppService $techerAppService){
        $this->techerAppService = $techerAppService;
    } 

    public function groups(){
        $res = $this->techerAppService->allGroups();
        return response()->json($res, 200);
    }

    public function group($id){
        $res = $this->techerAppService->group($id);
        return response()->json($res, 200);
    }

    public function davomadPost(DavomadPostRequest $request){
        foreach ($request->attendances as $attendanceData) {
            $res = $this->techerAppService->CreateDavomad($attendanceData);
        }
        return response()->json(['message' => 'Davomad olindi'], 201);
    }

    public function paymarts(){
        $TecherPaymart = TecherPaymart::where('techer_paymarts.user_id',auth()->user()->id)
        ->join('groups','groups.id','techer_paymarts.group_id')
        ->select('groups.group_name','techer_paymarts.amount','techer_paymarts.type','techer_paymarts.created_at')
        ->get();
        return response()->json(['message' => $TecherPaymart], 200);
    }

}





