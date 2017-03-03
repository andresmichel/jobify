<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
            'id' => 1,
            'name' => $faker->name,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
            'role' => 'admin',
        ]);

        array_push($data, [
            'id' => 2,
            'name' => $faker->name,
            'email' => 'aspirante@gmail.com',
            'password' => bcrypt('secret'),
            'role' => 'aspirant',
        ]);

        array_push($data, [
            'id' => 3,
            'name' => $faker->company,
            'email' => 'empresa@gmail.com',
            'password' => bcrypt('secret'),
            'role' => 'company',
        ]);

        for ($i = 4; $i <= 54; $i++) {
            array_push($data, [
                'id' => $i,
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('secret'),
                'role' => 'aspirant',
            ]);
        }

        for ($i = 55; $i <= 105; $i++) {
            array_push($data, [
                'id' => $i,
                'name' => $faker->company,
                'email' => $faker->email,
                'password' => bcrypt('secret'),
                'role' => 'company',
            ]);
        }

        DB::table('users')->insert($data);
    }
}
