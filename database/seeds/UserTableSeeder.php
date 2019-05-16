<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // php artisan db:seed
        factory(\App\User::class, 10)->create();
        factory(\App\Company::class, 10)->create();
    }
}
