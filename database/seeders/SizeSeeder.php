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
        $sizes = ['Small', 'Medium', 'Big'];

        foreach ($sizes as $size) {
            Size::create(['size' => $size]);
        }
    }
}
