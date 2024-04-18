<?php

namespace Database\Factories;

use App\Models\Vaccination;
use App\Models\Listing;
use App\Models\Vaccine;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class VaccinationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vaccination::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'listing_id' => Listing::factory(),
            'vaccine_id' => Vaccine::inRandomOrder()->first()->id,
        ];
    }
}
