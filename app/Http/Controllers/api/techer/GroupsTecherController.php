<?php

namespace App\Http\Controllers\api\techer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

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
}
