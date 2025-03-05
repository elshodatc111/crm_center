<?php

namespace App\Http\Controllers\api\techer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use App\Models\TestCheck;
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
            $check = $this->techerAppService->checkDavomadDay($attendanceData);
            if($check){
                $res = $this->techerAppService->CreateDavomad($attendanceData);
            }else{
                return response()->json(['message' => 'Bugun davomad kuni emas'], 422);
            }
        }
        return response()->json(['message' => 'Davomad olindi'], 201);
    }


}
