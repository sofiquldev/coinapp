<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Super Admin
        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'), // Ensure the password is hashed
            'role' => 1,
            'balance' => json_encode(['btc'=> 0,'eth' => 0])
        ]);

        // Create Test User
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@mail.com',
            'password' => bcrypt('password'), // Ensure the password is hashed
            'role' => 2,
            'balance' => json_encode(['btc'=> 0,'eth' => 0])
        ]);
    }
}
