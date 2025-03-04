<?php

namespace App\Http\Controllers\api\techer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class GroupsTecherController extends Controller{
    public function groups(){
        $group = Group::where('techer_id',auth()->user()->id)->get();
        $res = [];
        foreach ($group as $key => $value) {
            $today = date('Y-m-d');
            if ($today >= date('Y-m-d', strtotime($value['lessen_start'])) && $today <= date('Y-m-d', strtotime($value['lessen_end']))) {
                $status = 'active';
            } elseif ($today > date('Y-m-d', strtotime($value['lessen_end']))) {
                $status = 'end';
            } elseif ($today < date('Y-m-d', strtotime($value['lessen_start']))) {
                $status = 'new';
            }
            $res[$key]['id'] = $value['id'];
            $res[$key]['group_name'] = $value['group_name'];
            $res[$key]['status'] = $status;
            $res[$key]['lessen_end'] = Carbon::parse($value['lessen_end'])->format('Y-m-d');
            $res[$key]['lessen_start'] = Carbon::parse($value['lessen_start'])->format('Y-m-d'); // Y-m-d 
        }
        return response()->json($res, 200);
    }

    public function group($id){
        return response()->json($id, 200);
    }
}
