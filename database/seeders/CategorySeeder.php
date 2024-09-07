<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Componentes', 'description' => 'Componentes internos de laptops y pc']);
        Category::create(['name' => 'Monitores', 'description' => 'Pantallas y monitores de diferentes tamaños y resoluciones']);
    }
}
