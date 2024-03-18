<?php

namespace Database\Factories\HumanResource;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->lastName(),
            'last_name' => fake()->lastName(),
            'gender' => fake()->randomElement(['M', 'F']),
            'age' => fake()->numberBetween(18, 30),
            'phone' => fake()->phoneNumber(),
            'image' => 'avatars/sample-image.jpg',
            'position_id' => fake()->numberBetween(1, 30),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make(fake()->password(8)),
            'employment_status' => fake()->randomElement(['Full Time', 'Part Time', 'Resigned', 'Terminated', 'Training']),
            'salary' => fake()->numberBetween(15000, 50000),
        ];
    }
}