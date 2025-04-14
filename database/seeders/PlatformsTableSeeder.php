<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $platforms = [
            ['name' => 'Xbox', 'color' => '#107C10'],
            ['name' => 'Xbox 360', 'color' => '#107C10'],
            ['name' => 'Xbox One', 'color' => '#107C10'],
            ['name' => 'Xbox One S', 'color' => '#107C10'],
            ['name' => 'Xbox One X', 'color' => '#107C10'],
            ['name' => 'Xbox Series S', 'color' => '#107C10'],
            ['name' => 'Xbox Series X', 'color' => '#107C10'],
            ['name' => 'PlayStation', 'color' => '#003791'],
            ['name' => 'PlayStation 2', 'color' => '#003791'],
            ['name' => 'PlayStation 3', 'color' => '#003791'],
            ['name' => 'PlayStation 4', 'color' => '#003791'],
            ['name' => 'PlayStation 4 Pro', 'color' => '#003791'],
            ['name' => 'PlayStation 5', 'color' => '#003791'],
            ['name' => 'PlayStation 5 Pro', 'color' => '#003791'],
            ['name' => 'Nintendo NES', 'color' => '#E60012'],
            ['name' => 'Nintendo Super NES', 'color' => '#E60012'],
            ['name' => 'Nintendo Nintendo 64', 'color' => '#E60012'],
            ['name' => 'Nintendo Game Cube', 'color' => '#E60012'],
            ['name' => 'Nintendo Wii', 'color' => '#E60012'],
            ['name' => 'Nintendo Wii U', 'color' => '#E60012'],
            ['name' => 'Nintendo Switch', 'color' => '#E60012'],
            ['name' => 'Nintendo Switch 2', 'color' => '#E60012'],
            ['name' => 'PC', 'color' => '#000000'],
            
        ];

        foreach ($platforms as $platform) {
            Platform::create($platform);
        }
    }
}
