<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Services\KitchenService;

class OrderEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    public $kitchenService;
    public function __construct(KitchenService $kitchenService)
    {
        $this->kitchenService = $kitchenService;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
