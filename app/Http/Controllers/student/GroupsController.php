<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cours;
use App\Models\Group;
use App\Models\SettingRoom;
use App\Models\SettingPaymart;
use App\Models\LessenTime;
use App\Services\GroupService;
use App\Services\StudentService;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Http\Requests\RemoveUserGroupsRequest;
use App\Http\Requests\GroupNextStoreRequest;


class GroupsController extends Controller{
    protected $groupService;
    private StudentService $studentService;

    public function __construct(StudentService $studentService, GroupService $groupService){
        $this->studentService = $studentService;
        $this->groupService = $groupService;
    }

    public function index(Request $request){
        $resours = $this->groupService->getGroupResours($request->search);
        return view('groups.index', compact('resours'));
    }
    

    public function store(StoreGroupRequest $request){
        $group = $this->groupService->createGroup($request->validated()); 
        return redirect()->back()->with('success', 'Yangi guruh muvaffaqiyatli qo‘shildi!');
    }

    public function show(int $id){
        $response = $this->groupService->groupsShow($id);
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

    public function newStore(GroupNextStoreRequest $request){
        $new_groups = $this->groupService->createGroup($request->validated()); 
        $student = $request['students'];
        $group_ids = $request['group_ids'];
        $groups_id_new = $new_groups->id;
        $Group = Group::find($group_ids);
        $Group->next = $groups_id_new; 
        $Group->save();
        foreach ($student as $key => $value) {
            $this->studentService->addGroups([
                "user_id" => $value,
                "group_id" => $groups_id_new,
                "start_discription" => $new_groups->group_name,
            ]);
        }
        return back()->with('success', 'Guruh davom ettirildi.');
    }
}
