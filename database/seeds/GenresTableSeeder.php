<?php

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::create([
            'tmdb_id' => 28,
            'description' => 'Ação',
        ]);
        Genre::create([
            'tmdb_id' => 12,
            'description' => 'Aventura',
        ]);
        Genre::create([
            'tmdb_id' => 16,
            'description' => 'Animação',
        ]);
        Genre::create([
            'tmdb_id' => 35,
            'description' => 'Comédia',
        ]);
        Genre::create([
            'tmdb_id' => 80,
            'description' => 'Crime',
        ]);
        Genre::create([
            'tmdb_id' => 99,
            'description' => 'Documentário',
        ]);
        Genre::create([
            'tmdb_id' => 18,
            'description' => 'Drama',
        ]);
        Genre::create([
            'tmdb_id' => 10751,
            'description' => 'Família',
        ]);
        Genre::create([
            'tmdb_id' => 14,
            'description' => 'Fantasia',
        ]);
        Genre::create([
            'tmdb_id' => 36,
            'description' => 'História',
        ]);
        Genre::create([
            'tmdb_id' => 27,
            'description' => 'Terror',
        ]);
        Genre::create([
            'tmdb_id' => 10402,
            'description' => 'Música',
        ]);
        Genre::create([
            'tmdb_id' => 9648,
            'description' => 'Mistério',
        ]);
        Genre::create([
            'tmdb_id' => 10749,
            'description' => 'Romance',
        ]);
        Genre::create([
            'tmdb_id' => 878,
            'description' => 'Ficção científica',
        ]);
        Genre::create([
            'tmdb_id' => 10770,
            'description' => 'Cinema TV',
        ]);
        Genre::create([
            'tmdb_id' => 53,
            'description' => 'Suspense',
        ]);
        Genre::create([
            'tmdb_id' => 10752,
            'description' => 'Guerra',
        ]);
        Genre::create([
            'tmdb_id' => 37,
            'description' => 'Faroeste',
        ]);
    }
}
