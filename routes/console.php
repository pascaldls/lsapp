<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

use App\Company;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('contact:company-clean', function () {
    $this->info('Cleaning');
    $companies  = Company::whereDoesntHave('customers')->get();
    $this->info($companies);

    $companies->each(function ($company) {
        $company->delete();
        $this->warn('Deleted ' . $company->name);
    });
    factory(\App\Company::class, 10)->create();
})->describe('Clean Up unsed companies ');
