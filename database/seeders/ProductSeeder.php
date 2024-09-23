<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create(['name' => 'Celular', 'description' => 'nuevo celular', 'price' => 50.00, 'category_id' => 1, 'supplier_id' => 1]);
        Product::create(['name' => 'Computadora', 'description' => 'nuevo computadora', 'price' => 500.00, 'category_id' => 2, 'supplier_id' => 2]);
    }
}
