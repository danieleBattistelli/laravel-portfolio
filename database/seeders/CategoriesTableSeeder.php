<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $categories = ['laravel', 'MySql', 'PHP', 'Internet', 'Videogiochi'];

        foreach ($categories as $category) {
            $newCategory = new Category();

            $newCategory-> name= $category;
            $newCategory-> description = $faker->sentence( );

            $newCategory->save();
        }

    }
}
