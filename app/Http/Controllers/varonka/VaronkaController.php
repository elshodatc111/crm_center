<?php

namespace App\Http\Controllers\varonka;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterUserRequest;
use App\Services\StudentService;
use App\Services\VaronkaServise;

class VaronkaController extends Controller{
    private StudentService $studentService;
    private VaronkaServise $varonkaServise;

    public function __construct(StudentService $studentService,VaronkaServise $varonkaServise){
        $this->studentService = $studentService;
        $this->varonkaServise = $varonkaServise;
    }

    public $visited = [
        'social_telegram',
        'social_instagram',
        'social_facebook',
        'social_youtube',
        'social_banner',
        'social_tanish',
        'social_boshqa',
    ];

    public function user($visited){
        $adders = $this->studentService->getAddres();
        return view('varonka.user.index',compact('visited','adders'));
    }

    public function register(RegisterUserRequest $request){
        $data = $request->validated();
        $this->varonkaServise->createRegister($data);
        return redirect()->route('user_varonka_success')->with('success', 'Foydalanuvchi muvaffaqiyatli qo‘shildi!');
    }

    public function success(){
        return view('varonka.user.success');
    }
    
}
