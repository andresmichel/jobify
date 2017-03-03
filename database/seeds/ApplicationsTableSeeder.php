<?php

use Illuminate\Database\Seeder;

class ApplicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        for ($i = 1; $i <= 51; $i++) {
            for ($c = 1; $c <= 10; $c++) {
                array_push($data, [
                    'aspirant_id' => $i,
                    'vacancy_id' => $c,
                ]);
            }
        }

        DB::table('applications')->insert($data);
    }
}
