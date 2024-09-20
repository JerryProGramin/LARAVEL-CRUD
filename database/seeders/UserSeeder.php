<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(['email' => 'jerryhola@gmail.com', 'password' => '12345']);
        User::create(['email' => 'jerryjeff@gmail.com', 'password' => '12346']);
        User::create(['email' => 'jerrysanc@gmail.com', 'password' => '12347']);
    }
}
