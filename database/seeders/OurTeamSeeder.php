<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OurTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('our_teams')->insert([
            [
                'name' => 'John Doe',
                'occupation' => 'Developer',
                'avatar' => 'avatars/john_doe.jpg',
                'location' => 'New York, USA',
                'team' => 'Pimpinan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'occupation' => 'Designer',
                'avatar' => 'avatars/jane_smith.jpg',
                'location' => 'Los Angeles, USA',
                'team' => 'IT & Administrative Team',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Mills',
                'occupation' => 'Designer',
                'avatar' => 'avatars/jane_smith.jpg',
                'location' => 'Los Angeles, USA',
                'team' => 'Technician Team',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more team members as needed
        ]);
    }
}
