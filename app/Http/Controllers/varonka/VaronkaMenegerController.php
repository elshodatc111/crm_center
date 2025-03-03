<?php

namespace App\Http\Controllers\varonka;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\StudentService;
use App\Services\VaronkaServise;
use App\Models\User;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\Social;
use App\Models\Setting;
use App\Models\TecherPaymart;
use App\Models\MoliyaHistory;
use App\Models\Varonka;
use App\Models\VaronkaHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VaronkaMenegerController extends Controller{
    private StudentService $studentService;
    private VaronkaServise $varonkaServise;

    public function __construct(StudentService $studentService,VaronkaServise $varonkaServise){
        $this->studentService = $studentService;
        $this->varonkaServise = $varonkaServise;
    }

    public function index(){
        $charts = $this->varonkaServise->chats();
        return view('varonka.admin.index',compact('charts'));
    }

    public function newAll(){
        $Varonka = Varonka::where('status', 'new')->paginate(10); 
        $count = count( Varonka::where('status', 'new')->get());
        return view('varonka.admin.new',compact('Varonka','count'));
    }
    
    public function newRepeat(){
        $Varonka = Varonka::where('status', 'repeat')->paginate(10); 
        $count = count( Varonka::where('status', 'repeat')->get());
        return view('varonka.admin.repeat',compact('Varonka','count'));
    }

    public function newPedding(){
        $Varonka = Varonka::where('status', 'pedding')->paginate(10); 
        $count = count( Varonka::where('status', 'pedding')->get());
        return view('varonka.admin.pedding',compact('Varonka','count'));
    }
    
    public function newSuccess(){
        $Varonka = Varonka::where('status', 'success')->paginate(10); 
        $count = count( Varonka::where('status', 'success')->get());
        return view('varonka.admin.success',compact('Varonka','count'));
    }

    public function newCancel(){
        $Varonka = Varonka::where('status', 'cancel')->paginate(10); 
        $count = count( Varonka::where('status', 'cancel')->get());
        return view('varonka.admin.cancel',compact('Varonka','count'));
    }

    public function show($id){
        $user = $this->varonkaServise->users($id);
        $check = $this->varonkaServise->check($id);
        //dd($user);

        return view('varonka.admin.show',compact('user','check'));
    }

    public function cancelVaronka(Request $request){
        $user = $this->varonkaServise->requestCancel($request->id);
        return redirect()->back()->with('success', 'Murojat bekor qilindi.');
    }



}
