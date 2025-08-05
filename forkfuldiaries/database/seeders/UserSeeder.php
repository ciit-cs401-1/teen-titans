<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Recipe;
use App\UserType;
use App\UserStatus;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // SuperAdmin User
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => Hash::make('12345'),
            'type' => UserType::SuperAdmin,
            'status' => UserStatus::Active,
        ]);

        // Create a recipe for the SuperAdmin
        Recipe::factory()->create([
            'user_id' => $admin->id,
            'recipes_name' => 'Creamy Carbonara',
            'recipes_file' => 'uploads/creamy_carbonara.pdf',
        ]);

        // Normal User
        $user = User::create([
            'name' => 'Ruffa Mae',
            'email' => 'ruffa@gmail.com',
            'username' => 'ruffamae',
            'password' => Hash::make('54321'),
            'type' => UserType::User,
            'status' => UserStatus::Active,
        ]);

        // Create a recipe for the normal user
        Recipe::factory()->create([
            'user_id' => $user->id,
            'recipes_name' => 'Sinangag Supreme',
            'recipes_file' => 'uploads/sinangag_supreme.pdf',
        ]);
    }
}
