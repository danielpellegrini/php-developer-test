<?php

use App\Models\Address;
use App\Models\Company;
use App\Models\User;
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
         factory(User::class, 25)->create()->each(function ($user) {
            $user->companies()->attach(factory(Company::class)->create()->id);
            $user->addresses()->attach(factory(Address::class)->create()->id);
        });        

    }
}
