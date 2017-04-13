<?php

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Job::class, 50)
            ->create()
            ->each(function ($a) {
                $a->applications()->save(factory(App\Application::class)->make());
            });
    }
}
