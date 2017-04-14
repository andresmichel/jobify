<?php

use Illuminate\Database\Seeder;
use App\Job;
use App\Application;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Job::class, 50)
            ->create()
            ->each(function ($a) {
                $a->applications()->save(factory(Application::class)->make());
            });
    }
}
