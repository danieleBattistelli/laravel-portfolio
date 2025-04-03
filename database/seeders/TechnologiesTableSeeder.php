<?php

namespace Database\Seeders;

use App\Models\Technology;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologies = [
            'Java',
            'C #',
            'PHP',
            'Javascript',
            'Matlab'
        ];

        foreach ($technologies as $technology) {
            $newTechnology = new Technology();

            $newTechnology->name = $technology;
            $newTechnology->color = $faker->hexColor;
            $newTechnology->save();
        }
    }
}
