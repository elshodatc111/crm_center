<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Social;
use App\Http\Requests\StoreVisitRequest;
use App\Services\StudentService;
use App\Jobs\SendMessageWork;
use App\Http\Requests\ShowStudentRequest;
use App\Http\Requests\UserAboutUpdateRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Requests\AddStudentToGroupRequest;

class StudentController extends Controller{

    private StudentService $studentService;

    public function __construct(StudentService $studentService){
        $this->studentService = $studentService;
        $this->middleware('meneger');
    }

    public function checkPhoneExist(Request $request){
        $phone1 = $request->input('phone1');
        $exists = User::where('phone1', $phone1)->where('type', 'student')->exists();
        return response()->json(['exists' => $exists]);
    }

    public function index(Request $request){
        $users = $this->studentService->getStudents($request->search);
        $addres = $this->studentService->getAddres();
        return view('student.index', compact('users','addres'));
    }

    public function store(StoreVisitRequest $request){
        $users = $this->studentService->createStudent($request->validated());
        $this->studentService->sotsials($request->about_me);
        $this->studentService->countAddres($users->address);
        dispatch(new SendMessageWork($users->id, 'new_student_sms',auth()->user()->id)); // SendMessageWork(user_id, message_type, admin_id)
        return redirect()->route('all_student')->with('success', 'Tashrif muvaffaqiyatli saqlandi!');
    }

    public function show(ShowStudentRequest $request, $id){
        $addGroups = $this->studentService->addStudentGroup($id);
        $student = $this->studentService->getShow($id);
        $history = $this->studentService->getShowHistory($id);
        return view('student.show', compact('student','history','addGroups'));
    }

    public function update_about(UserAboutUpdateRequest $request){
        $this->studentService->updateAbout($request->id, $request->about);
        return redirect()->back()->with('success', 'Saqlandi.');
    }

    public function update_password(Request $request){
        $this->studentService->updatePassword($request->user_id);
        dispatch(new SendMessageWork($request->user_id, 'update_pass_sms',auth()->user()->id));
        return redirect()->back()->with('success', 'Parol yangilandi.');
    }

    public function update(UpdateStudentRequest $request){
        $this->studentService->updateStudent($request->validated());
        return redirect()->back()->with('success', 'Talaba ma’lumotlari yangilandi.');
    }

    public function addGroups(AddStudentToGroupRequest $request){
        $this->studentService->addGroups($request->validated());
        return redirect()->back()->with('success', 'Yangi guruhga qo\'shildi.');
    }

}
