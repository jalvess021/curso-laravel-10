<?php

namespace App\Providers;

use App\Models\Support;
use App\Repositories\SupportRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use SupportEloquentORM;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            SupportRepositoryInterface::class, 
            SupportEloquentORM::class
        );

        //Onde tiver uma classe abstrata(interface), injeta ela na classe concreta.
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
