<?php

namespace App\Http\Controllers\hodim;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HodimCreateRequest;
use App\Services\StudentService;
use App\Services\HodimService;

class HodimController extends Controller{
    protected $hodimService;
    protected $studentService;

    public function __construct(HodimService $hodimService, StudentService $studentService){
        $this->hodimService = $hodimService;
        $this->studentService = $studentService;
    }

    public function index(){
        $user = $this->hodimService->allHodim();
        $addres = $this->studentService->getAddres();
        return view('hodim.index',compact('user','addres'));
    }

    public function createHodim(HodimCreateRequest $request){
        $this->hodimService->create($request->validated());
        return redirect()->back()->with('success', 'Yangi hodim ishga olindi!');
    }

    public function show($id){
        $this->hodimService->checkUser($id);

        return view('hodim.show');
    }
}
