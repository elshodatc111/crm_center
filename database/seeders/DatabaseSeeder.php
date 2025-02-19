<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Social;

class DatabaseSeeder extends Seeder{
    public function run(): void{
        $this->call(UserSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(SocialSeeder::class);
    }
}
