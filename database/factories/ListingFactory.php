<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\User;
use App\Models\Category;
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
            'slug' => $this->faker->slug(),
            'description' => $this->faker->text(200),
            'petName' => $this->faker->firstName(),
            'ownerName' => $this->faker->name(),
            'address' => $this->faker->address(),
            'email' => $this->faker->unique()->safeEmail(),
            'petAge' => $this->faker->numberBetween(1, 15),
            'contact' => $this->faker->phoneNumber(),
            'categoryId' => Category::inRandomOrder()->first()->id,
            'userId' => User::inRandomOrder()->first()->id,
        ];
    }
    
}
