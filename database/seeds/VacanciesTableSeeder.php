<?php

use Illuminate\Database\Seeder;

class VacanciesTableSeeder extends Seeder
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
            for ($c = 0; $c < 10; $c++) {
                $title = $faker->sentence($nbWords = 6, $variableNbWords = true);

                array_push($data, [
                    'company_id'    => $i,
                    'title'         => $title,
                    'slug'          => str_slug($title),
                    'description'   => $faker->text,
                    'contract'      => $faker->text,
                    'area'          => $faker->jobTitle,
                    'education'     => 'Universidad',
                    'shift'         => 'Matutino',
                    'gender'        => $faker->word,
                    'experience'    => $faker->text,
                    'min_age'       => 18,
                    'max_age'       => 40,
                    'schedule'      => '08:00',
                    'hours'         => rand(5, 10).' horas',
                    'salary'        => '$'.rand(6000, 100000).'.00',
                    'language'      => 'Español',
                    'state'         => $faker->state,
                    'city'          => $faker->city,
                    'status'        => 1,
                    'created_at'    => $faker->date($format = 'Y-m-d', $max = 'now'),
                ]);
            }
        }

        DB::table('vacancies')->insert($data);
    }
}
