<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreVisitRequest;
use App\Services\StudentService;
use App\Jobs\SendMessageWork;
use App\Http\Requests\ShowStudentRequest;

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
        return view('student.index', compact('users'));
    }

    public function store(StoreVisitRequest $request){
        $users = $this->studentService->createStudent($request->validated());
        $this->studentService->sotsials($request->about_me);
        dispatch(new SendMessageWork($users->id, 'new_student_sms',auth()->user()->id)); // SendMessageWork(user_id, message_type, admin_id)
        return redirect()->route('all_student')->with('success', 'Tashrif muvaffaqiyatli saqlandi!');
    }

    public function show(ShowStudentRequest $request, $id){
        $student = User::where('type', 'student')->findOrFail($id);
        //dd($student);
        return view('student.show', compact('student'));
    }



}
