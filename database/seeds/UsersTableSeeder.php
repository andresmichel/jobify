<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Company;
use App\Aspirant;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->states('admin')->create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
        ]);

        factory(User::class, 1)->states('aspirant')
            ->create(['email' => 'aspirante@gmail.com'])
            ->each(function ($u) {
                $u->aspirant()->save(factory(Aspirant::class)->make());
            });

        factory(User::class, 50)->states('aspirant')
            ->create()
            ->each(function ($u) {
                $u->aspirant()->save(factory(Aspirant::class)->make());
            });

        factory(User::class, 1)->states('company')
            ->create(['email' => 'empresa@gmail.com'])
            ->each(function ($u) {
                $u->company()->save(factory(Company::class)->make());
            });

        factory(User::class, 50)->states('company')
            ->create()
            ->each(function ($u) {
                $u->company()->save(factory(Company::class)->make());
            });
    }
}
