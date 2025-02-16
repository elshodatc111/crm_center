<?php

namespace App\Http\Controllers\admin\cours;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CoursService;
use App\Models\Cours;
use App\Models\CoursTest;
use App\Models\CoursVideo;

class TestController extends Controller{
    private CoursService $coursService;
    public function __construct(CoursService $coursService){
        $this->coursService = $coursService;
        $this->middleware('admin');
    }
    
    public function index($id){
        return view('admin.setting.cours.test');
    }
}
