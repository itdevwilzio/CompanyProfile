<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OurPrincipleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('our_principles')->insert([
            [
                'subtitle' => 'Integrity',
                'name' => 'Commitment to Honesty',
                'thumbnail' => 'thumbnails/integrity.jpg',
                'icon' => 'icons/integrity-icon.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'subtitle' => 'Excellence',
                'name' => 'Strive for Quality',
                'thumbnail' => 'thumbnails/excellence.jpg',
                'icon' => 'icons/excellence-icon.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // More seed data...
        ]);
    }
}
