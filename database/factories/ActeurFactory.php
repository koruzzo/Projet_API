<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Acteur;
use App\Models\Film;

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
            'Nom' => $this->faker->title(),
            'Prenom' => $this->faker->name(), 
            'film_id' => function () {
                return Film::inRandomOrder()->first()->id;
            },
        ];
    }
}


