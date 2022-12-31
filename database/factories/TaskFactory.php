<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = collect(User::all()->modelKeys());

        return [
            'title' => fake()->words(8, true),
            'user_id' => $users->random(),
            'deadline' => fake()->dateTimeBetween('+1 month', '+1 year'),
            'status' => fake()->numberBetween(1, 4),
            'priority' => fake()->numberBetween(1, 4),
        ];
    }
}
