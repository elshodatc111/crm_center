<?php

namespace App\Http\Controllers\admin\cours;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CoursService;
use App\Http\Requests\CreateCoursRequest;
use App\Models\Cours;
use App\Models\CoursTest;
use App\Models\CoursVideo;

class CoursController extends Controller{
    
    private CoursService $coursService;
    public function __construct(CoursService $coursService){
        $this->coursService = $coursService;
        $this->middleware('admin');
    }
    public function index(){
        $cours = $this->coursService->getAllCours();
        return view('admin.setting.cours.index',compact('cours'));
    }
    public function store(CreateCoursRequest $request){
        $this->coursService->createCours($request->validated());
        return redirect()->back()->with('success', 'Yangi kurs saqlandi');
    }
    public function update(Request $request){
        $this->coursService->updateCours($request->id);
        return redirect()->back()->with('success', 'Kurs o\'chirildi');
    }
    
}
