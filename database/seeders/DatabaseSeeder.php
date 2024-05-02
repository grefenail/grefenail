<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            VaccineSeeder::class,
            GenderSeeder::class,
            SizeSeeder::class,
            ListingSeeder::class,
            QuestionSeeder::class,
        ]);
    }
}
