<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\chart\VisedService;
use App\Services\chart\PaymartService;
use App\Services\chart\TecherService;
use App\Services\chart\TecherReytingService;
use App\Services\chart\TecherReytingServiceTwo;
use App\Services\KassaService;
use App\Services\MoliyaService;
use App\Services\SettingService;
use App\Services\HomeService;
use App\Services\report\UsersService;
use App\Models\Paymart;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class HomeAdminController extends Controller{
    protected $visedService;
    protected $paymartService;
    protected $techerService;
    protected $techerReytingService;
    protected $kassaService;
    protected $moliyaService;
    protected $settingService;
    protected $usersService;
    protected $homeService;

    public function __construct(
            VisedService $visedService,
            TecherReytingServiceTwo $techerReytingServiceTwo,
            PaymartService $paymartService,
            TecherService $techerService,
            TecherReytingService $techerReytingService,
            KassaService $kassaService,
            MoliyaService $moliyaService, SettingService $settingService,
            HomeService $homeService,
            UsersService $usersService
            ){
        $this->usersService = $usersService;
        $this->visedService = $visedService;
        $this->homeService = $homeService;
        $this->paymartService = $paymartService;
        $this->techerService = $techerService;
        $this->techerReytingService = $techerReytingService;
        $this->techerReytingServiceTwo = $techerReytingServiceTwo;
        $this->kassaService = $kassaService;
        $this->moliyaService = $moliyaService;
        $this->kassaService = $kassaService;
        $this->settingService = $settingService;
    }

    protected function balansPrice(){
        $service = $this->settingService->getSetting();
        $summa = $service['balans_naqt'] + $service['balans_plastik'] + $service['balans_exson'];
        return [
            'all_price' => number_format($summa, 0, '', ' ') . " UZS",
            'naqt_price' => number_format($service['balans_naqt'], 0, '', ' ') . " UZS",
            'plastik_price' => number_format($service['balans_plastik'], 0, '', ' ') . " UZS",
            'exson_price' => number_format($service['balans_exson'], 0, '', ' ') . " UZS",
        ];
    }
    protected function kassaPrice(){
        $kassa = $this->kassaService->getKassa();
        $summa = $kassa['naqt'] + $kassa['plastik'] + $kassa['naqt_chiq_pedding'] + $kassa['plastik_chiq_pedding'];
        return [
            'all_kassa' => number_format($summa, 0, '', ' ') . " UZS",
            'naqt_mavjud' => number_format($kassa['naqt'], 0, '', ' ') . " UZS",
            'plastik_mavjud' => number_format($kassa['plastik'], 0, '', ' ') . " UZS",
            'naqt_pedding' => number_format($kassa['naqt_chiq_pedding'], 0, '', ' ') . " UZS",
            'plastik_pedding' => number_format($kassa['plastik_chiq_pedding'], 0, '', ' ') . " UZS",
        ];
    }
    protected function paymartPrice(){
        $paymart = Paymart::where('paymarts.created_at', '>=', now()->subDays(1))
        ->join('users', 'users.id', '=', 'paymarts.user_id')
        ->select(
            'users.user_name',
            'paymarts.user_id',
            'paymarts.amount',
            'paymarts.paymart_type',
            'paymarts.description',
            'paymarts.admin_id',
            'paymarts.created_at'
        )
        ->orderBy('paymarts.created_at', 'desc') 
        ->limit(3)
        ->get();
        $summa = 0;
        $array = [];
        foreach($paymart as $key => $value){
            $summa += $value['amount'];
            $array[$key]['user'] = $value->user_name;
            $array[$key]['amount'] = number_format($value->amount, 0, '', ' ') . " UZS";
            $array[$key]['paymart_type'] = $value->paymart_type;
            $array[$key]['created_at'] = date('Y-m-d H:i:s', strtotime($value->created_at));
        }
        return [
            'price' => number_format($summa, 0, '', ' ') . " UZS",
            'paymarts' => $array,
        ];
    }
    public function users(){
        $users = User::where('type', 'student')->where('users.created_at', '>=', now()->subDays(1))->get();
        $array = [];
        foreach($users as $key => $value){
            $array[$key]['id'] = $value->id;
            $array[$key]['user'] = $value->user_name;
            $array[$key]['phone1'] = $value->phone1;
            $array[$key]['phone2'] = $value->phone2;
            $array[$key]['address'] = $value->address;
            $array[$key]['birthday'] = $value->birthday;
            $array[$key]['about'] = $value->about;
            $array[$key]['group_count'] = $value->group_count;
            $array[$key]['email'] = $value->email;
            $array[$key]['balans'] = number_format($value->balans, 0, '', ' ') . " UZS";
        }
        return [
            'users' => $array,
            'count' => count($array),
        ];
    }
    public function index(){
        $jadval = $this->homeService->getJadval();
        $Useers = $this->users();
        $active = $this->usersService->activeUser();
        return response()->json([
            'status' => true,
            'message' => 'Home Statistikasi',
            'balans' => $this->balansPrice(),
            'kassa' => $this->kassaPrice(),
            'paymarts' => $this->paymartPrice(),
            'tashrif_count' => $Useers['count'],
            'active_count' => $active['count'],
            'jadval' => [
                'data'=>$jadval[0]['date'],
                'count' => count($jadval[0]['item']),
                'jadval' => $jadval[0]['item'],
            ],
        ],200);
    }
    public function balans(){
        return response()->json([
            'status' => true,
            'message' => 'Balans tarixi',
            'data' => $this->moliyaService->MoliyaHistory()
        ],200);
    }
    public function kassa(){
        return response()->json([
            'status' => true,
            'message' => 'Tasdiqlanmagan to\'lovlar',
            'data' => $this->kassaService->peddingKassa()
        ],200);
    }
    public function paymart(){
        return response()->json([
            'status' => true,
            'message' => 'Kunlik to\'lovlar',
            'data' => Paymart::where('paymarts.created_at', '>=', now()->subDays(1))
                ->join('users', 'users.id', '=', 'paymarts.user_id') 
                ->join('users as admin', 'admin.id', '=', 'paymarts.admin_id')
                ->select(
                    'users.user_name as user_name',
                    'paymarts.user_id',
                    'paymarts.amount',
                    'paymarts.paymart_type',
                    'paymarts.description',
                    'admin.user_name as admin_name', 
                    'paymarts.created_at'
                )
                ->orderBy('paymarts.created_at', 'desc')
                ->get()
        ], 200);        
    }
    public function tashrif(){
        $Useers = $this->users();
        return response()->json([
            'status' => true,
            'message' => 'Jadval Statistikasi',
            'data' => $Useers['users'],
        ],200);
    }
    public function active(){
        return response()->json([
            'status' => true,
            'message' => 'Aktiv talabalar',
            'data' => $this->usersService->activeUser()
        ],200);
    }
    public function jadval(){
        return response()->json([
            'status' => true,
            'message' => 'Dars jadvali',
            'data' => $this->homeService->getJadval()
        ],200);
    }
    
    public function chart_tashrif(){
        return response()->json([
            'status' => true,
            'message' => 'Jadval Statistikasi',
            'data' => [
                'jadval' => 0,
            ]
        ],200);
    }
    public function chart_paymart(){
        return response()->json([
            'status' => true,
            'message' => 'Jadval Statistikasi',
            'data' => [
                'jadval' => 0,
            ]
        ],200);
    }



}
