<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'email_verified_at' => now(),
            'phone' => fake()->phoneNumber,
            'address' => fake()->address,
            'password' => '$2a$12$3U9V4bo1X3hNmDergllLKO1CMimqXmx.xoAu87PGWxxqD70jGE6RG', // iamadminbecareful
            'remember_token' => Str::random(10),
        ]);

        $admin->assignRole('admin');
        User::factory()->count(50)->create();

    }
}
