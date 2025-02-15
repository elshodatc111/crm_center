<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\SettingObserver;
use App\Models\Setting;
use App\Models\LessenTime;
use App\Observers\LessenTimeObserver;

class AppServiceProvider extends ServiceProvider{
    public function register(): void{
        //
    }
    public function boot(): void{
        Setting::observe(SettingObserver::class);
    }
}
