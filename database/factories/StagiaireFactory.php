<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stagiaire>
 */
class StagiaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nom' => fake()->lastName(50),
            'prenom' => fake()->firstName(50),
            'age' => fake()->numberBetween(17, 30),
            'email' => fake()->unique()->safeEmail(),
            'password' => bcrypt(fake()->password())

        ];
    }
}
