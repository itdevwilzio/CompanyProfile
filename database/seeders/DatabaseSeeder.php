<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolePermissionSeeder::class);
        $this->call(OurTeamSeeder::class);
        $this->call(OurPrincipleSeeder::class);
        // $this->call(TestimonialSeeder::class);
        // $this->call(LocationSeeder::class);
        $this->call(AboutUsSeeder::class);
    }
}