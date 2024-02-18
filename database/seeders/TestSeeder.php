<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Property::create([
            "title" => "nisi sit",
            "address" => "
        564 Kreiger Ferry\n
        Hesselmouth, OR 00037-1152
      ",
      "price" => 5668178,
      "bedrooms" => 3,
      "bathrooms" => 4,
      "type" => "Townhouse",
      "status" => "rented",

    ],
         );
        Property::create(   [
            "title" => "facere pariatur",
            "address" => "
        791 Crystal Estates\n
        Madilynhaven, NV 90874-0967
      ",
      "price" => 6713664,
      "bedrooms" => 1,
      "bathrooms" => 9,
      "type" => "Townhouse",
      "status" => "available",
    ],
        );

        Property::create(   [
            "title" => "Apartment in Swedy district",
            "address" => "738 Hill Courts Apt. 104\nNorth Jaclyn, ME 03444",
            "price" => 120000,
            "bedrooms" => 0,
            "bathrooms" => 0,
            "type" => "villa",
            "status" => "available",
        ],
        );
    }
}
