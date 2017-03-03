<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AspirantsTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(ResumesTableSeeder::class);
        $this->call(VacanciesTableSeeder::class);
        $this->call(ApplicationsTableSeeder::class);
    }
}
