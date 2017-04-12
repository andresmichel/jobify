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
        factory(App\User::class, 1)->states('admin')->create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
        ]);

        factory(App\User::class, 1)->states('aspirant')
            ->create(['email' => 'aspirante@gmail.com'])
            ->each(function ($u) {
                $u->aspirant()->save(factory(App\Aspirant::class)->make());
            });

        factory(App\User::class, 50)->states('aspirant')
            ->create()
            ->each(function ($u) {
                $u->aspirant()->save(factory(App\Aspirant::class)->make());
            });

        factory(App\User::class, 1)->states('company')
            ->create(['email' => 'empresa@gmail.com'])
            ->each(function ($u) {
                $u->company()->save(factory(App\Company::class)->make());
            });

        factory(App\User::class, 50)->states('company')
            ->create()
            ->each(function ($u) {
                $u->company()->save(factory(App\Company::class)->make());
            });
    }
}
