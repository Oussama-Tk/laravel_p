<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Acteur>
 */
class ActeurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'nom' => fake()->name(),
            'prenom' => fake()->name(),
            'pays' => fake()->country(),
            'date_naissance' => fake()->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
            
        ];
    }
}
