<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            'Action' => 'Fast-paced games focused on physical challenges.',
            'Adventure' => 'Games emphasizing exploration and storytelling.',
            'RPG' => 'Role-playing games with character development and quests.',
            'Shooter' => 'Games centered around ranged combat and shooting mechanics.',
            'Simulation' => 'Games simulating real-world activities or systems.',
            'Strategy' => 'Games requiring careful planning and tactical thinking.',
            'Sports' => 'Games simulating sports activities.',
            'Puzzle' => 'Games focused on solving puzzles and challenges.'
        ];

        foreach ($genres as $genre => $description) {
            $newGenre = new Genre();

            $newGenre->name = $genre;
            $newGenre->description = $description;

            $newGenre->save();
        }
    }
}
