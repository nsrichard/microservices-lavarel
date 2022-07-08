<?php

namespace App\Listeners;

use App\Events\OrderEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;


class OrderListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function handle(OrderEvent $event)
    {
        $event->kitchenService->setOrder();
    }
}
