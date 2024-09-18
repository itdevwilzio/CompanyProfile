<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\PaymentMethod;
use App\Models\VoucherPackage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 20; $i++) { 
            $location = Location::create([
                'name' => fake()->word(),
                'image' => fake()->imageUrl(),
            ]);

            for ($j=0; $j < 5; $j++) { 
                VoucherPackage::create([
                    'name' => fake()->word(),
                    'price' => fake()->numberBetween(100000, 1000000),
                    'location_id' => $location->id
                ]);
            }

            PaymentMethod::create([
                'payment_name' => 'BANK BRI',
                'payment_number' => fake()->creditCardNumber(),
                'details' => "A/N : " . fake()->name(),
                'location_id' => $location->id
            ]);
            PaymentMethod::create([
                'payment_name' => 'BANK MANDIRI',
                'payment_number' => fake()->creditCardNumber(),
                'details' => "A/N : " . fake()->name(),
                'location_id' => $location->id
            ]);
            PaymentMethod::create([
                'payment_name' => 'DANA',
                'payment_number' => fake()->creditCardNumber(),
                'details' => "A/N : " . fake()->name(),
                'location_id' => $location->id
            ]);
            PaymentMethod::create([
                'payment_name' => 'GOPAY',
                'payment_number' => fake()->creditCardNumber(),
                'details' => "A/N : " . fake()->name(),
                'location_id' => $location->id
            ]);
        }
        
    }
}
