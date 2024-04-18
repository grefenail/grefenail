<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vaccine;

class VaccineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Array of vaccine names
        $vaccines = [
            'Canine Adenovirus Type 2',
            'Canine Distemper',
            'Canine Parainfluenza',
            'Canine Parvovirus',
            'Chlamydia Psittaci',
            'Feline Panleukopenia',
            'Feline Calicivirus',
            'Feline Rhinotracheitis',
        ];

        // Loop through the vaccines and insert them into the database
        foreach ($vaccines as $vaccine) {
            Vaccine::create([
                'name' => $vaccine,
            ]);
        }
    }
}
