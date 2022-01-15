<?php

namespace App\Providers;

use App\Services\UserServices;
use App\Services\DoctorServices;
use App\Services\TransactionServices;
use App\Services\ScheduleServices;
use App\Services\PatientServices;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('UserServices', function() {
            return new UserServices;
        });
        $this->app->singleton('TransactionServices', function() {
            return new TransactionServices;
        });
        $this->app->singleton('ScheduleServices', function() {
            return new ScheduleServices;
        });
        $this->app->singleton('PatientServices', function() {
            return new PatientServices;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
