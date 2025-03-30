<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserHistory;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'user_name' => 'Super Admin',
                'phone1'    => '+998 90 123 4567',
                'phone2'    => '+998 90 765 4321',
                'address'   => 'Qarshi shahar',
                'birthday'  => '1997-01-01',
                'about'     => 'Tizim administratori',
                'group_count' => 0,
                'email'     => 'sadmin@gmail.com',
                'type'      => 'sAdmin',
                'status'    => 'true',
                'password'  => Hash::make('password'),
                'balans' => 0,
            ],
        ];
        foreach ($users as $user) {
            if (!User::where('email', $user['email'])->exists()) {
                User::create($user);
            }
        }
    }
}
