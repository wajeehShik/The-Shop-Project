<?php

namespace App\Providers;

use App\Repositories\Card\CardModelRepository;
use App\Repositories\Card\CardRepository;
use Illuminate\Support\ServiceProvider;

class CardServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       
       //CartRepository::class  برجع اسم الكلاس
       $this->app->bind(CardRepository::class, function() {
        return new CardModelRepository();
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
