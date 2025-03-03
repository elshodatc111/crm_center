<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
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
use Carbon\Carbon;

class VaronkaServise{

    public function createRegister(array $data){
        $type = User::where('phone1', $data['phone1'])
            ->where('type', 'student')
            ->exists() ? 'repeat' : 'new';
        return Varonka::create(array_filter([
            'user_name' => trim("{$data['name']} {$data['surname']}"),
            'phone1' => $data['phone1'],
            'phone2' => $data['phone2'] ?? null,
            'address' => $data['address'] ?? null,
            'birthday' => $data['birth_date'] ?? null,
            'status' => $type,
            'type_social' => $data['visited'] ?? null,
        ]));
    }

    public function chats(){
        $charts = array();
        $new = 0;
        $repeat = 0;
        $pedding = 0;
        $success = 0;
        $cancel = 0;
        foreach (Varonka::get() as $key => $value) {
            if($value->status=='new' or $value->status=='repeat'){
                $new = $new+1;
            }elseif($value->status=='pedding'){
                $pedding = $pedding+1;
            }elseif($value->status=='success'){
                $success = $success+1;
            }elseif($value->status=='cancel'){
                $cancel = $cancel+1;
            }
        }
        $charts['new'] = $new;
        $charts['repeat'] = $repeat;
        $charts['pedding'] = $pedding;
        $charts['success'] = $success;
        $charts['cancel'] = $cancel;
        return $charts;
    }

    public function users(int $id){
        $Varonka = Varonka::where('id',$id)->first();
        $type = $Varonka['type_social'];
        if($Varonka['status']=='new'){
            $status = "Yangi murojat";
        }elseif($Varonka['status']=='repeat'){
            $status = "Telefon raqam ro'yhatdan o'tgan";
        }elseif($Varonka['status']=='pedding'){
            $status = "Ko'rib chiqilmoqda";
        }elseif($Varonka['status']=='success'){
            $status = "Qabul qilindi";
        }elseif($Varonka['status']=='cancel'){
            $status = "Bekor qilindi";
        }
        if($type=='social_telegram'){$typs = "Telegram";
        }elseif($type=='social_instagram'){$typs = "Instagram";
        }elseif($type=='social_facebook'){$typs = "Facebook";
        }elseif($type=='social_youtube'){$typs = "Youtube";
        }elseif($type=='social_banner'){$typs = "Banner";
        }elseif($type=='social_tanish'){$typs = "Tanishlar";
        }elseif($type=='social_boshqa'){$typs = "Boshqa";}
        return [
            "id" => $Varonka['id'],
            "user_name" => $Varonka['user_name'],
            "phone1" => $Varonka['phone1'],
            "phone2" => $Varonka['phone2'],
            "address" => $Varonka['address'],
            "birthday" => $Varonka['birthday'],
            "status" => $Varonka['status'],
            "status2" => $status,
            "register_id" => $Varonka['register_id'],
            "type_social" => $typs,
            "created_at" => $Varonka['created_at'],
        ];
    }

    public function check($id){
        $Varonka = Varonka::where('id', $id)->first();
        $history = array();
        if ($Varonka && ($Varonka['status'] == 'new' || $Varonka['status'] == 'repeat')) {
            $User = User::where('phone1', $Varonka['phone1'])->where('type', 'student')->first();
            if ($User) { 
                $history['id'] = $User['id'];
                $history['user_name'] = $User['user_name'];
                $history['created_at'] = $User['created_at'];
                $history['phone1'] = $Varonka['phone1'];
            }
        }
        return $history;
    }

    public function requestCancel(int $id){
        $Varonka = Varonka::where('id', $id)->first();
        $Varonka->status = 'cancel';
        VaronkaHistory::create([
            'varonka_id'=>$id,
            'comment'=>"Murojat bekor qilindi",
            'admin_id'=>auth()->user()->id,
        ]);
        return $Varonka->save();
    }

    public function comment(int $id){
        return VaronkaHistory::where('varonka_histories.varonka_id',$id)
        ->join('users','varonka_histories.admin_id','users.id')
        ->select('varonka_histories.comment','varonka_histories.created_at','users.user_name')
        ->get();
    }

    public function createComment(int $id, string $comment){
        VaronkaHistory::create([
            'varonka_id'=>$id,
            'comment'=>$comment,
            'admin_id'=>auth()->user()->id,
        ]);
        $Varonka = Varonka::where('id', $id)->first();
        if($Varonka->status != 'success'){
            $Varonka->status='pedding';
        }
        return $Varonka->save();
    }



}