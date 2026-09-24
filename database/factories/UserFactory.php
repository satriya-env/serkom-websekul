<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'     => fake()->name(),
            'username' => fake()->unique()->userName(),
            'password' => Hash::make('password'),
            'role'     => fake()->randomElement(['Admin', 'Operator']),
            'status'   => 'Aktif',
        ];
    }
}