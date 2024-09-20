<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::create(['user_id' => 1, 'name' => 'Henry', 'last_name' => 'Sanchez', 'name_user' => 'HENRYSANC', 'dni' => '45781245', 'role_id' => 1]);
        Profile::create(['user_id' => 2, 'name' => 'Jerry', 'last_name' => 'Chinguel', 'name_user' => 'JerryChin', 'dni' => '78452156', 'role_id' => 2]);
        Profile::create(['user_id' => 3, 'name' => 'Jeffey', 'last_name' => 'Diaz', 'name_user' => 'JeffeyDi', 'dni' => '75194673', 'role_id' => 3]);
    }
}
