<?php

use Illuminate\Database\Seeder;
use App\Property;

class PropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Property::truncate();
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            Property::create([
                'user' => 1,
                'sign' => $faker->boolean(),
                'amount' => random_int(1,99999),
                'mark' => $faker->title()
            ]);
        }
    }
}
