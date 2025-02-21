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
use App\Http\Requests\GroupUpdateRequest;
use App\Http\Requests\RemoveUserGroupsRequest;


class GroupsController extends Controller{
    protected $groupService;

    public function __construct(GroupService $groupService){
        $this->groupService = $groupService;
    }

    public function index(Request $request)
    {
        $resours = $this->groupService->getGroupResours($request->search);
        return view('groups.index', compact('resours'));
    }
    

    public function store(StoreGroupRequest $request){
        $this->groupService->createGroup($request->validated()); 
        return redirect()->back()->with('success', 'Yangi guruh muvaffaqiyatli qo‘shildi!');
    }

    public function show(int $id){
        $response = $this->groupService->groupsShow($id); 
        //dd($response['groups']);
        return view('groups.show', compact('response'));
    }

    public function update(GroupUpdateRequest $request){
        $this->groupService->groupUpdate($request->validated()); 
        return redirect()->back()->with('success', 'Guruh malumotlari yangilandi!');
    }

    public function removeUser(RemoveUserGroupsRequest $request){
        $this->groupService->remoteGroupUser($request->validated());   
        return back()->with('success', 'Foydalanuvchi guruhdan muvaffaqiyatli o‘chirildi.');
    }

}
