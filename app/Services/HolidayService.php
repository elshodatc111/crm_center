<?php
namespace App\Services;

use App\Models\Holiday;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HolidayService{

    public function getAll(): Collection{
        return Holiday::get();
    }
    
    public function updateHolidays(int $userId){
        DB::table('holidays')->truncate();
        $today = Carbon::today();
        $oneYearLater = $today->copy()->addYear();
        $publicHolidays = [
            '01-01' => "Yangi yil",
            '03-08' => "Xalqaro xotin-qizlar kuni",
            '03-21' => "Navro'z bayrami",
            '05-09' => "Xotira va qadrlash kuni",
            '09-01' => "Mustaqillik kuni",
            '10-01' => "O'qituvchilar va murabbiylar kuni",
            '12-08' => "Konstitutsiya kuni",
        ];
        $holidays = [];
        while ($today->lte($oneYearLater)) {
            if ($today->isSunday()) {
                $holidays[] = [
                    'date' => $today->toDateString(),
                    'comment' => 'Dam olish kuni (Yakshanba)',
                    'user_id' => $userId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            $monthDay = $today->format('m-d');
            if (isset($publicHolidays[$monthDay])) {
                $holidays[] = [
                    'date' => $today->toDateString(),
                    'comment' => $publicHolidays[$monthDay],
                    'user_id' => $userId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            $today->addDay();
        }
        DB::table('holidays')->insert($holidays);
    }

}
