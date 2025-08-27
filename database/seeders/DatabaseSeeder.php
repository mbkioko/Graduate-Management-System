<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Staff;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // --- Create specific users first ---
        // Student
        User::updateOrCreate(
            ['email' => 'mnjoroge@strathmore.edu'],
            [
                'name' => 'Student User',
                'password' => Hash::make('password'),
                'role_id' => 1,
                'status' => 'active',
            ]
        );

        // Supervisor
        User::updateOrCreate(
            ['email' => 'luboobi@math.mak.ac.ug'],
            [
                'name' => 'Supervisor User',
                'password' => Hash::make('password'),
                'role_id' => 2,
                'status' => 'active',
            ]
        );

        // OGS Admin
        User::updateOrCreate(
            ['email' => 'bshibwabo@strathmore.edu'],
            [
                'name' => 'OGS Admin',
                'password' => Hash::make('pass1234'),
                'role_id' => 3,
                'status' => 'active',
            ]
        );

        // --- Create 25 random users as before ---
        User::factory(25)->create()->each(function ($user) {
            if ($user->role_id == 1) {
                Student::factory()->create(['user_id' => $user->id]);
            } elseif ($user->role_id == 2) {
                Staff::factory()->create(['user_id' => $user->id]);
            }
        });
    }
}
