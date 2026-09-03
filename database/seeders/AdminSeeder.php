<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Admin',
                'email' => 'demo@admin.com',
                'password' => Hash::make('demoadmin'),
                'role'     => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'User',
                'email' => 'demo@user.com',
                'password' => Hash::make('demouser'),
                'role'     => 'user',
                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);
    }
}
