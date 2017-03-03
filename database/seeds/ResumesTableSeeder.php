<?php

use Illuminate\Database\Seeder;

class ResumesTableSeeder extends Seeder
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

        for ($i = 1; $i <= 51; $i++) {
            array_push($data, [
                'aspirant_id' => $i,
                'resume' => null,
            ]);
        }

        DB::table('resumes')->insert($data);
    }
}
