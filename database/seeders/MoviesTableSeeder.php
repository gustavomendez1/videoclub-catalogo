<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie; // Importamos el modelo obligatorio

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Borramos los datos viejos de forma segura
        Movie::query()->delete();

        // Insertamos los registros de prueba uno por uno
        foreach ($this->arrayPeliculas as $pelicula) {
            $m = new Movie;
            $m->title = $pelicula['title'];
            $m->year = $pelicula['year'];
            $m->director = $pelicula['director'];
            $m->poster = $pelicula['poster'];
            $m->rented = $pelicula['rented'];
            $m->synopsis = $pelicula['synopsis'];
            $m->save(); // Guarda el registro en MySQL
        }
    }

    // Array oficial de películas suministrado por el enunciado
 private $arrayPeliculas = [
        [
            'title' => 'The Godfather',
            'year' => '1972',
            'director' => 'Francis Ford Coppola',
            'poster' => 'https://images.unsplash.com/photo-1536440136628-849c177e76a1?w=300',
            'rented' => false,
            'synopsis' => 'Don Vito Corleone, head of a mafia family, decides to hand over his empire to his youngest son Michael.'
        ],
        [
            'title' => 'The Shawshank Redemption',
            'year' => '1994',
            'director' => 'Frank Darabont',
            'poster' => 'https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?w=300',
            'rented' => true,
            'synopsis' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.'
        ],
        [
            'title' => 'Schindler\'s List',
            'year' => '1993',
            'director' => 'Steven Spielberg',
            'poster' => 'https://images.unsplash.com/photo-1517604931442-7e0c8ed2963c?w=300',
            'rented' => false,
            'synopsis' => 'In Poland during World War II, Oskar Schindler gradually becomes concerned for his Jewish workforce after witnessing their persecution by the Nazis.'
        ],
        [
            'title' => 'Pulp Fiction',
            'year' => '1994',
            'director' => 'Quentin Tarantino',
            'poster' => 'https://images.unsplash.com/photo-1440404653325-ab127d49abc1?w=300',
            'rented' => true,
            'synopsis' => 'The lives of two mob hitmen, a boxer, a gangster\'s wife, and a pair of diner bandits intertwine in four tales of violence and redemption.'
        ]
    ];
} 