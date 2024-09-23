<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Inventory::create(['product_id' => 1, 'stock' => 50]);
        Inventory::create(['product_id' => 2, 'stock' => 60]);
    }
}
