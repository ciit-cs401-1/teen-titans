<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'recipes_name' => $this->faker->sentence(3),
            'recipes_views' => $this->faker->numberBetween(0, 1000),
            'recipes_file' => 'uploads/' . $this->faker->uuid . '.pdf', // fake path
            'user_id' => User::factory(), // links to user
        ];
    }
}

