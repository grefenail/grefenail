<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\ListingImage;
use App\Models\Vaccination;
use Illuminate\Database\Seeder;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Listing::factory()
            ->has(ListingImage::factory()->count(3), 'images')
            ->has(Vaccination::factory()->count(5), 'vaccination')
            ->count(50)
            ->create();
    }
}
