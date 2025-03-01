<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Social;
use App\Http\Requests\StoreVisitRequest;
use App\Services\StudentService;
use App\Services\PaymartService;
use App\Services\PaymartReturnService;
use App\Services\KassaService;
use App\Services\AdminChegirmaService;
use App\Jobs\SendMessageWork;
use App\Jobs\PaymartMessageWork;
use App\Http\Requests\ShowStudentRequest;
use App\Http\Requests\UserAboutUpdateRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Requests\AddStudentToGroupRequest;
use App\Http\Requests\RefundRequest;
use App\Http\Requests\ChegirmaRequest;
use App\Http\Requests\DiscountPaymentRequest;

class StudentController extends Controller{

    private StudentService $studentService;
    private PaymartService $paymartService;
    private KassaService $kassaService;
    private PaymartReturnService $paymartReturnService;
    private AdminChegirmaService $adminChegirmaService;

    public function __construct(
                                StudentService $studentService,
                                PaymartService $paymartService,
                                KassaService $kassaService,
                                PaymartReturnService $paymartReturnService,
                                AdminChegirmaService $adminChegirmaService
                            ){
        $this->paymartService = $paymartService;
        $this->studentService = $studentService;
        $this->kassaService = $kassaService;
        $this->paymartReturnService = $paymartReturnService;
        $this->adminChegirmaService = $adminChegirmaService;
        $this->middleware('meneger');
    }

    public function checkPhoneExist(Request $request){
        $phone1 = $request->input('phone1');
        $exists = User::where('phone1', $phone1)->where('type', 'student')->exists();
        return response()->json(['exists' => $exists]);
    }

    public function index(Request $request){
        $users = $this->studentService->getStudents($request->search);
        $addres = $this->studentService->getAddres();
        return view('student.index', compact('users','addres'));
    }

    public function store(StoreVisitRequest $request){
        $users = $this->studentService->createStudent($request->validated());
        $this->studentService->sotsials($request->about_me);
        $this->studentService->countAddres($users->address);
        dispatch(new SendMessageWork($users->id, 'new_student_sms',auth()->user()->id)); // SendMessageWork(user_id, message_type, admin_id) 
        return redirect()->route('all_student')->with('success', 'Tashrif muvaffaqiyatli saqlandi!');
    }

    public function show(ShowStudentRequest $request, $id){
        $addGroups = $this->studentService->addStudentGroup($id);
        $student = $this->studentService->getShow($id);
        $history = $this->studentService->getShowHistory($id);
        $user_groups = $this->studentService->studentGroups($id);
        $chegirma_groups = $this->paymartService->chegirmaGroups($id);
        $kassa = $this->kassaService->getKassa();
        $paymarts = $this->paymartService->getPaymarts($id);
        $adminChegirmaGroup = $this->adminChegirmaService->getGroups($id);
        $holidayDiscount = $this->adminChegirmaService->holidayDiscount();
        //dd($holidayDiscount);
        return view('student.show', compact('student','history','addGroups','user_groups','chegirma_groups','kassa','paymarts','adminChegirmaGroup','holidayDiscount'));
    }

    public function update_about(UserAboutUpdateRequest $request){
        $this->studentService->updateAbout($request->id, $request->about);
        return redirect()->back()->with('success', 'Saqlandi.');
    }

    public function update_password(Request $request){
        $this->studentService->updatePassword($request->user_id);
        dispatch(new SendMessageWork($request->user_id, 'update_pass_sms',auth()->user()->id));
        return redirect()->back()->with('success', 'Parol yangilandi.');
    }

    public function update(UpdateStudentRequest $request){
        $this->studentService->updateStudent($request->validated());
        return redirect()->back()->with('success', 'Talaba ma’lumotlari yangilandi.');
    }

    public function addGroups(AddStudentToGroupRequest $request){
        $this->studentService->addGroups($request->validated());
        return redirect()->back()->with('success', 'Yangi guruhga qo\'shildi.');
    }
    
    public function returnPaymarts(RefundRequest $request){
        $Kassa = intval($request->kassa_amount);
        $Amount = intval(str_replace(" ","",$request->amount));
        if($Amount>$Kassa){
            return redirect()->back()->with('success', 'Kassada yetarli mablag\' mavjud emas.');
        }
        $patmart_id = $this->paymartReturnService->returnPaymart($request->user_id,$Amount,$request->description);
        dispatch(new PaymartMessageWork($patmart_id,'qaytarildi', $request->user_id, auth()->user()->id, 'pay_student_sms'));
        return redirect()->back()->with('success', 'To\'lov qaytarish yakunlandi.');
    }

    public function chegirmaAdmin(ChegirmaRequest $request){
        $type = $this->adminChegirmaService->chegirmaAdmin($request->validated());
        if($type){
            return redirect()->back()->with('success', 'Chegirma qabul qilindi.');
        }else{
            return redirect()->back()->with('error', 'Chegirma summasi noto\'g\'ri.');
        }
    }

    public function discountPayment(DiscountPaymentRequest $request){
        $type = $this->adminChegirmaService->storeHolidayDiscount($request->validated());
        return redirect()->back()->with('success', 'Chegirma to\'lov qabul qilindi.');
    }
    

}
