<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kassa;
class KassaSeeder extends Seeder{
    public function run(): void{
        Kassa::create([
            'naqt' => 0,
            'naqt_xar_pedding' => 0,
            'naqt_chiq_pedding' => 0,
            'naqt_qayt_pedding' => 0,
            'plastik' => 0,
            'plastik_xar_pedding' => 0,
            'plastik_chiq_pedding' => 0,
            'plastik_qayt_pedding' => 0,
        ]);
    }
}
