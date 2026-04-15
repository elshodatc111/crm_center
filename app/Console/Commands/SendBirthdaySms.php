<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Services\message\SendMessageEndService;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log; 

class SendBirthdaySms extends Command{

    protected $signature = 'sms:birthday';

    protected $description = 'Tug\'ilgan kun egalariga SMS yuborish';

    public function handle(SendMessageEndService $smsService){
        $today = Carbon::now()->format('m-d');
        $users = User::whereRaw("DATE_FORMAT(birthday, '%m-%d') = ?", [$today])->get();
        foreach ($users as $user) {
            $message = "Hurmatli {$user->user_name}! Sizni tug'ilgan kuningiz bilan ATKO o'quv markazi jamoasi nomidan samimiy tabriklaymiz!";
            $smsService->SendMessage($user->id, $message, 'birthday_sms');
        }
        Log::info(count($users)." ta tabrik yuborildi ".date("Y-m-d H:i"));
        $this->info('Tabrik SMSlari yuborildi.');
    }

}
