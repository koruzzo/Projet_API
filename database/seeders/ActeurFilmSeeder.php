<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Acteur;
use App\Models\Film;

class ActeurFilmSeeder extends Seeder
{
    public function run()
    {
        // Créer 5 films
        $films = Film::factory()->count(5)->create();

        // Lier chaque acteur à plusieurs films
        foreach ($films as $film) {
            Acteur::factory()->count(10)->create(['film_id' => $film->id]);
        }
    }
}


