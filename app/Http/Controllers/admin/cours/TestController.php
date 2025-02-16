<?php

namespace App\Http\Controllers\admin\cours;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CoursService;
use App\Models\Cours;
use App\Models\CoursTest;
use App\Models\CoursVideo;
use App\Http\Requests\CreateTestRequest;

class TestController extends Controller{

    private CoursService $coursService;

    public function __construct(CoursService $coursService){
        $this->coursService = $coursService;
        $this->middleware('admin');
    }
    
    public function index($id){
        $cours = $this->coursService->getItemCours($id);
        $test = $this->coursService->getAllTest($id);
        return view('admin.setting.cours.test',compact('cours','test'));
    }

    public function store(CreateTestRequest $request){
        $this->coursService->createTest($request->validated());
        return redirect()->back()->with('success', 'Yangi test saqlandi.');
    }

    public function delete(Request $request){
        $CoursTest = CoursTest::find($request->id);
        $CoursTest->delete();
        return redirect()->back()->with('success', 'Test o\'chirildi');
    }
}
