<?php

namespace App\Providers;

use App\Models\Album;
use App\Models\Band;
use App\Models\Genre;
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
        view()->composer('band.partials.form', function ($view) {
            $view->with('genres', Genre::latest()->get());
        });

        view()->composer('song.partials.form', function ($view) {
            $view->with('bands', Band::latest()->get());
            $view->with('albums', Album::latest()->get());
        });
    }
}
