<?php

namespace Database\Seeders;

use App\Models\Cars;
use App\Models\Platform;
use App\Models\Project;
use App\Models\Review;
use App\Models\Technology;
use App\Models\Type;
//use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([

            PlatformReviewTableSeeder::class,

        ]);
    }
}
