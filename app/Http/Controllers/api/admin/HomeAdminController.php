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

class HomeAdminController extends Controller{
    protected $visedService;
    protected $paymartService;
    protected $techerService;
    protected $techerReytingService;
    protected $kassaService;
    protected $moliyaService;
    protected $settingService;
    private $homeService;

    public function __construct(
            VisedService $visedService,
            TecherReytingServiceTwo $techerReytingServiceTwo,
            PaymartService $paymartService,
            TecherService $techerService,
            TecherReytingService $techerReytingService,
            KassaService $kassaService,
            MoliyaService $moliyaService, SettingService $settingService,
            HomeService $homeService
            ){
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

    public function jadval(){
        $jadval = $this->homeService->getJadval();
        return response()->json([
            'status' => true,
            'message' => 'Jadval Statistikasi',
            'data' => [
                'jadval' => $jadval,
            ]
        ],200);
    }

    public function moliya(){
        $service = $this->settingService->getSetting();
        $kassa = $this->kassaService->getKassa();
        $chiqim = $this->kassaService->successAllKassa();
        $moliya = $this->moliyaService->MoliyaHistory(); 
        $history = $this->moliyaService->history($chiqim, $moliya); 
        return response()->json([
            'status' => true,
            'message' => 'Moliya Statistikasi',
            'data' => [
                'service' => $service,
                'kassa' => $kassa,
                'chiqim' => $chiqim,
                'history' => $history,
                'moliya' => $moliya
            ]
        ],200);
    }

    public function kassa(){
        $getKassa = $this->kassaService->getKassa();
        $returnPaymart = $this->kassaService->returnPaymart();
        $pedding = $this->kassaService->peddingKassa();
        $paymarts = $this->kassaService->tulovlar();

        return response()->json([
            'status' => true,
            'message' => 'Kassa Statistikasi',
            'data' => [
                'getKassa' => $getKassa,
                'returnPaymart' => $returnPaymart,
                'pedding' => $pedding,
                'paymarts' => $paymarts
            ]
        ],200);
    }
    public function index(){
        $Hudud = $this->visedService->Hudud();
        $Social = $this->visedService->Social();
        $tashrif = $this->visedService->tashriflar(); 
        $activeUser = $this->visedService->activeUser();

        return response()->json([
            'status' => true,
            'message' => 'Tashriflar Statistikasi',
            'data' => [
                'hudud' => $Hudud,
                'social' => $Social,
                'tashrif' => $tashrif,
                'activeUser' => $activeUser,
            ]
        ],200);
    }

    public function paymart(){
        $allMurojat = $this->paymartService->allMurojat();
        $monchMurojat = $this->paymartService->monchMurojat();
        $days = $this->paymartService->getLastNineDays();
        $monch = $this->visedService->getLastSixMonths();
        $DaysChart = $this->paymartService->DaysChart();
        $MonchChart = $this->paymartService->MonchChart();

        return response()->json([
            'status' => true,
            'message' => 'Paymart Statistikasi',
            'data' => [
                'allMurojat' => $allMurojat,
                'monchMurojat' => $monchMurojat,
                'days' => $days,
                'monch' => $monch,
                'DaysChart' => $DaysChart,
                'MonchChart' => $MonchChart
            ]
        ],200);
    }

    public function paymart_show($data){
        $paymart = $this->paymartService->paymartDay($data);
        return response()->json([
            'status' => true,
            'message' => 'Paymart show Statistikasi',
            'data' => [
                'paymart' => $paymart,
            ]
        ],200);
    }

    public function groups(){
        $item = $this->techerService->getAll();
        return response()->json([
            'status' => true,
            'message' => 'Groups Statistikasi',
            'data' => [
                'item' => $item,
            ]
        ],200);
    }
}
