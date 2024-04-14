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
        Category::create(['name' => 'Dogs', 'icon' => 'fa-solid fa-dog']);
        Category::create(['name' => 'Cats', 'icon' => 'fa-solid fa-cat']);
    }
}
