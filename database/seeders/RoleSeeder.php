<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin', 'description' => 'modifica cualquier tabla']);
        Role::create(['name' => 'client', 'description' => 'solo observa los datos del producto']);
        Role::create(['name' => 'employee', 'description' => 'realiza todo el crud de la tabla producto']);
    }
}
