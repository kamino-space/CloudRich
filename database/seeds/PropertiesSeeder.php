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
        $faker = \Faker\Factory::create();
        Property::truncate();
        Property::create([
            'user' => 1,
            'sign' => 1,
            'amount' => random_int(1, 99999),
            'mark' => '测试',
            'time' => $faker->dateTime()
        ]);
        Property::create([
            'user' => 1,
            'sign' => 0,
            'amount' => random_int(1, 99999),
            'mark' =>'测试',
            'time' => $faker->dateTime()
        ]);
        /*
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            Property::create([
                'user' => 1,
                'sign' => $faker->boolean(),
                'amount' => random_int(1, 99999),
                'mark' => $faker->title(),
                'time' => $faker->dateTime()
            ]);
        }*/
    }
}
