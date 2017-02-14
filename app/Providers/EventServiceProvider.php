<?php

namespace Ecommerce\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use Ecommerce\Order;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Ecommerce\Events\SomeEvent' => [
            'Ecommerce\Listeners\EventListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Order::created(function($order){
            $order->sendMail();
        });

        Order::updated(function($order){
            $order->sendUpdateMail();
        });

    }
}
