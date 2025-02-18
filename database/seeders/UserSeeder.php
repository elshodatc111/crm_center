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
                'phone1'    => '+998901234567',
                'phone2'    => null,
                'address'   => 'Toshkent, Chilonzor',
                'birthday'  => '1990-01-01',
                'about'     => 'Tizim administratori',
                'group_count' => 0,
                'email'     => 'sadmin@gmail.com',
                'type'      => 'sAdmin',
                'status'    => 'true',
                'password'  => Hash::make('password'),
                'balans' => 0,
            ],
            [
                'user_name' => 'Admin User',
                'phone1'    => '+998901234568', 
                'phone2'    => null,
                'address'   => 'Toshkent, Yunusobod',
                'birthday'  => '1995-05-15',
                'about'     => 'Admin hisobida ishlovchi foydalanuvchi',
                'group_count' => 2,
                'email'     => 'admin@gmail.com',
                'type'      => 'admin',
                'status'    => 'true',
                'password'  => Hash::make('password'),
                'balans' => 0,
            ],
            [
                'user_name' => 'Manager User',
                'phone1'    => '+998901234569', 
                'phone2'    => null,
                'address'   => 'Toshkent, Yunusobod',
                'birthday'  => '1995-05-15',
                'about'     => 'Manager hisobida ishlovchi foydalanuvchi',
                'group_count' => 0,
                'email'     => 'manager@gmail.com',
                'type'      => 'meneger',
                'status'    => 'true',
                'password'  => Hash::make('password'),
                'balans' => 0,
            ],
            [
                'user_name' => 'Teacher User',
                'phone1'    => '+998901234570', 
                'phone2'    => null,
                'address'   => 'Toshkent, Yunusobod',
                'birthday'  => '1995-05-15',
                'about'     => 'Teacher hisobida ishlovchi foydalanuvchi',
                'group_count' => 0,
                'email'     => 'teacher@gmail.com',
                'type'      => 'techer',
                'status'    => 'true',
                'password'  => Hash::make('password'),
                'balans' => 0,
            ],
            [
                'user_name' => 'Student User',
                'phone1'    => '+998901234571', 
                'phone2'    => null,
                'address'   => 'Toshkent, Yunusobod',
                'birthday'  => '1995-05-15',
                'about'     => 'Student hisobida o‘quvchi',
                'group_count' => 0,
                'email'     => 'student@gmail.com',
                'type'      => 'student',
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
        User::factory()->count(10)->create([
            'type' => 'student',
        ]);
    }
}
