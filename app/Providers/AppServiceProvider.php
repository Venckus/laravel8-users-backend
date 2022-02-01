<?php

namespace App\Providers;

use App\Models\User;
use App\Events\ViewUserHandler;
use App\Observers\UserObserver;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Event::listen(ViewUserHandler::class, 'handle');
        // User::observe(UserObserver::class);
    }
}
