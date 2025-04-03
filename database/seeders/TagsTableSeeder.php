<?php

namespace Database\Seeders;

use App\Models\Tag;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $tags = [
            'Sviluppo Web',
            'Framework',
            'Internet',
            'Tutorial',
            'News'
        ];

        foreach ($tags as $tag) {
            $newTag = new Tag();

            $newTag->name = $tag;
            $newTag->color = $faker->hexColor;
            $newTag->save();
        }
    }
}
