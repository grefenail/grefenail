<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Dog', 'icon' => 'fa-solid fa-dog']);
        Category::create(['name' => 'Cat', 'icon' => 'fa-solid fa-cat']);
    }
}
