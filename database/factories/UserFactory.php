<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'username' => 'admin',
            'employee_id' => 1,
            'depot_id' => 1,
            'category_id' => 1,
            'recovery_number' => 1234567890,
            'ans1' => 'ans1',
            'ans2' => 'ans2',
            'ans3' => 'ans3',
            'createdby' => 1,
            'status' => '1',
            'password' => 'Ambika@12345',
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}