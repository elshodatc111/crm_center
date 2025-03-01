<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Schedule;
use App\Jobs\SendBirthdaySms;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command('queue:work --tries=3')->everyMinute();
Schedule::job(new SendBirthdaySms())->dailyAt('23:33');
