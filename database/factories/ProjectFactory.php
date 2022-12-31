<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = collect(User::all()->modelKeys());
        $clients = collect(Client::all()->modelKeys());

        return [
            'title' => fake()->words(8, true),
            'description' => fake()->paragraph(5),
            'deadline' => fake()->dateTimeBetween('+1 month', '+6 months'),
            'user_id' => $users->random(),
            'client_id' => $clients->random(),
            'status' => fake()->numberBetween(1, 4),
        ];
    }
}
