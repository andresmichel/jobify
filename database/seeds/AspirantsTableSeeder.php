<?php

use Illuminate\Database\Seeder;

class AspirantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $faker = Faker\Factory::create();

        array_push($data, [
            'user_id' => 2,
            'picture' => null,
            'gender' => $faker->word,
            'birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
            'state' => $faker->state,
            'city' => $faker->city,
            'phone' => $faker->tollFreePhoneNumber,
        ]);

        for ($i = 4; $i <= 54; $i++) {
            array_push($data, [
                'user_id' => $i,
                'picture' => null,
                'gender' => $faker->word,
                'birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'state' => $faker->state,
                'city' => $faker->city,
                'phone' => $faker->tollFreePhoneNumber,
            ]);
        }

        DB::table('aspirants')->insert($data);
    }
}
