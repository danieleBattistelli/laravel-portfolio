<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $newProject = new Project();

            $newProject->name = $faker->sentence();
            $newProject->type_id = rand(1,5);
            $newProject->client = $faker->name();
            $newProject->start_date = $faker->dateTimeBetween('-1 year', 'now');
            $newProject->end_date = $faker->dateTimeBetween('now', '+1 year');
            $newProject->description = $faker->paragraph(12);

            $newProject->created_at = $faker->dateTimeBetween('-1 year', 'now');
            $newProject->updated_at = $faker->dateTimeBetween('-1 year', 'now');

            $newProject->save();
        }

    }
}
