<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserFactory extends Factory{
    protected static ?string $password;
    public function definition(): array{
        return [
            'user_name' => $this->faker->name(),
            'phone1' => $this->faker->unique()->phoneNumber(),
            'phone2' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'birthday' => $this->faker->date(),
            'about' => $this->faker->sentence(),
            'group_count' => $this->faker->randomDigit(),
            'email' => $this->faker->unique()->safeEmail(),
            'type' => 'student',
            'status' => 'true',
            'balans' => $this->faker->randomFloat(2, 0, 1000),
            'password' => Hash::make('password123'),
        ];
    }
    public function unverified(): static{
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
