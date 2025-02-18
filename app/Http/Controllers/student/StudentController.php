<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreVisitRequest;
use App\Services\StudentService;
use App\Jobs\SendMessageWork;

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
        if ($request->search) {
            $users = User::where('type', 'student')
                            ->where('user_name', 'like', '%' . $request->search . '%')
                            ->orWhere('phone1', 'like', '%' . $request->search . '%')
                            ->paginate(10);
        } else {
            $users = User::where('type', 'student')
                         ->orderBy('id', 'desc')
                         ->paginate(10);
        }
        return view('student.index', compact('users'));
    }

    public function store(StoreVisitRequest $request){
        $users = $this->studentService->createStudent($request->validated());

        dispatch(new SendMessageWork($users->id, 'new_student_sms'));

        return redirect()->route('all_student')->with('success', 'Tashrif muvaffaqiyatli saqlandi!');
    }


}
