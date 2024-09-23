<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::create(['name' => 'contacto 1', 'contact_info' =>'informacion 1', 'phone' =>'951623415', 'email' =>'proveedor1@gmail.com', 'address' =>'direccion1', 'country' => 'Peru']);
        Supplier::create(['name' => 'contacto 2', 'contact_info' =>'informacion 2', 'phone' =>'987123456', 'email' =>'proveedor2@gmail.com', 'address' =>'direccion2', 'country' => 'Peru']);
        Supplier::create(['name' => 'contacto 3', 'contact_info' =>'informacion 3', 'phone' =>'938675412', 'email' =>'proveedor3@gmail.com', 'address' =>'direccion3', 'country' => 'Peru']);
    }
}