<?php

namespace App\Http\Controllers\admin\cours;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CoursService;
use App\Http\Requests\CreateCoursRequest;
use App\Http\Requests\StoreCoursAudioRequest;
use App\Models\Cours;
use App\Models\CoursTest;
use App\Models\CoursVideo;
use App\Models\CoursAudio;

class AudioController extends Controller
{
    private CoursService $coursService;
    public function __construct(CoursService $coursService){
        $this->coursService = $coursService;
        $this->middleware('admin');
    }
    public function index($id){ 
        $cours = $this->coursService->getItemCours($id);
        $audio = CoursAudio::where('cours_id',$id)->orderBy('audio_number','ASC')->get();
        //dd($cours);
        return view('admin.setting.cours.audio',compact('cours','audio'));
    }

    public function store(StoreCoursAudioRequest $request){
        CoursAudio::create($request->validated());
        return redirect()->back()->with('success', 'Audio muvaffaqiyatli saqlandi!');
    }

    public function delete(Request $request){
        $id = $request->id;
        $audio = CoursAudio::find($id);
        $audio->delete();
        return redirect()->back()->with('success', 'Audio muvaffaqiyatli o\'chirildi!');
    }
}
