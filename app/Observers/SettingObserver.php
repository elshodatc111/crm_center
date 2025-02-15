<?php

namespace App\Observers;

use App\Models\Setting;

class SettingObserver{
    public function created(Setting $setting): void{
        //
    }
    public function updating(Setting $setting): void{
        
    }
    public function deleted(Setting $setting): void{
        //
    }
    public function restored(Setting $setting): void{
        //
    }
    public function forceDeleted(Setting $setting): void{
        //
    }
}
