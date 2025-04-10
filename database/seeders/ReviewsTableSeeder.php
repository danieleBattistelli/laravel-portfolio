<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            [
                'gametitle' => 'Splatoon 3',
                'image' => 'splatoon_3.jpg',
                'genre_id' => 4,
                'reviewTitle' => 'A Colorful Shooter',
                'reviewBody' => 'The game is a fresh and fun take on multiplayer shooters.',
                'rating' => 9.1,
                'reviewerName' => 'James Garcia',
                'reviewDate' => Carbon::now()->subDays(220),
                'lastUpdated' => Carbon::now()->subDays(215),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'gametitle' => 'Ori and the Will of the Wisps',
                'image' => 'ori_will_of_the_wisps.jpg',
                'genre_id' => 8,
                'reviewTitle' => 'A Stunning Platformer',
                'reviewBody' => 'The game is a visual and emotional masterpiece.',
                'rating' => 9.6,
                'reviewerName' => 'Sophia Carter',
                'reviewDate' => Carbon::now()->subDays(400),
                'lastUpdated' => Carbon::now()->subDays(395),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'gametitle' => 'Pikmin 3 Deluxe',
                'image' => 'pikmin_3.jpg',
                'genre_id' => 5,
                'reviewTitle' => 'A Strategic Adventure',
                'reviewBody' => 'The game is a delightful mix of strategy and exploration.',
                'rating' => 8.8,
                'reviewerName' => 'Mia Hernandez',
                'reviewDate' => Carbon::now()->subDays(250),
                'lastUpdated' => Carbon::now()->subDays(245),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'gametitle' => 'Halo: The Master Chief Collection',
                'image' => 'halo_master_chief.jpg',
                'genre_id' => 4,
                'reviewTitle' => 'A Legendary Collection',
                'reviewBody' => 'The game brings together the best of the Halo series.',
                'rating' => 9.5,
                'reviewerName' => 'Ethan Robinson',
                'reviewDate' => Carbon::now()->subDays(300),
                'lastUpdated' => Carbon::now()->subDays(295),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'gametitle' => 'Mario Kart 8 Deluxe',
                'image' => 'mario_kart_8.jpg',
                'genre_id' => 7,
                'reviewTitle' => 'The Ultimate Kart Racer',
                'reviewBody' => 'The game is a must-have for Nintendo Switch owners.',
                'rating' => 9.7,
                'reviewerName' => 'Noah Davis',
                'reviewDate' => Carbon::now()->subDays(200),
                'lastUpdated' => Carbon::now()->subDays(195),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'gametitle' => 'Luigi\'s Mansion 3',
                'image' => 'luigis_mansion_3.jpg',
                'genre_id' => 8,
                'reviewTitle' => 'A Spooky Delight',
                'reviewBody' => 'The game is a charming and fun-filled adventure.',
                'rating' => 9.0,
                'reviewerName' => 'Olivia Martinez',
                'reviewDate' => Carbon::now()->subDays(150),
                'lastUpdated' => Carbon::now()->subDays(145),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'gametitle' => 'Metroid Dread',
                'image' => 'metroid_dread.jpg',
                'genre_id' => 8,
                'reviewTitle' => 'A Sci-Fi Masterpiece',
                'reviewBody' => 'The game combines tight gameplay with a thrilling atmosphere.',
                'rating' => 9.4,
                'reviewerName' => 'Emma Taylor',
                'reviewDate' => Carbon::now()->subDays(120),
                'lastUpdated' => Carbon::now()->subDays(115),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'gametitle' => 'Sea of Thieves',
                'image' => 'sea_of_thieves.jpg',
                'genre_id' => 6,
                'reviewTitle' => 'A Pirate Adventure',
                'reviewBody' => 'The game offers a unique multiplayer experience with endless exploration.',
                'rating' => 8.5,
                'reviewerName' => 'Liam Wilson',
                'reviewDate' => Carbon::now()->subDays(90),
                'lastUpdated' => Carbon::now()->subDays(85),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'gametitle' => 'Gears 5',
                'image' => 'gears_5.jpg',
                'genre_id' => 4,
                'reviewTitle' => 'A Thrilling Shooter',
                'reviewBody' => 'The game delivers intense action and a gripping story.',
                'rating' => 8.9,
                'reviewerName' => 'Sophia Brown',
                'reviewDate' => Carbon::now()->subDays(60),
                'lastUpdated' => Carbon::now()->subDays(55),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'gametitle' => 'Forza Horizon 5',
                'image' => 'forza_horizon_5.jpg',
                'genre_id' => 7,
                'reviewTitle' => 'A Racing Paradise',
                'reviewBody' => 'The game offers stunning visuals and an expansive open-world racing experience.',
                'rating' => 9.6,
                'reviewerName' => 'James Carter',
                'reviewDate' => Carbon::now()->subDays(30),
                'lastUpdated' => Carbon::now()->subDays(25),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ]);

    }
}
