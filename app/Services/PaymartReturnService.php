<?php
namespace App\Services;

use App\Models\Holiday;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Group;
use App\Models\Kassa;
use App\Models\GroupUser;
use App\Models\SettingPaymart;
use App\Models\Paymart;
use App\Models\RefundStatus;
use App\Models\UserHistory;
use App\Models\MenegerChart;

class PaymartReturnService{

    protected function addPay(int $user_id, string $group_id, int $price, string $type, string $description) {
        $id = Paymart::create([
            'user_id' => $user_id,
            'group_id' => $group_id,
            'amount' => $price,
            'paymart_type' => $type,
            'description' => $description,
            'admin_id' => auth()->id(),
        ]);
        return $id->id;
    }

    protected function addHistory(int $user_id, string $type, string $type_commit) {
        return UserHistory::create([ //
            'user_id' => $user_id,
            'type' => $type,
            'type_commit' => $type_commit,
            'admin_id' => auth()->id(),
        ]);
    }

    protected function updateUserBalance(int $user_id, int $price) {
        $User = User::find($user_id);
        if ($User) {
            $User->decrement('balans', $price);
        }
    }

    protected function updateMenegerChart(int $price) {
        $User = MenegerChart::find(auth()->id());
        if ($User) {
            $User->increment('qaytarildi_add', $price);
        }
    }

    protected function updateKassa(int $price, string $type) {
        $Kassa = Kassa::firstOrCreate([], ['naqt' => 0, 'plastik' => 0]);
        if($type=='naqt'){
            return $Kassa->decrement('naqt', $price);
        }else{
            return $Kassa->decrement('plastik', $price);
        }
    }

    public function returnPaymart(int $user_id, int $return, string $description, string $type) {
        $id = $this->addPay($user_id, 'null', $return, 'qaytarildi', $description);
        $this->addHistory($user_id, 'paymart_return', $return." (".$type.") so'm to'lov qaytarildi(".$description.")");
        $this->updateUserBalance($user_id,$return);
        $this->updateMenegerChart($return);
        RefundStatus::create([
            'paymart_id' => $id,
        ]);
        $this->updateKassa($return, $type);
        return $id;
    }

    public function returnAllPaymart(){
        $RefundStatus = RefundStatus::where('status', false)->get();
        $data = [];
        foreach ($RefundStatus as $key => $value) {
            $valuePaymart = Paymart::find($value->paymart_id);
            $data[$key]['pay_id'] = $value->paymart_id;
            $data[$key]['user_id'] = $valuePaymart->user_id;
            $data[$key]['user_name'] = User::find($valuePaymart->user_id)->user_name;
            $data[$key]['amonut'] = $valuePaymart->amount;
            $data[$key]['description'] = $valuePaymart->description;
            $data[$key]['meneger'] = User::find($valuePaymart->admin_id)->user_name;
            $data[$key]['created_at'] = $valuePaymart->created_at;
            $data[$key]['refund_id'] = $value->id;
        }
        return $data;
    }

    public function returnPayDel(int $id){
        $RefundStatus = RefundStatus::find($id);
        $RefundStatus->status = true;
        return $RefundStatus->save();
    }



}
