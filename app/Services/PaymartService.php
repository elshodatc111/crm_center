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
use App\Models\UserHistory;
use App\Models\MenegerChart;

class PaymartService{
    public function getPaymarts(int $id){
        return Paymart::where('paymarts.user_id',$id)
            ->join('users','users.id','paymarts.admin_id')
            ->select('paymarts.amount','paymarts.paymart_type','paymarts.description','paymarts.created_at','users.user_name')
            ->get();
    }
    public function chegirmaGroups(int $user_id){
        $GroupUser = GroupUser::where('user_id', $user_id)
            ->where('status', 1)
            ->select('user_id', 'group_id')
            ->get();
        $Groups = [];
        $today = Carbon::today();
        $threeDaysAgo = $today->subDays(3);
        foreach ($GroupUser as $value) {
            $Group = Group::find($value->group_id);
            $start = Carbon::parse($Group->lessen_start);
            if ($start->gt($threeDaysAgo)) {
                $existingPaymart = Paymart::where('user_id', $value->user_id)
                    ->where('group_id', $value->group_id)
                    ->where('paymart_type', 'chegirma')
                    ->first();
                if (!$existingPaymart) {
                    $Pay = SettingPaymart::find($Group->setting_paymarts);
                    $Groups[] = [ // `$key` avtomatik ravishda qo'shiladi
                        'id' => $Group->id,
                        'group_name' => $Group->group_name,
                        'tulov' => intval($Pay->amount) - intval($Pay->chegirma),
                        'chegirma' => intval($Pay->chegirma),
                        'admin_chegirma' => intval($Pay->admin_chegirma),
                    ];
                }
            }
        }
        return $Groups;
    }
    
    protected function addPay(int $user_id, string $group_id, int $price, string $type, string $description) {
        return Paymart::create([
            'user_id' => $user_id,
            'group_id' => $group_id,
            'amount' => $price,
            'paymart_type' => $type,
            'description' => $description,
            'admin_id' => auth()->id(),
        ]);
    }
    
    protected function addHistory(int $user_id, string $type, string $type_commit) {
        return UserHistory::create([
            'user_id' => $user_id,
            'type' => $type,
            'type_commit' => $type_commit,
            'admin_id' => auth()->id(),
        ]);
    }
    
    protected function updateUserBalance(int $user_id, int $price) {
        $User = User::find($user_id);
        if ($User) {
            $User->increment('balans', $price);
        }
    }
    
    protected function updateMenegerChart(int $price, string $type) {
        $User = MenegerChart::find(auth()->id());
        if ($User) {
            if ($type == 'naqt') {
                $User->increment('paymart_add_naqt', $price);
            } elseif ($type == 'plastik') {
                $User->increment('paymart_add_plastik', $price);
            } else {
                $User->increment('chegirma_add', $price);
            }
        }
    }
    
    protected function updateKassa(int $price, string $type) {
        $Kassa = Kassa::firstOrCreate([], ['naqt' => 0, 'plastik' => 0]);
        if ($type == 'naqt') {
            $Kassa->increment('naqt', $price);
        } else {
            $Kassa->increment('plastik', $price);
        }
    }
    
    protected function handlePayment(int $user_id, string $group_id, int $amount, string $type, string $description) {
        $this->addHistory($user_id, 'paymart_add', "$amount so'm $type to'lov qabul qilindi");
        $this->updateUserBalance($user_id, $amount);
        $this->updateMenegerChart($amount, $type);
        $this->addPay($user_id, $group_id, $amount, $type, $description);
        $this->updateKassa($amount, $type);
    }
    
    public function addPayUser(array $data) {
        $user_id = $data['user_id'];
        $amount_naqt = intval(str_replace(" ", "", $data['amount_naqt']));
        $amount_plastik = intval(str_replace(" ", "", $data['amount_plastik']));
        $group_id = $data['group_id'] ?? null;
        $payment_info = $data['payment_info'];
        $totalPayment = $amount_naqt + $amount_plastik;
        $text = "$totalPayment so'm to'lov qilindi.";
    
        if ($amount_naqt > 0) {
            $this->handlePayment($user_id, $group_id, $amount_naqt, 'naqt', $payment_info);
        }
        if ($amount_plastik > 0) {
            $this->handlePayment($user_id, $group_id, $amount_plastik, 'plastik', $payment_info);
        }
    
        if (!empty($group_id) && $group_id != 'null') {
            $Group = Group::find($group_id);
            if ($Group) {
                $SettingPaymart = SettingPaymart::find($Group->setting_paymarts);
                if ($SettingPaymart) {
                    $PayChek = $SettingPaymart->amount - $SettingPaymart->chegirma;
                    $Chegirma = $SettingPaymart->chegirma;
    
                    if ($PayChek == $totalPayment) {
                        $this->addHistory($user_id, 'chegirma_add', "$Chegirma so'm to'lov uchun chegirma");
                        $this->updateUserBalance($user_id, $Chegirma);
                        $this->updateMenegerChart($Chegirma, 'chegirma_add');
                        $this->addPay($user_id, $group_id, $Chegirma, 'Chegirma', $payment_info);
                        $text .= " To'lov uchun $Chegirma chegirma qilindi.";
                    }
                }
            }
        }
    
        return $data;
    }

}