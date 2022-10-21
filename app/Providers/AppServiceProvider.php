<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //App::make('files')->link(storage_path('app/public'), public_path('storage')); 
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
