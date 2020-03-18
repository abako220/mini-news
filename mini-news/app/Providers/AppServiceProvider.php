<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//contract
use App\Repository\contract\NewsInterface;

//Eloquent
use App\Repository\Eloquent\NewsImpl;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(NewsInterface::class,NewsImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
