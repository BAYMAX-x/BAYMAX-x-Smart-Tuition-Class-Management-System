<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Default teacher/admin account
        User::updateOrCreate(
            ['email' => 'teacher@example.com'],
            [
                'name' => 'Teacher Admin',
                'full_name' => 'Teacher Admin',
                'password' => Hash::make('password123'),
                'is_teacher' => true,
            ]
        );

        // (Optional) seed a few demo students
        // User::factory(5)->create();
    }
}
