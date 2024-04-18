<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gender;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define gender options
        $genders = ['Male', 'Female'];

        // Seed the PetGenders table
        foreach ($genders as $gender) {
            Gender::create(['gender' => $gender]);
        }
    }
}
