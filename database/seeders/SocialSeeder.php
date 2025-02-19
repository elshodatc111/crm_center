<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Social;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
            'Qarshi_sh', 'Shahrisabz_sh', 'Dehqonobod', "G'uzor",
            'Kasbi', 'Kitob', 'Koson', 'Mirishkor', 'Muborak',
            'Nishon', 'Qamashi', 'Yakkabog', 'Chiroqchi', 'Shahrisabz'
        ];

        foreach ($regions as $region) {
            Social::create(['name' => $region, 'count' => 0]);
        }
    }
}
