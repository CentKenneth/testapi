<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Transaction;
use App\Models\Schedule;
use App\Models\PatientSchedule;
use App\Models\PatientChat;
use App\Models\Prescription;
use App\Repositories\Repository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     * 
     * @return void
     */
    public function register()
    {
        $this->app->singleton('User', function() {
            return new Repository(new User);
        });
        $this->app->singleton('Transaction', function() {
            return new Repository(new Transaction);
        });
        $this->app->singleton('Schedule', function() {
            return new Repository(new Schedule);
        });
        $this->app->singleton('PatientSchedule', function() {
            return new Repository(new PatientSchedule);
        });
        $this->app->singleton('PatientChat', function() {
            return new Repository(new PatientChat);
        });
        $this->app->singleton('Prescription', function() {
            return new Repository(new Prescription);
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
