<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\LiquorRepository;
use App\Http\Repositories\Interfaces\ApplicationInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->singleton(ApplicationInterface::class, LiquorRepository::class);
        $this->app->singleton(ApplicationInterface::class, LiquorApplicationRepository::class);
    }
}
