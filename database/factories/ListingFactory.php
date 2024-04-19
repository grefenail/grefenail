<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use App\Models\Size;
use App\Models\Gender;
use App\Models\Vaccination;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pet_name' => $this->faker->firstName(),
            'pet_age' => $this->faker->numberBetween(1, 15),
            'pet_size' => Size::inRandomOrder()->first()->id,
            'pet_gender' => Gender::inRandomOrder()->first()->id,
            'slug' => $this->faker->slug(),
            'is_sterile' => $this->faker->boolean(),
            'is_active' => $this->faker->boolean(),
            'description' => $this->faker->text(200),
            'category_id' => Category::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
