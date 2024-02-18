<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

                "title"=>implode(" ",fake()->words(2))
                ,"address"=>fake()->address
                ,"price"=>floatval(random_int(1000,10000000))
                ,"bedrooms"=>random_int(1,10)
                ,"bathrooms"=>random_int(1,10)
                ,"type"=>Property::TYPE_OPTIONS[array_rand(Property::TYPE_OPTIONS)]
                ,"status"=>Property::STATUS_OPTIONS[array_rand(Property::STATUS_OPTIONS)]


        ];
    }
}
