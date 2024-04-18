<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define size options
        $sizes = ['Small', 'Medium', 'Big'];

        // Seed the PetSizes table
        foreach ($sizes as $size) {
            Size::create(['size' => $size]);
        }
    }
}
