<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('testimonials')->insert([
            [
                'thumbnail' => 'thumbnails/client1.jpg',
                'message' => 'This project exceeded our expectations.',
                'project_client_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'thumbnail' => 'thumbnails/client2.jpg',
                'message' => 'Very satisfied with the results.',
                'project_client_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // More seed data...
        ]);
    }
}
