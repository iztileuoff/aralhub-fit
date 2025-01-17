<?php

namespace App\Providers;

use App\Events\OrderCancelled;
use App\Events\OrderPaid;
use App\Listeners\UpdateOrderStatusCancelled;
use App\Listeners\UpdateOrderStatusSuccess;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        Event::listen(
//            OrderPaid::class,
//            UpdateOrderStatusSuccess::class,
//        );
//
//        Event::listen(
//            OrderCancelled::class,
//            UpdateOrderStatusCancelled::class,
//        );
    }
}
