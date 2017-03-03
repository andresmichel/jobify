<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
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
        $name = $faker->company;

        array_push($data, [
            'user_id' => 3,
            'slug' => str_slug($name),
            'logo' => null,
            'description' => $faker->jobTitle,
            'website' => str_slug($name).'.com',
            'category' => $faker->state,
            'employees' => rand(1, 100000),
            'state' => $faker->state,
            'city' => $faker->city,
            'address' => $faker->address,
            'phone' => $faker->tollFreePhoneNumber,
        ]);

        for ($i = 55; $i <= 105; $i++) {
            $name = $faker->company;

            array_push($data, [
                'user_id' => $i,
                'slug' => str_slug($name),
                'logo' => null,
                'description' => $faker->jobTitle,
                'website' => str_slug($name).'.com',
                'category' => $faker->state,
                'employees' => rand(1, 100000),
                'state' => $faker->state,
                'city' => $faker->city,
                'address' => $faker->address,
                'phone' => $faker->tollFreePhoneNumber,
            ]);
        }

        DB::table('companies')->insert($data);
    }
}
