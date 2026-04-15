<?php
use Illuminate\Support\Facades\Schedule;

// * * * * * cd /loyihangizning/to'liq/yoli && php artisan schedule:run >> /dev/null 2>&1
Schedule::command('sms:birthday')->dailyAt('09:00');
