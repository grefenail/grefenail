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
        Category::create(['name' => 'Terrace', 'icon' => 'fa-solid fa-house']);
        Category::create(['name' => 'Bungalow', 'icon' => 'fa-solid fa-fire']);
        Category::create(['name' => 'Semi-D', 'icon' => 'fa-solid fa-circle-half']);
        Category::create(['name' => 'Townhouse', 'icon' => 'fa-solid fa-umbrella-beach']);
        Category::create(['name' => 'Apartment', 'icon' => 'fa-solid fa-building']);
        Category::create(['name' => 'Condominium', 'icon' => 'fa-solid fa-snowboarding']);
    }
}
