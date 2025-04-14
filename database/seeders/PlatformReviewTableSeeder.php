<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlatformReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('platform_review')->insert([
            ['review_id' => 1, 'platform_id' => 22],
            ['review_id' => 2, 'platform_id' => 3],
            ['review_id' => 2, 'platform_id' => 4],
            ['review_id' => 2, 'platform_id' => 5],
            ['review_id' => 2, 'platform_id' => 6],
            ['review_id' => 2, 'platform_id' => 7],
            ['review_id' => 2, 'platform_id' => 23],
            ['review_id' => 3, 'platform_id' => 22],
            ['review_id' => 5, 'platform_id' => 22],
            ['review_id' => 6, 'platform_id' => 22],
            ['review_id' => 7, 'platform_id' => 22],
            ['review_id' => 4, 'platform_id' => 3],
            ['review_id' => 4, 'platform_id' => 4],
            ['review_id' => 4, 'platform_id' => 5],
            ['review_id' => 4, 'platform_id' => 6],
            ['review_id' => 4, 'platform_id' => 7],
            ['review_id' => 4, 'platform_id' => 23],
            ['review_id' => 8, 'platform_id' => 3],
            ['review_id' => 8, 'platform_id' => 4],
            ['review_id' => 8, 'platform_id' => 5],
            ['review_id' => 8, 'platform_id' => 6],
            ['review_id' => 8, 'platform_id' => 7],
            ['review_id' => 8, 'platform_id' => 23],
            ['review_id' => 8, 'platform_id' => 13],
            ['review_id' => 9, 'platform_id' => 3],
            ['review_id' => 9, 'platform_id' => 4],
            ['review_id' => 9, 'platform_id' => 5],
            ['review_id' => 9, 'platform_id' => 6],
            ['review_id' => 9, 'platform_id' => 7],
            ['review_id' => 9, 'platform_id' => 23],
            ['review_id' => 10, 'platform_id' => 3],
            ['review_id' => 10, 'platform_id' => 4],
            ['review_id' => 10, 'platform_id' => 5],
            ['review_id' => 10, 'platform_id' => 6],
            ['review_id' => 10, 'platform_id' => 7],
            ['review_id' => 10, 'platform_id' => 23],
        ]);
    }
}
