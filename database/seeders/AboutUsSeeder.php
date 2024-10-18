<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutUs;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutUs::create([
            'name' => 'Vision',
            'description' => 'Our vision is to empower people through innovative technology.',
            'thumbnail' => 'vision-thumbnail.png', // Add a valid path or filename if needed
            'keypoints' => json_encode(['Innovative', 'Future-Oriented', 'Empowering']),
        ]);
    }
}
