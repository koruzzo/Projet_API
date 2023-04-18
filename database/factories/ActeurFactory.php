<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Acteur;
use App\Models\Film;
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
            'nom' => $this->faker->title(),
            'prenom' => $this->faker->name(),
            'film_id' => function () {
                return Film::inRandomOrder()->first()->id;
            },
        ];
    }
}
