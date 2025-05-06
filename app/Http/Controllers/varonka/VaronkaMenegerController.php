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
use App\Jobs\SendMessageWork;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterVaronkaRequest;

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
        $Varonka = Varonka::whereIn('status', ['new','repeat'])->paginate(100);
        $count =count($Varonka);
        return view('varonka.admin.new',compact('Varonka','count'));
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
        $comment = $this->varonkaServise->comment($id);
        $checkPhone = User::where('phone1',$user['phone1'])->first();
        if($checkPhone){
            $status = true;
        }else{
            $status = false;
        }
        return view('varonka.admin.show',compact('user','check','comment','status'));
    }

    public function cancelVaronka(Request $request){
        $user = $this->varonkaServise->requestCancel($request->id);
        return redirect()->back()->with('success', 'Murojat bekor qilindi.');
    }

    public function commentsVaronka(Request $request){
        $user = $this->varonkaServise->createComment($request->id,$request->comment);
        return redirect()->back();
    }

    public function register(RegisterVaronkaRequest $request){
        $varonka_id = $request->id;
        $about = $request->about;
        $varomka = Varonka::find($varonka_id);
        $users = $this->studentService->createStudent([
            'user_name' => $varomka['user_name'],
            'phone1' => $varomka['phone1'],
            'phone2' => $varomka['phone2'],
            'address' => $varomka['address'],
            'birthday' => $varomka['birthday'],
            'about' => $about,
        ]);
        $this->studentService->sotsials($varomka->type_social);
        $this->studentService->countAddres($varomka['address']);
        VaronkaHistory::create([
            'varonka_id'=>$varonka_id,
            'comment'=>"Murojat ro'yhatga olindi.",
            'admin_id'=>auth()->user()->id,
        ]);
        $varomka->status = 'success';
        $varomka->register_id = $users->id;
        $varomka->save();
        dispatch(new SendMessageWork($users->id, 'new_student_sms',auth()->user()->id));
        return redirect()->back()->with('success', 'Murojat ro\'yhatga olindi.');
    }


    public function index_all(){
        $user = Varonka::get();
        return view('varonka.admin.show_all',compact('user'));
    }
}
