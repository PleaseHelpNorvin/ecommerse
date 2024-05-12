<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ProductColor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => Hash::make('password123'), // You can use bcrypt('password123') instead if you're not using Laravel 8
        ]);

        
    }
}
