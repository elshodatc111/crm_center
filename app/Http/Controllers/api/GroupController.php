<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Davomad, Group, GroupDays, GroupUser};
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller{

    public function student(){
        $now = date("Y-m-d");
        $groupUser = GroupUser::where('user_id',Auth::id())->where('status',true)->orderBy('created_at', 'desc')->get();
        $res = [];
        foreach ($groupUser as $key => $value) {
            if ($now > $value->group->lessen_end) {
                $status = 'end';
            } elseif ($now >= $value->group->lessen_start && $now <= $value->group->lessen_end) {
                $status = 'pending';
            } else {
                $status = 'new';
            }
            $group_days_count = count(GroupDays::where('group_id',$value->group_id)->get());
            $res[$key] = [
                'group_id'     => $value->group_id,
                'group_name'   => $value->group->group_name,
                'status'       => $status,
                'dav_status'   => false,
                'cours_id'  => $value->group->cours_id,
                'lesson_count' => $group_days_count,
                'lessen_start' => Carbon::parse($value->group->lessen_start)->format('Y-m-d'),
                'lessen_end'   => Carbon::parse($value->group->lessen_end)->format('Y-m-d'),
            ];
        }
        return response()->json([
            'success' => true,
            'data' => $res
        ], 200);
    }

    public function teacher(){
        $now = date("Y-m-d");
        $teacher_id = Auth::id();
        $groups = Group::withCount([
            'groupUsers' => function ($query) {
                $query->where('status', true);
            },
            'groupDays'
        ])->where('techer_id', $teacher_id)->orderBy('created_at', 'desc')->get();
        $todayGroupIds = GroupDays::where('date', $now)->pluck('group_id')->toArray();
        $res = $groups->map(function ($group) use ($now, $todayGroupIds) {
            if ($group->group_users_count <= 0) {
                return null; 
            }
            if ($now > $group->lessen_end) {
                return null;
            }
            $status = ($now >= $group->lessen_start && $now <= $group->lessen_end) ? 'pending' : 'new';
            return [
                'group_id'     => $group->id,
                'group_name'   => $group->group_name,
                'status'       => $status,
                'dav_status'   => in_array($group->id, $todayGroupIds),
                'users_count'  => $group->group_users_count,
                'lesson_count' => $group->group_days_count,
                'lessen_start' => Carbon::parse($group->lessen_start)->format('Y-m-d'),
                'lessen_end'   => Carbon::parse($group->lessen_end)->format('Y-m-d'),
            ];
        })->filter()->values();
        return response()->json([
            'success' => true,
            'data' => $res
        ], 200);
    }

    public function hodim(){
        $now = date("Y-m-d");        
        $groups = Group::withCount([
            'groupUsers' => function ($query) {
                $query->where('status', true);
            },
            'groupDays'
        ])->orderBy('created_at', 'desc')->get();
        $todayGroupIds = GroupDays::where('date', $now)->pluck('group_id')->toArray();
        $res = $groups->map(function ($group) use ($now, $todayGroupIds) {
            if ($group->group_users_count <= 0) {
                return null;
            }
            if ($now > $group->lessen_end) {
                return null;
            }
            $status = ($now >= $group->lessen_start && $now <= $group->lessen_end) ? 'pending' : 'new';
            return [
                'group_id'     => $group->id,
                'group_name'   => $group->group_name,
                'status'       => $status,
                'dav_status'   => in_array($group->id, $todayGroupIds),
                'users_count'  => $group->group_users_count,
                'lesson_count' => $group->group_days_count,
                'lessen_start' => Carbon::parse($group->lessen_start)->format('Y-m-d'),
                'lessen_end'   => Carbon::parse($group->lessen_end)->format('Y-m-d'),
            ];
        })->filter()->values();
        return response()->json([
            'success' => true,
            'data' => $res
        ], 200);
    }

    public function index(){
        $type = Auth::user()->type;
        if($type=='techer'){
            return $this->teacher();
        }elseif($type=='student'){
            return $this->student();
        }else{
            return $this->hodim();
        }
    }

    public function show($id){
        $group = Group::findOrFail($id);
        $now = date("Y-m-d");
        $groupDays = GroupDays::where('group_id',$id)->select('date')->get();
        $davomadDay = false;
        $days = [];
        foreach ($groupDays as $key => $value) {
            if($value->date==$now){
                $davomadDay = true;
            }
            $days[$key] = $value->date;
        }
        $groupUsers = GroupUser::where('group_id',$id)->where('status',true)->get();
        $davomads = [];
        if ($now > $group->lessen_end) {
            $status = 'end';
        } elseif ($now >= $group->lessen_start && $now <= $group->lessen_end) {
            $status = 'pending';
        } else {
            $status = 'new';
        }
        foreach ($groupUsers as $key => $value) {
            $user_id = $value->user_id;
            $davomadStatus = Davomad::where('group_id',$id)->where('user_id',$user_id)->where('data',$now)->first();
            $davomads[$key]['user_id'] = $user_id;
            $davomads[$key]['user_name'] = $value->user->user_name;
            $davomads[$key]['status'] = $davomadStatus?$davomadStatus->status:false;
        }
        return response()->json([
            'success' => true,
            'data' => [
                'group' => [
                    'group_id' => $group->id,
                    'cours_id' => $group->cours_id,
                    'cours_name' => $group->course->cours_name,
                    'room_name' => $group->settingRoom->room_name,
                    'techer' => $group->teacher->user_name,
                    'group_name' => $group->group_name,
                    'price' => $group->price,
                    'lessen_count' => $group->lessen_count,
                    'lessen_start' => Carbon::parse($group->lessen_start)->format('Y-m-d'),
                    'lessen_end' => Carbon::parse($group->lessen_end)->format('Y-m-d'),
                    'lessen_time' => $group->lessenTime->time,
                    'lessen_days' => $group->weekday,
                    'davomad_status' => $davomadDay,
                    'group_status' => $status,
                ],
                'lessen_data' => $days,
                'davomads' => $davomads
            ]
        ], 200);
    }

    public function davomadPost(Request $request){
        $request->validate([
            'group_id' => 'required|exists:groups,id',
            'attendances' => 'required|array',
            'attendances.*.user_id' => 'required|exists:users,id',
            'attendances.*.status' => 'required|boolean',
        ]);
        $groupId = $request->group_id;
        $today = date('Y-m-d');
        try {
            DB::transaction(function () use ($request, $groupId, $today) {
                foreach ($request->attendances as $attendance) {
                    Davomad::updateOrCreate(
                        [
                            'group_id' => $groupId,
                            'user_id'  => $attendance['user_id'],
                            'data'     => $today,
                        ],
                        [
                            'status'   => $attendance['status'],
                        ]
                    );
                }
            });
            return response()->json([
                'success' => true,
                'message' => 'Davomad muvaffaqiyatli saqlandi.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Xatolik yuz berdi: ' . $e->getMessage()
            ], 500);
        }
    }

}
