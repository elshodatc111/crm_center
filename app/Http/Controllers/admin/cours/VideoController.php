<?php

namespace App\Http\Controllers\admin\cours;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CoursService;
use App\Models\Cours;
use App\Models\CoursTest;
use App\Models\CoursVideo;
use App\Http\Requests\CreateVideoRequest;

class VideoController extends Controller{
    private CoursService $coursService;
    public function __construct(CoursService $coursService){
        $this->coursService = $coursService;
        $this->middleware('admin');
    }
    
    public function index($id){
        $cours = $this->coursService->getItemCours($id);
        $video = $this->coursService->getAllVideo($id);
        return view('admin.setting.cours.video',compact('cours','video'));
    }

    public function store(CreateVideoRequest $request){
        $this->coursService->createVideo($request->validated());
        return redirect()->back()->with('success', 'Yangi video darslik saqlandi');
    }

    public function delete(Request $request){
        $CoursVideo = CoursVideo::find($request->id);
        $CoursVideo->delete();
        return redirect()->back()->with('success', 'Video darslik o\'chirildi');
    }

}
