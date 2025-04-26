<?php
namespace App\Services;

use App\Models\Holiday;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Cours;
use App\Models\CoursAudio;
use App\Models\CoursTest;
use App\Models\CoursVideo;

class CoursService{

    public function getAllCours(){
        $Cours = Cours::where('status','true')->get();
        $response = array();
        foreach ($Cours as $key => $value) {
            $response[$key]['id'] = $value->id;
            $response[$key]['cours_name'] = $value->cours_name;
            $response[$key]['video'] = count(CoursVideo::where('cours_id',$value->id)->get());
            $response[$key]['test'] = count(CoursTest::where('cours_id',$value->id)->get());
            $response[$key]['audio'] = count(CoursAudio::where('cours_id',$value->id)->get());
        }
        return $response;
    }
    public function getItemCours(int $id){
        return Cours::find($id);
    }

    public function createCours(array $data){
        $data['user_id'] = auth()->id();
        return Cours::create($data);
    }

    public function updateCours(int $id){
        $Cours = Cours::find($id);
        $Cours->status = 'false';
        return $Cours->save();
    }
    
    public function getAllVideo(int $cours_id){
        return CoursVideo::where('cours_id',$cours_id)->orderBy('id','ASC')->get();
    }
    public function createVideo(array $data){
        $data['user_id'] = auth()->id();
        return CoursVideo::create($data);
    }
    
    public function getAllTest(int $cours_id){
        return CoursTest::where('cours_id',$cours_id)->orderBy('id','ASC')->get();
    }
    public function createTest(array $data){
        $data['user_id'] = auth()->id();
        return CoursTest::create($data);
    }



}