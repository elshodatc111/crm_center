<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cours;
use App\Models\SettingRoom;
use App\Models\SettingPaymart;
use App\Models\LessenTime;
use App\Services\GroupService;
use App\Http\Requests\StoreGroupRequest;


class GroupsController extends Controller{
    protected $groupService;

    public function __construct(GroupService $groupService){
        $this->groupService = $groupService;
    }

    public function index(){
        $resours = $this->groupService->getGroupResours();
        return view('groups.index',compact('resours'));
    }

    public function store(StoreGroupRequest $request){
        $this->groupService->createGroup($request->validated());
        return redirect()->back()->with('success', 'Yangi guruh muvaffaqiyatli qo‘shildi!');
    }

}
