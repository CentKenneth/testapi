<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Transaction;
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
        $this->app->singleton('Doctor', function() {
            return new Repository(new Doctor);
        });
        $this->app->singleton('Transaction', function() {
            return new Repository(new Transaction);
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
